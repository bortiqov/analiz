<?php

/* @var $this yii\web\View */
/* @var $model \frontend\models\CheckForm */
/* @var $providers Array */
/* @var $tariffList Array */
/* @var $data Array */
/* @var $searchModel \common\models\Companies */
/* @var $providerCount \phpDocumentor\Reflection\Types\Integer */

/* @var $tariffs Array */


use common\models\Tariffs;
use kartik\depdrop\DepDrop;
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
        <div class="mt-4 bg-white shadow-lg rounded  px-4 py-10">
            <div class="text-2xl mb-10"> Tariflar ro'yhati</div>
            <?php $form = \yii\widgets\ActiveForm::begin(); ?>
            <div class="grid grid-cols-1 md:grid-cols-2 xl:w-9/12 gap-5">
                <div class="flex">
                    <?php echo $form->field($model, 'provider_id')->dropDownList($providers, [
                            'id' => 'provider-id',
                            'class' => 'form-select form-control
                                block
                                w-full
                                px-3
                                py-1.5
                                text-base
                                font-normal
                                text-gray-700
                                bg-white bg-clip-padding bg-no-repeat
                                border border-solid border-gray-300
                                rounded
                                transition
                                ease-in-out
                                m-0
                                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none',
                        'prompt' => 'Providerni tanlang'
                    ])->label(false) ?>
                </div>
                <div class="flex">
                    <?php echo $form->field($model, 'tariff_id')->widget(DepDrop::classname(), [
                        'type' => DepDrop::TYPE_SELECT2,
                        'data' => $tariffList,
                        'options' => ['id' => 'provider', 'placeholder' => 'Tariff tanlang',
                            'class' => 'form-control
                                block
                                w-full
                                px-3
                                py-1.5
                                text-base
                                font-normal
                                text-gray-700
                                bg-white bg-clip-padding bg-no-repeat
                                border border-solid border-gray-300
                                rounded
                                transition
                                ease-in-out
                                m-0
                                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none',

                            ],
                        'select2Options' => ['pluginOptions' => ['allowClear' => true]],
                        'pluginOptions' => [
                            'depends' => ['provider-id'],
                            'url' => Url::to(['/site/tariffs']),
                        ]
                    ])->label(false);
                    ?>

                </div>



                <div class="flex">
                    <?php echo $form->field($model, 'provider_id2')->dropDownList($providers, [
                        'id' => 'provider-id2',
                        'class' => 'form-select form-control
                                block
                                w-full
                                px-3
                                py-1.5
                                text-base
                                font-normal
                                text-gray-700
                                bg-white bg-clip-padding bg-no-repeat
                                border border-solid border-gray-300
                                rounded
                                transition
                                ease-in-out
                                m-0
                                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none',
                        'prompt' => 'Providerni tanlang'
                    ])->label(false) ?>
                </div>
                <div class="flex">
                    <?php echo $form->field($model, 'tariff_id2')->widget(DepDrop::classname(), [
                        'type' => DepDrop::TYPE_SELECT2,
                        'data' => $tariffList,
                        'options' => ['id' => 'provider2', 'placeholder' => 'Tariff tanlang',
                            'class' => 'form-control
                                block
                                w-full
                                px-3
                                py-1.5
                                text-base
                                font-normal
                                text-gray-700
                                bg-white bg-clip-padding bg-no-repeat
                                border border-solid border-gray-300
                                rounded
                                transition
                                ease-in-out
                                m-0
                                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none',

                        ],
                        'select2Options' => ['pluginOptions' => ['allowClear' => true]],
                        'pluginOptions' => [
                            'depends' => ['provider-id2'],
                            'url' => Url::to(['/site/tariff']),
                        ]
                    ])->label(false);
                    ?>

                </div>

                <div class="col-span-full d-flex justify-content-between">
                    <button class="px-5 py-3 rounded bg-green-500 text-secondary">
                        Tekshirish
                    </button>
                    <a href="/check" type="reset" class="px-5 py-3 rounded bg-danger text-white">
                        reset
                    </a>
                </div>
            </div>
            <?php \yii\widgets\ActiveForm::end(); ?>


            <div class="text-2xl mt-10 mb-10">Natijalar</div>
            <?php  if ($data[0]):?>
                <table class="table tab-content">
                    <tr>
                        <th>Provider</th>
                        <th>Ta'riff rejasi</th>
                        <th>Tezligi</th>
                        <th>Abonetn to'lovi</th>
                        <th>Registratsion to'lov</th>
                        <th>Trafik</th>
                        <th>Limitdan tashqari trafik</th>
                        <th>Shartlar</th>
                        <th>Bonus</th>
                        <th>Holati</th>
                    </tr>
                    <?php
                    foreach ($data as $index => $item):
                    ?>
                    <tr class="<?=$index == 0 ? "skyblue":""?> <?= ($index != 0 && $data[0]->id == $data[1]->id)  ? "skyblue":""?>">
                        <td><?=$item->companies->name?></td>
                        <td><?=$item->name?></td>
                        <td><?=$item->speed?></td>
                        <td><?=$item->ab_pay?></td>
                        <td><?=$item->reg_pay?></td>
                        <td><?=$item->unlim ? "unlim": $item->traffic?></td>
                        <td><?=$item->un_traffic?></td>
                        <td><?=$item->shart?></td>
                        <td><?=$item->bonus?></td>
                        <td><?=$item->status ? '<span class="badge badge-success">Active</span>':'<span class="badge badge-danger">Arxiv</span>'?></td>
                    </tr>
                    <?php endforeach;?>
                </table>
            <?php endif;?>
        </div>
    </div>
</main>
