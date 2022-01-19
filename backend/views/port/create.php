<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Port */

$this->title = 'Create Port';
$this->params['breadcrumbs'][] = ['label' => 'Ports', 'url' => ['index']];
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
                                <?=$form->field($model,'branch_id')->dropDownList(\common\models\Branch::getDropDownList(),
                                    ['prompt' => 'Providerni tanlang'])?>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-4 mb-2">
                            <div class="input-group input-group-outline mb-3">
                                <?=$form->field($model,'date')->textInput()?>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-4 mb-2">
                            <div class="input-group input-group-outline mb-3">
                                <?=$form->field($model,'adsl_busy')->textInput()?>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-4 mb-2">
                            <div class="input-group input-group-outline mb-3">
                                <?=$form->field($model,'adsl_free')->textInput()?>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-4 mb-2">
                            <div class="input-group input-group-outline mb-3">
                                <?=$form->field($model,'vdsl_busy')->textInput()?>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-4 mb-2 d-flex justify-content-start  align-items-center">
                            <div class="input-group input-group-outline mb-3">
                                <?=$form->field($model,'vdsl_free')->textInput(['id' => 'trafic_id'])?>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-4 mb-2">
                            <div class="input-group input-group-outline mb-3">
                                <?=$form->field($model,'vdsl_cipher')->textInput()?>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-4 mb-2">
                            <div class="input-group input-group-outline mb-3">
                                <?=$form->field($model,'fttb_busy_cor_seg')->textInput()?>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-4 mb-2">
                            <div class="input-group input-group-outline mb-3">
                                <?=$form->field($model,'fttb_free_cor_seg')->textInput()?>
                            </div>
                        </div>


                        <div class="col-12 col-sm-6 col-lg-4 mb-2">
                            <div class="input-group input-group-outline mb-3">
                                <?=$form->field($model,'fttb_busy_mas_seg')->textInput()?>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-4 mb-2">
                            <div class="input-group input-group-outline mb-3">
                                <?=$form->field($model,'fttb_free_mas_seg')->textInput()?>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-4 mb-2">
                            <div class="input-group input-group-outline mb-3">
                                <?=$form->field($model,'gpon_every_olt')->textInput()?>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-4 mb-2">
                            <div class="input-group input-group-outline mb-3">
                                <?=$form->field($model,'gpon_every_busy')->textInput()?>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-4 mb-2">
                            <div class="input-group input-group-outline mb-3">
                                <?=$form->field($model,'gpon_free_sip_size')->textInput()?>
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
