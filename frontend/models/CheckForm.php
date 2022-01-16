<?php

namespace frontend\models;

use common\models\Companies;
use common\models\Tariffs;
use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class CheckForm extends Model
{
    public $provider_id;
    public $tariff_id;
    public $provider_id2;
    public $tariff_id2;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['provider_id', 'tariff_id', 'provider_id2', 'tariff_id2',], 'integer'],
            // email has to be a valid email address
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'provider_id' => 'Provider',
        ];
    }

    /**
     * @param $params
     */

    public function check()
    {
        $data = [];
        $provider = Tariffs::findOne(['id' => $this->tariff_id]);
        $provider2 = Tariffs::findOne(['id' => $this->tariff_id2]);

        if ($provider->speed > $provider2->speed) {
            $data[] = $provider;
            $data[] = $provider2;
            return $data;
        } else if ($provider->speed < $provider2->speed) {
            $data[] = $provider2;
            $data[] = $provider;
            return $data;
        } else if ($provider->ab_pay > $provider2->ab_pay) {
            $data[] = $provider2;
            $data[] = $provider;
            return $data;
        } else if ($provider->ab_pay < $provider2->ab_pay) {
            $data[] = $provider;
            $data[] = $provider2;
            return $data;
        } else if ($provider->unlim) {

            $data[] = $provider;
            $data[] = $provider2;
            return $data;
        } else if ($provider2->unlim) {
            $data[] = $provider2;
            $data[] = $provider;
            return $data;
        } else if ($provider->traffic > $provider2->traffic) {
            $data[] = $provider;
            $data[] = $provider2;
            return $data;
        } else if ($provider->traffic < $provider2->traffic) {
            $data[] = $provider2;
            $data[] = $provider;
            return $data;
        } else if ($provider->reg_pay < $provider2->reg_pay) {
            $data[] = $provider;
            $data[] = $provider2;
            return $data;
        } else if ($provider->reg_pay > $provider2->reg_pay) {
            $data[] = $provider2;
            $data[] = $provider;
            return $data;
        } else {
            $data[] = $provider;
            $data[] = $provider2;
            return $data;
        }
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param string $email the target email address
     * @return bool whether the email was sent
     */

    public
    function sendEmail($email)
    {
        return Yii::$app->mailer->compose()
            ->setTo($email)
            ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['senderName']])
            ->setReplyTo([$this->email => $this->name])
            ->setSubject($this->subject)
            ->setTextBody($this->body)
            ->send();
    }
}
