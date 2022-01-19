<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\PortSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="port-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'adsl_busy') ?>

    <?= $form->field($model, 'adsl_free') ?>

    <?= $form->field($model, 'vdsl_busy') ?>

    <?= $form->field($model, 'vdsl_free') ?>

    <?php // echo $form->field($model, 'vdsl_cipher') ?>

    <?php // echo $form->field($model, 'fttb_busy_cor_seg') ?>

    <?php // echo $form->field($model, 'fttb_free_cor_seg') ?>

    <?php // echo $form->field($model, 'fttb_busy_mas_seg') ?>

    <?php // echo $form->field($model, 'fttb_free_mas_seg') ?>

    <?php // echo $form->field($model, 'gpon_every_olt') ?>

    <?php // echo $form->field($model, 'gpon_every_busy') ?>

    <?php // echo $form->field($model, 'gpon_free_sip_size') ?>

    <?php // echo $form->field($model, 'branch_id') ?>

    <?php // echo $form->field($model, 'date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
