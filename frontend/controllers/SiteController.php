<?php

namespace frontend\controllers;

use common\models\Companies;
use common\models\search\PortSearch;
use common\models\search\TariffsSearch;
use common\models\Tariffs;
use frontend\models\CheckForm;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use yii\helpers\ArrayHelper;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $queryModel = new TariffsSearch();
        $dataProvider = $queryModel->search(Yii::$app->request->queryParams);
//        $dataProvider->pagination->pageSize = 30;
        $companies = Companies::find()->asArray()->all();
        $companiesList = ArrayHelper::map($companies, 'id', 'name');
        $providerCount = count($companies);

        $tariffsQuery = (new Query())->select('count(*) as tariff')->from('tariffs');
        $activeTariffsQuery = (new Query())->select('count(*) as active')->from('tariffs')->where(['status' => Tariffs::STATUS_ACTIVE]);
        $tariffs = (new Query())->select(['tariff' => $tariffsQuery, 'active' => $activeTariffsQuery])->all();


        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'companiesList' => $companiesList,
            'providerCount' => $providerCount,
            'tariffs' => $tariffs[0],
            'searchModel' => $queryModel
        ]);
    }

    public function actionCheck()
    {
        $model = new CheckForm();
        $tariffList = ArrayHelper::map(Tariffs::find()->all(), 'id', 'name');

        $companies = Companies::find()->asArray()->all();
        $companiesList = ArrayHelper::map($companies, 'id', 'name');
        $providerCount = count($companiesList);

        $tariffsQuery = (new Query())->select('count(*) as tariff')->from('tariffs');
        $activeTariffsQuery = (new Query())->select('count(*) as active')->from('tariffs')->where(['status' => Tariffs::STATUS_ACTIVE]);
        $tariffs = (new Query())->select(['tariff' => $tariffsQuery, 'active' => $activeTariffsQuery])->all();
        if (!empty(Yii::$app->request->post()) && $model->load(Yii::$app->request->post())){

            return $this->render('check', [
                'model' => $model,
                'data' => $model->check(),
                'providers' =>  $companiesList,
                'tariffs' =>  $tariffs[0],
                'tariffList' =>  $tariffList,
                'providerCount' => $providerCount,
            ]);

        }
        return $this->render('check', [
            'model' => $model,
            'providers' =>  $companiesList,
            'tariffs' =>  $tariffs[0],
            'tariffList' =>  $tariffList,
            'providerCount' => $providerCount,
        ]);
    }

    public function actionPort()
    {
        $searchModel = new  PortSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        $companies = Companies::find()->asArray()->all();
        $companiesList = ArrayHelper::map($companies, 'id', 'name');
        $providerCount = count($companiesList);
        $tariffsQuery = (new Query())->select('count(*) as tariff')->from('tariffs');
        $activeTariffsQuery = (new Query())->select('count(*) as active')->from('tariffs')->where(['status' => Tariffs::STATUS_ACTIVE]);
        $tariffs = (new Query())->select(['tariff' => $tariffsQuery, 'active' => $activeTariffsQuery])->all();

        return $this->render('port', [
            'dataProvider' => $dataProvider,
            'tariffs' => $tariffs[0],
            'searchModel' => $searchModel,
            'providerCount' => $providerCount,
        ]);
    }




    public function actionTariffs() {

        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $cat_id = $parents[0];
                    $out = Tariffs::find()->andWhere(['provider_id' => $cat_id])->all();
                return ['output' => $out, 'selected' => ''];
            }
        }
        return ['output' => '', 'selected' => ''];
    }

    public function actionTariff() {

        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $cat_id = $parents[0];
                $out = Tariffs::find()->andWhere(['provider_id' => $cat_id])->all();
                return ['output' => $out, 'selected' => ''];
            }
        }
        return ['output' => '', 'selected' => ''];
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        }

        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }



    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            }

            Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @return yii\web\Response
     * @throws BadRequestHttpException
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if (($user = $model->verifyEmail()) && Yii::$app->user->login($user)) {
            Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
            return $this->goHome();
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }



}
