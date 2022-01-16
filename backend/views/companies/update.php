<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Companies */

$this->title = 'Update Companies: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <?php $form = ActiveForm::begin(['method' => 'POST']); ?>
                <div class="card-body  pb-5 mt-3 mx-3">
                    <div class="title pb-3">
                        <h3>Update companies</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="input-group input-group-outline mb-3">
                                <input name="Companies[name]" value="<?=$model->name?>" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="" style="width: 200px">
                            <button class="form-control btn btn-danger text-black">save</button>
                        </div>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
