<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "branch".
 *
 * @property int $id
 * @property string|null $name
 * @property float|null $people
 * @property float|null $house_hold
 */
class Branch extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'branch';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['people', 'house_hold'], 'double'],
            [['name'], 'string', 'max' => 255],
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
            'people' => 'People',
            'house_hold' => 'House Hold',
        ];
    }

    public static function getDropDownList()
    {
        return ArrayHelper::map(static::find()->all(), 'id','name');
    }
}
