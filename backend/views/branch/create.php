<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Branch */

$this->title = 'Create Filial';
$this->params['breadcrumbs'][] = ['label' => 'Branches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-body  pb-5 mt-3 mx-3">
                    <?php $form = \yii\widgets\ActiveForm::begin();?>
                    <div class="row">
                        <div class="col-12 col-sm-6 col-lg-4 mb-2">
                            <div class="input-group input-group-outline mb-3">
                                <?=$form->field($model,'name')->textInput()?>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-4 mb-2">
                            <div class="input-group input-group-outline mb-3">
                                <?=$form->field($model,'people')->textInput()?>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-4 mb-2">
                            <div class="input-group input-group-outline mb-3">
                                <?=$form->field($model,'house_hold')->textInput()?>
                            </div>
                        </div>

                        <div class="col-12 d-flex justify-content-center">
                            <div class="w-30 ml-auto">
                                <button type="submit"
                                        class="btn btn-lg bg-gradient-success btn-lg w-100 mt-4 mb-0"> Save
                                </button>
                            </div>
                        </div>
                    </div>
                    <?php \yii\widgets\ActiveForm::end();?>
                </div>
            </div>
        </div>
    </div>
</div>