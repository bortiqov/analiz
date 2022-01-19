<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Branch */

$this->title = "Filial";
$this->params['breadcrumbs'][] = ['label' => 'Branches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="mt-4 bg-white shadow-lg rounded  px-4 py-5 ">
    <div class="text-2xl"> Filial ro'yhati</div>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'people',
            'house_hold',
        ],
    ]) ?>
</div>
