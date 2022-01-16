<?php

/* @var $this yii\web\View */
/* @var $dataProvider \yii\data\ActiveDataProvider */
/* @var $companiesList \common\models\search\TariffsSearch */
/* @var $searchModel \common\models\Companies */
/* @var $providerCount \phpDocumentor\Reflection\Types\Integer */

/* @var $tariffs Array */


use common\models\Tariffs;
use kartik\select2\Select2;
use yii\grid\ActionColumn;
use yii\helpers\Url;

$this->title = 'Home';
?>
<main>
    <div class="container my-4 bg-light">
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-y-2 shadow-lg  rounded bg-white  border-4 border-white">
            <div class=" border-b border-r-0 xl:border-b-0 p-4 xl:border-r border-gray-300 flex flex-col justify-center items-center">
                <div class="mb-2"><img class="opacity-50" src="./images/work.svg" alt=""></div>
                <div class="text-4xl font-bold text-black text-opacity-50 mb-1"><?= $providerCount ?></div>
                <div class="tex-2xl font-bold text-black text-opacity-50 mb-1"> Providerlar</div>
            </div>
            <div class=" border-b border-r-0 xl:border-b-0 p-4 xl:border-r border-gray-300 flex flex-col justify-center items-center">
                <div class="mb-2"><img class="opacity-50" src="./images/document.svg" alt=""></div>
                <div class="text-4xl font-bold text-black text-opacity-50 mb-1"> <?= $tariffs['tariff'] ?></div>
                <div class="tex-2xl font-bold text-black text-opacity-50 mb-1"> Tariflar</div>
            </div>
            <div class=" border-b border-r-0 xl:border-b-0 p-4 xl:border-r border-gray-300 flex flex-col justify-center items-center">
                <div class="mb-2"><img class="opacity-50" src="./images/users.svg" alt=""></div>
                <div class="text-4xl font-bold text-black text-opacity-50 mb-1"> <?= $tariffs['active'] ?></div>
                <div class="tex-2xl font-bold text-black text-opacity-50 mb-1"> Aktiv tariflar</div>
            </div>
            <div class="p-4  flex flex-col justify-center items-center">
                <div class="mb-2"><img class="opacity-50" src="./images/chart.svg" alt=""></div>
                <div class="text-4xl font-bold text-black text-opacity-50 mb-1"> <?= $tariffs['tariff'] - $tariffs['active'] ?></div>
                <div class="tex-2xl font-bold text-black text-opacity-50 mb-1">
                    <Arx></Arx>
                    Arxiv tariflar
                </div>
            </div>
        </div>
        <div class="mt-4 bg-white shadow-lg rounded  px-4 py-10 ">
            <div class="text-2xl mb-10"> Tariflar ro'yhati</div>
            <?php
            echo \yii\grid\GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'tableOptions' => ['class' => 'table  table-stripped table-hover'],
                'layout' => '{summary}{items}{pager}',
                'summary' => '<div class="text-black font-bold mt-4 mb-3 text-opacity-60"><span>' . $tariffs['tariff'] . '</span> ta tarifdan <span> ' . $tariffs['active'] . ' </span>
                tasi aktiv holatda
            </div>',
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'attribute' => 'provider_id',
                        'label' => 'Provider',
                        'contentOptions' => ['style' => 'max-width: 130px;', 'class' => ''],
                        'value' => function ($model) {
                            return $model->companies->name;
                        },
                        'filter' => $companiesList
                    ],
                    [
                        'attribute' => 'name',
                        'headerOptions' => ['class' => 'justify-content-center'],
                        'label' => 'Ta‘rif rejasi',
                        'contentOptions' => ['style' => 'max-width: 130px;', 'class' => ''],
                        'filter' => false
                    ],
                    [
                        'attribute' => 'reg_pay',
                        'headerOptions' => ['class' => 'justify-content-center'],
                        'label' => 'Registratsiya to’lov',
                        'contentOptions' => ['style' => 'max-width: 180px;', 'class' => ''],
                        'filter' => false
                    ],
                    [
                        'attribute' => 'ab_pay',
                        'headerOptions' => ['class' => 'justify-content-center'],
                        'label' => 'Abonet to’lovi',
                        'contentOptions' => ['style' => 'max-width: 140px;', 'class' => ''],
                        'filter' => false
                    ],
                    [
                        'attribute' => 'speed',
                        'headerOptions' => ['class' => 'justify-content-center'],
                        'label' => 'Tezlik',
                        'contentOptions' => ['style' => 'width: 80px;', 'class' => ''],
                        'filter' => false
                    ],
                    [
                        'attribute' => 'traffic',
                        'headerOptions' => ['class' => 'justify-content-center'],
                        'value' => function ($model) {
                            return $model->unlim ? "unlim" : $model->traffic;
                        },
                        'contentOptions' => ['style' => 'max-width: 100px;', 'class' => ''],
                        'filter' => false
                    ],
                    [
                        'attribute' => 'un_traffic',
                        'headerOptions' => ['class' => 'justify-content-center'],
                        'label' => 'Qo’shimcha trafik',
                        'contentOptions' => ['style' => 'max-width: 200px;', 'class' => ''],
                        'filter' => false
                    ],
                    [
                        'attribute' => 'shart',
                        'headerOptions' => ['class' => 'justify-content-center'],
                        'contentOptions' => ['style' => 'max-width: 200px;', 'class' => ''],
                        'label' => 'Shartlar',
                        'filter' => false
                    ],
                    [
                        'attribute' => 'bonus',
                        'headerOptions' => ['class' => 'justify-content-center'],
                        'contentOptions' => ['style' => 'max-width: 150px;', 'class' => ''],
                        'label' => 'Bonuslar',
                        'filter' => false
                    ],
                    [
                        'attribute' => 'status',
                        'headerOptions' => ['class' => 'justify-content-center'],
                        'contentOptions' => ['style' => 'width: 130px;', 'class' => ''],
                        'label' => 'Holati',
                        'format' => 'raw',
                        'value' => function ($model) {
                            if ($model->status == Tariffs::STATUS_ACTIVE) {
                                return '<span class="badge badge-success">Active</span>';
                            }
                            return '<span class="badge badge-danger">Arxiv</span>';
                        },
                        'filter' => [
                                "All",
                            Tariffs::STATUS_ACTIVE => "Active",
                            Tariffs::STATUS_INACTIVE => "Arxive"
                        ]
                    ],
                ]
            ])

            ?>
        </div>
    </div>
</main>
