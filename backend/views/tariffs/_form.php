<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Tariffs */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tariffs-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'reg_pay')->textInput() ?>

    <?= $form->field($model, 'ab_pay')->textInput() ?>

    <?= $form->field($model, 'speed')->textInput() ?>

    <?= $form->field($model, 'traffic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'un_traffic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'shart')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bonus')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'deleted_at')->textInput() ?>

    <?= $form->field($model, 'provider_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
