<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Port */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="port-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'adsl_busy')->textInput() ?>

    <?= $form->field($model, 'adsl_free')->textInput() ?>

    <?= $form->field($model, 'vdsl_busy')->textInput() ?>

    <?= $form->field($model, 'vdsl_free')->textInput() ?>

    <?= $form->field($model, 'vdsl_cipher')->textInput() ?>

    <?= $form->field($model, 'fttb_busy_cor_seg')->textInput() ?>

    <?= $form->field($model, 'fttb_free_cor_seg')->textInput() ?>

    <?= $form->field($model, 'fttb_busy_mas_seg')->textInput() ?>

    <?= $form->field($model, 'fttb_free_mas_seg')->textInput() ?>

    <?= $form->field($model, 'gpon_every_olt')->textInput() ?>

    <?= $form->field($model, 'gpon_every_busy')->textInput() ?>

    <?= $form->field($model, 'gpon_free_sip_size')->textInput() ?>

    <?= $form->field($model, 'branch_id')->textInput() ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
