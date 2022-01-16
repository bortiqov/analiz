<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Tariffs */

$this->title = 'Update Tariffs: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tariffs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
var_dump($model->status);
//die;
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
                                <?=$form->field($model,'provider_id')->dropDownList(\common\models\Companies::getDropDownList(),[
                                    ['prompt' => 'Providerni tanlang']
                                ])?>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-4 mb-2">
                            <div class="input-group input-group-outline mb-3">
                                <?=$form->field($model,'name')->textInput()?>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-4 mb-2">
                            <div class="input-group input-group-outline mb-3">
                                <?=$form->field($model,'reg_pay')->textInput()?>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-4 mb-2">
                            <div class="input-group input-group-outline mb-3">
                                <?=$form->field($model,'ab_pay')->textInput()?>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-4 mb-2">
                            <div class="input-group input-group-outline mb-3">
                                <?=$form->field($model,'speed')->textInput()?>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-4 mb-2 d-flex justify-content-start  align-items-center">
                            <div class="input-group input-group-outline">
                                <?=$form->field($model,'unlim')->checkbox(['id' => 'unlim_checkbox'])?>
                            </div>
                            <div class="input-group input-group-outline mb-3">
                                <?=$form->field($model,'traffic')->textInput(['id' => 'trafic_id'])?>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-4 mb-2">
                            <div class="input-group input-group-outline mb-3">
                                <?=$form->field($model,'un_traffic')->textInput()?>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-4 mb-2">
                            <div class="input-group input-group-outline mb-3">
                                <?=$form->field($model,'shart')->textInput()?>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-lg-4 mb-2">
                            <div class="input-group input-group-outline mb-3">
                                <?=$form->field($model,'bonus')->textInput()?>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-4 mt-4">
                            <div class="input-group input-group-outline">
                                <?=$form->field($model,'status')->checkbox(['class' => 'checkbox-style'])?>
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