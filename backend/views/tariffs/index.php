<?php

use common\models\Tariffs;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\TariffsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tariffs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-body  pb-5 mt-3 mx-3">
                    <a class="btn btn-success" href="/tariffs/create">Create Tariffs</a>
                    <div class="scroll-page">
                        <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            'filterModel' => $searchModel,
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],
                                [
                                    'attribute' => 'provider_id',
                                    'label' => 'Provider',
                                    'value' => function ($model) {
                                        return $model->companies->name;
                                    },
                                ],
                                'name',
                                'reg_pay',
                                'ab_pay',
                                [
                                    'attribute' => 'traffic',
                                    'value' => function ($model) {
                                        return $model->traffic ?? "unlim";
                                    }
                                ],
                                'un_traffic',
                                'shart',
                                'bonus',
                                'speed',
                                [
                                    'attribute' => 'status',
                                    'headerOptions' => ['class' => 'justify-content-center'],
                                    'contentOptions' => ['style' => 'width: 150px;', 'class' => ''],
                                    'label' => 'Holati',
                                    'format' => 'raw',
                                    'value' => function ($model) {
                                        if ($model->status == Tariffs::STATUS_ACTIVE) {
                                            return '<span class="badge-success">Active</span>';
                                        }
                                        return '<span class="badge-danger">Arxiv</span>';
                                    },
                                ],
                                [
                                    'class' => ActionColumn::className(),
                                    'urlCreator' => function ($action, \common\models\Tariffs $model, $key, $index, $column) {
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
