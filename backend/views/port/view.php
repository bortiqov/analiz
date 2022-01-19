<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Port */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ports', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="mt-4 bg-white shadow-lg rounded  px-4 py-5 ">
    <div class="text-2xl"> Tariflar ro'yhati</div>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'adsl_busy',
            'adsl_free',
            'vdsl_busy',
            'vdsl_free',
            'vdsl_cipher',
            'fttb_busy_cor_seg',
            'fttb_free_cor_seg',
            'fttb_busy_mas_seg',
            'fttb_free_mas_seg',
            'gpon_every_olt',
            'gpon_every_busy',
            'gpon_free_sip_size',
            'branch_id',
            'date',
        ],
    ]) ?>
</div>

