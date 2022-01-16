<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Companies */
/* @var $form yii\widgets\ActiveForm */
?>

    <?php $form = ActiveForm::begin(); ?>
        <div class="row">
                <div class="input-group input-group-outline mb-3">
                    <div class="input-group input-group-outline mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
            <div class="col-12 d-flex justify-content-center">
                <div class="w-30 ml-auto">
                    <button type="button"
                            class="btn btn-lg bg-gradient-success btn-lg w-100 mt-4 mb-0">Sign
                        Up
                    </button>
                </div>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
