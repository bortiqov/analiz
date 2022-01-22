<?php

/* @var $this yii\web\View */
/* @var $model \frontend\models\CheckForm */
/* @var $providers Array */
/* @var $dataProvider \yii\data\ActiveDataProvider */
/* @var $searchModel \common\models\Companies */
/* @var $providerCount \phpDocumentor\Reflection\Types\Integer */

/* @var $tariffs Array */

/**
 * @var $model \common\models\Port
 */


use common\models\Tariffs;
use kartik\date\DatePicker;
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
                    Arxiv tariflar
                </div>
            </div>
        </div>

        <div class="mt-4 bg-white shadow-lg rounded  px-4 py-10 ">
            <?php $form = \yii\widgets\ActiveForm::begin([
                    'method' => 'get',
                    'id' => 'form-data'
            ]);
            ?>
           <div class="d-flex">
               <div class="date" style="width: 300px">
                   <?php
                   echo DatePicker::widget([
                       'name' => 'PortSearch[date]',
                       'type' => DatePicker::TYPE_INPUT,
                       'value' =>$searchModel->date ?? date('d-m-Y'),
                       'id' =>'select-date',
                       'pluginOptions' => [
                           'autoclose' => true,
                           'format' => 'dd-mm-yyyy'
                       ]
                   ]);
                   ?>
               </div>
               <div class="date" style="width: 300px; margin-left: 30px">
                   <?php
                   echo $form->field($searchModel, 'branch_id')->dropDownList(\common\models\Branch::getDropDownList(),['prompt' => 'Filialni tanlang','id' => 'branch-id'])->label(false)
                   ?>
               </div>
           </div>


            <?php \yii\widgets\ActiveForm::end();
            ?>
            <div class="scroll-page" style="padding:50px 10px">
                <table class="mt-5 table table-bordered">
                    <thead class="thead-bg">
                    <tr class="text-center">
                        <th rowspan=2 class="">Филиал</th>
                        <th colspan="3">ADSL</th>
                        <th colspan="5">VDSL</th>
                        <th colspan="9">FTTB</th>
                        <th colspan="5">GPON</th>
                    </tr>
                    <tr>
                        <th>Всего</th>
                        <th>Занято</th>
                        <th>Свободно</th>
                        <th>Всего</th>
                        <th>Занято</th>
                        <th>Занято
                            ШПД
                        </th>
                        <th>Свободно</th>
                        <th>Свободно ШПД</th>
                        <th>Всего</th>
                        <th>Занято</th>
                        <th>Свободно</th>
                        <th>Всего корп. сегм</th>
                        <th>Занято корп. сегм</th>
                        <th>Свободно корп. сегм</th>
                        <th>Всего масс. сегм</th>
                        <th>Занято масс. сегм</th>
                        <th>Свободно масс. сегм</th>
                        <th>Всего ёмкость OLT</th>
                        <th>Всего сплит. ёмкость</th>
                        <th>Всего занято</th>
                        <th>Всего свободно OLT</th>
                        <th>Свободно сплит. ёмкость</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php $arr1 = [];
                    if ($dataProvider->query->exists()):
                    foreach ($dataProvider->getModels() as $index => $model): ?>
                        <tr>
                            <th><?= $model->branch->name; ?></th>
                            <td><?php $b = $model->adsl_busy + $model->adsl_free;
                                $arr1[0][] = $b;
                                echo $b;
                                ?>
                            </td>
                            <td><?php $b = $model->adsl_busy;
                                $arr1[1][] = $b;
                                echo $b;
                                ?>
                            </td>
                            <td><?php $b = $model->adsl_free;
                                $arr1[2][] = $b;
                                echo $b;
                                ?>
                            </td>
                            <td><?php $b = $model->vdsl_busy + $model->vdsl_free;
                                $arr1[3][] = $b;
                                echo $b;
                                ?>
                            </td>
                            <td><?php $b = $model->vdsl_busy;
                                $arr1[4][] = $b;
                                echo $b;
                                ?>
                            </td>
                            <td><?php $b = $model->vdsl_cipher;
                                $arr1[5][] = $b;
                                echo $b;
                                ?>
                            </td>
                            <td><?php $b = $model->vdsl_free;
                                $arr1[6][] = $b;
                                echo $b;
                                ?></td>
                            <td><?php $b = $model->vdsl_busy + $model->vdsl_free - $model->vdsl_cipher;
                                $arr1[7][] = $b;
                                echo $b;
                                ?></td>
                            <td><?php $b = $model->fttb_busy_cor_seg + $model->fttb_busy_mas_seg + $model->fttb_free_cor_seg + $model->fttb_free_cor_seg;
                                $arr1[8][] = $b;
                                echo $b;
                                ?></td>
                            <td><?php $b = $model->fttb_busy_cor_seg + $model->fttb_busy_mas_seg;
                                $arr1[9][] = $b;
                                echo $b;
                                ?></td>
                            <td><?php $b = $model->fttb_free_cor_seg + $model->fttb_free_cor_seg;
                                $arr1[10][] = $b;
                                echo $b;
                                ?></td>
                            <td><?php $b = $model->fttb_busy_cor_seg + $model->fttb_free_cor_seg;
                                $arr1[11][] = $b;
                                echo $b;

                                ?></td>
                            <td><?php $b = $model->fttb_busy_cor_seg;

                                $arr1[12][] = $b;
                                echo $b;
                                ?></td>
                            <td><?php $b = $model->fttb_free_cor_seg;
                                $arr1[13][] = $b;
                                echo $b;
                                ?></td>
                            <td><?php $b = $model->fttb_busy_mas_seg + $model->fttb_free_mas_seg;
                                $arr1[14][] = $b;
                                echo $b;
                                ?></td>
                            <td><?php $b = $model->fttb_busy_mas_seg;
                                $arr1[15][] = $b;
                                echo $b;
                                ?></td>
                            <td><?php $b = $model->fttb_free_mas_seg;
                                $arr1[16][] = $b;
                                echo $b;
                                ?></td>
                            <td><?php $b = $model->gpon_every_olt;

                                $arr1[17][] = $b;
                                echo $b;
                                ?></td>
                            <td><?php $b = $model->gpon_every_busy + $model->gpon_free_sip_size;
                                $arr1[18][] = $b;
                                echo $b;
                                ?></td>
                            <td><?php $b = $model->gpon_every_busy;
                                $arr1[19][] = $b;
                                echo $b;

                                ?></td>
                            <td><?php $b = $model->gpon_every_olt - $model->gpon_every_busy;
                                $arr1[20][] =$b;
                                echo $b;
                                ?></td>
                            <td><?php $b = $model->gpon_free_sip_size;

                                $arr1[21][] = $b;
                                echo $b;
                                ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <th>ИТОГО:</th>
                        <th><?php
                            echo array_sum($arr1[0]);
                            ?>
                        </th>
                        <th><?php  echo array_sum($arr1[1]); ?>
                        <th><?php  echo array_sum($arr1[2]); ?></th>
                        <th><?php  echo array_sum($arr1[3]); ?></th>
                        <th><?php  echo array_sum($arr1[4]); ?></th>
                        <th><?php  echo array_sum($arr1[5]); ?></th>
                        <th><?php  echo array_sum($arr1[6]); ?></th>
                        <th><?php  echo array_sum($arr1[7]); ?></th>
                        <th><?php  echo array_sum($arr1[8]); ?></th>
                        <th><?php  echo array_sum($arr1[9]); ?></th>
                        <th><?php  echo array_sum($arr1[10]); ?></th>
                        <th><?php  echo array_sum($arr1[11]); ?></th>
                        <th><?php  echo array_sum($arr1[12]); ?></th>
                        <th><?php  echo array_sum($arr1[13]); ?></th>
                        <th><?php  echo array_sum($arr1[14]); ?></th>
                        <th><?php  echo array_sum($arr1[15]); ?></th>
                        <th><?php  echo array_sum($arr1[16]); ?></th>
                        <th><?php  echo array_sum($arr1[17]); ?></th>
                        <th><?php  echo array_sum($arr1[18]); ?></th>
                        <th><?php  echo array_sum($arr1[19]); ?></th>
                        <th><?php  echo array_sum($arr1[20]); ?></th>
                        <th><?php  echo array_sum($arr1[21]); ?></th>
                    </tr>
                    <?php endif;?>
                    </tbody>
                </table>
            </div>

            <div class="scroll-page" style="margin-top: 80px;padding:50px 10px">
                <table class="table table-bordered">
                    <thead class="thead-bg">
                    <tr class="text-center">
                        <th rowspan=2 class="">Филиал</th>
                        <th colspan="4">Всего портов
                            (с учетом корпоративного сегмента
                        </th>
                        <th colspan="3">Всего коммерческих
                            портов (без учета корпоративного сегмента и с учетом сплиттерной ёмкости)
                        </th>
                        <th colspan="4">Эффективность, %</th>
                        <th colspan="3">2020 йил якунларига кўра статистик маълумотлар</th>
                        <th rowspan="3" colspan="2"> Кенг полосали хизматдан фойдаланувчилар сони</th>
                    </tr>
                    <tr>
                        <th>Всего ёмкость OLT</th>
                        <th>Всего сплит. ёмкость</th>
                        <th>Всего Занят</th>
                        <th>Всего Свободно</th>
                        <th>Всего ком. портов</th>
                        <th>Занято</th>
                        <th>Свободно</th>
                        <th>ADSL</th>
                        <th>VDSL</th>
                        <th>FTTB</th>
                        <th>GPON</th>
                        <th>Аҳоли (минг киши)</th>
                        <th>Уй хўжаликлари (минг та)</th>
                        <th>Ўртача битта хўжаликда</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if ($dataProvider->query->exists()):
                    $arr = [];
                    foreach ($dataProvider->getModels() as $index => $model): ?>
                        <tr>
                            <th><?= $model->branch->name ?></th>
                            <td><?php
                                $b = $model->adsl_busy + $model->adsl_free + $model->vdsl_busy +
                                    $model->vdsl_free + $model->fttb_busy_mas_seg +
                                    $model->fttb_free_mas_seg + $model->gpon_every_busy + $model->gpon_free_sip_size +
                                    $model->fttb_busy_cor_seg + $model->fttb_free_cor_seg - ($model->gpon_every_busy + $model->gpon_free_sip_size) +
                                    $model->gpon_every_olt;

                                $arr[1][] = $b;
                                echo $b;
                                ?></td>
                            <td><?php $b = $model->adsl_busy + $model->adsl_free + $model->vdsl_busy +
                                    $model->vdsl_free + $model->fttb_busy_mas_seg +
                                    $model->fttb_free_mas_seg + $model->gpon_every_busy +
                                    $model->gpon_free_sip_size + $model->fttb_busy_cor_seg +
                                    $model->fttb_free_cor_seg;

                                $arr[2][] = $b;
                                echo $b;
                                ?></td>
                            <td><?php $b = $model->adsl_busy + $model->vdsl_busy + $model->fttb_busy_cor_seg +
                                    $model->fttb_busy_mas_seg + $model->gpon_every_busy;

                                $arr[3][] = $b;
                                echo $b;
                                ?>
                            </td>
                            <td><?php $b = $model->adsl_free + $model->vdsl_free + $model->fttb_free_cor_seg +
                                    $model->fttb_free_mas_seg + $model->gpon_free_sip_size;
                                $arr[4][] = $b;
                                echo $b; ?>
                            </td>
                            <td><?php $b = $model->adsl_busy + $model->adsl_free + $model->vdsl_busy +
                                    $model->vdsl_free + $model->fttb_busy_mas_seg +
                                    $model->fttb_free_mas_seg + $model->gpon_every_busy +
                                    $model->gpon_free_sip_size;

                                $arr[5][] = $b;
                                echo $b;
                                ?>
                            </td>
                            <td><?php $b = $model->adsl_busy + $model->vdsl_busy + $model->fttb_busy_mas_seg +
                                    $model->gpon_every_busy;
                                $arr[6][] = $b;
                                echo $b;
                                ?>
                            </td>
                            <td><?php $b = $model->adsl_free + $model->vdsl_cipher + $model->fttb_free_mas_seg +
                                    $model->gpon_every_olt - $model->gpon_every_busy;
                                $arr[7][] = $b;
                                echo $b;
                                ?>
                            </td>
                            <td><?= ($model->adsl_busy + $model->adsl_free) ? round($model->adsl_busy / ($model->adsl_busy + $model->adsl_free) * 100) . "%" : "-"; ?></td>
                            <td><?= ($model->vdsl_busy + $model->vdsl_free) ? round($model->vdsl_busy / ($model->vdsl_busy + $model->vdsl_free) * 100) . "%" : "-"; ?></td>
                            <td><?= ($model->fttb_busy_mas_seg + $model->fttb_free_mas_seg) ? round($model->fttb_busy_mas_seg / ($model->fttb_busy_mas_seg + $model->fttb_free_mas_seg) * 100) . "%" : "-"; ?></td>
                            <td><?= ($model->gpon_every_busy + $model->gpon_free_sip_size) ? round($model->gpon_every_busy / ($model->gpon_every_busy + $model->gpon_free_sip_size) * 100) . "%" : "-"; ?></td>


                            <td><?php $b = $model->branch->people;
                                $arr[8][] =$b;
                                echo $b;
                                ?></td>
                            <td><?php $b = $model->branch->house_hold;
                                $arr[9][] = $b;
                                echo $b;
                                ?></td>
                            <td><?= $model->branch->house_hold ? Yii::$app->formatter->asDecimal($model->branch->people / $model->branch->house_hold, 1) : "-"; ?></td>
                            <td><?php $a = $model->branch->house_hold ? Yii::$app->formatter->asDecimal($model->branch->people / $model->branch->house_hold, 1) : 1;
                                echo $a * ($model->adsl_busy + $model->adsl_free + $model->vdsl_busy +
                                        $model->vdsl_free + $model->fttb_busy_mas_seg +
                                        $model->fttb_free_mas_seg + $model->gpon_every_busy +
                                        $model->gpon_free_sip_size + $model->fttb_busy_cor_seg +
                                        $model->fttb_free_cor_seg); ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <th>ИТОГО:</th>
                        <th><?= array_sum($arr[1]); ?></th>
                        <th><?= array_sum($arr[2]); ?></th>
                        <th><?= array_sum($arr[3]); ?></th>
                        <th><?= array_sum($arr[4]); ?></th>
                        <th><?= array_sum($arr[5]); ?></th>
                        <th><?= array_sum($arr[6]); ?></th>
                        <th><?= array_sum($arr[7]); ?></th>
                        <th><?php
                            $sum1 = array_sum($arr1[0]);
                            $sum2 = array_sum($arr1[1]);
                            echo $sum1 ? (round($sum2 / $sum1 * 100)) . "%" : 1;
                            ?>
                        </th>
                        <th><?php
                            $sum4 = array_sum($arr1[3]);
                            $sum5 = array_sum($arr1[4]);
                            echo $sum4 ? (round($sum5 / $sum4 * 100)) . "%" : 1;

                            ?>
                        </th>
                        <th><?php
                            $sum1 = array_sum($arr1[14]);
                            $sum2 = array_sum($arr1[15]);
                            echo $sum1 ? (round($sum2 / $sum1 * 100)) . "%" : 1;

                            ?>
                        </th>
                        <th><?php
                            $sum1 = array_sum($arr1[19]);
                            $sum2 = array_sum($arr1[20]);
                            echo $sum1 ? (round($sum2 / $sum1 * 100)) . "%" : 1;
                            ?>
                        </th>
                        <th><?= array_sum($arr[8]); ?></th>
                        <th><?= array_sum($arr[9]); ?></th>
                        <th><?php $sum = array_sum($arr[8]); $people =Yii::$app->formatter->asDecimal($sum ? array_sum($arr[9])/$sum:1,1); echo $people; ?></th>
                        <th><?php echo array_sum($arr[3]) *  $people; ?></th>

                    </tr>
                    <?php endif;?>
                    </tbody>
                </table>
            </div>




        </div>
    </div>
</main>
