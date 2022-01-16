<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tariffs".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $reg_pay
 * @property int|null $ab_pay
 * @property int|null $speed
 * @property string|null $traffic
 * @property string|null $un_traffic
 * @property string|null $shart
 * @property string|null $bonus
 * @property int|null $status
 * @property int|null $created_at
 * @property int|null $deleted_at
 * @property int|null $unlim
 * @property int|null $provider_id
 */
class Tariffs extends \yii\db\ActiveRecord
{

    const STATUS_ACTIVE  = 1;
    const STATUS_INACTIVE  = 0;


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tariffs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['reg_pay', 'ab_pay', 'speed', 'status','unlim', 'provider_id'], 'integer','message' => 'Kiritilgan qiymat butun son bo\'lishi kerak'],
            [['name', 'traffic', 'un_traffic', 'shart', 'bonus', 'created_at', 'deleted_at','updated_at'], 'string', 'max' => 255,'message' => 'Max belgi 255 tadan ko\'p bo\'lmasligi kerak'],
            [['provider_id'],'required','message' => 'Provider tanlashingiz shart'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'reg_pay' => 'Reg Pay',
            'ab_pay' => 'Абон. плата',
            'speed' => 'Скорость',
            'traffic' => 'Трафик',
            'un_traffic' => 'ДП. трафик',
            'shart' => 'Условие',
            'bonus' => 'Бонус   ',
            'status' => 'Status',
            'created_at' => 'Created At',
            'deleted_at' => 'Deleted At',
            'provider_id' => 'Provider ID',
        ];
    }

    public function getCompanies()
    {
        return $this->hasOne(Companies::class,['id' => 'provider_id']);
    }
}
