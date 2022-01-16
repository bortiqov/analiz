<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;

class ProviderController extends Controller
{
    public function actionStart()
    {
        $sql = "DELETE FROM tariffs where id > 0";
        $db = Yii::$app->db;
        $db->createCommand($sql)->execute();
        $providerSql = file_get_contents(Yii::getAlias('console') . '/controllers/data/analiz.sql');
        $this->Exe($providerSql);
        var_dump("Barcha tariflar yuklandi OK !!!");
    }

    public function actionCreate()
    {
        $sql = "DELETE FROM companies where id > 0";
        $db = Yii::$app->db;
        $db->createCommand($sql)->execute();
        $providerSql = file_get_contents(Yii::getAlias('console') . '/controllers/data/companies.sql');
        $this->Exe($providerSql);
        var_dump("Barcha providerlar yuklandi OK !!!");

    }



    public function Exe($str)
    {
        $db = Yii::$app->db;
        $data = explode(";", $str);
        foreach ($data as $index => $datum) {
            if (count($data)- 1 != $index){
                $db->createCommand($datum)->execute();
            }
        }
    }
}