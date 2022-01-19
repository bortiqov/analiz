<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\PortSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ports';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-body  pb-5 mt-3 mx-3">
                    <a class="btn btn-success" href="/port/create">Create Port</a>
                    <div class="scroll-page">
                        <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            'filterModel' => $searchModel,
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],
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
                                [
                                    'class' => ActionColumn::className(),
                                    'urlCreator' => function ($action, \common\models\Port $model, $key, $index, $column) {
                                        return Url::toRoute([$action, 'id' => $model->id]);
                                    }
                                ],
                            ],
                        ]); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
