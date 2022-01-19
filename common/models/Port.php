<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "port".
 *
 * @property int $id
 * @property int|null $adsl_busy
 * @property int|null $adsl_free
 * @property int|null $vdsl_busy
 * @property int|null $vdsl_free
 * @property int|null $vdsl_cipher
 * @property int|null $fttb_busy_cor_seg
 * @property int|null $fttb_free_cor_seg
 * @property int|null $fttb_busy_mas_seg
 * @property int|null $fttb_free_mas_seg
 * @property int|null $gpon_every_olt
 * @property int|null $gpon_every_busy
 * @property int|null $gpon_free_sip_size
 * @property int|null $branch_id
 * @property int|null $date
 *
 * @property Branch $branch
 */
class Port extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'port';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['adsl_busy', 'adsl_free', 'vdsl_busy', 'vdsl_free', 'vdsl_cipher', 'fttb_busy_cor_seg', 'fttb_free_cor_seg', 'fttb_busy_mas_seg', 'fttb_free_mas_seg', 'gpon_every_olt', 'gpon_every_busy', 'gpon_free_sip_size', 'branch_id', 'date'], 'integer'],
            [['branch_id'], 'exist', 'skipOnError' => true, 'targetClass' => Branch::className(), 'targetAttribute' => ['branch_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'adsl_busy' => 'Adsl Busy',
            'adsl_free' => 'Adsl Free',
            'vdsl_busy' => 'Vdsl Busy',
            'vdsl_free' => 'Vdsl Free',
            'vdsl_cipher' => 'Vdsl Cipher',
            'fttb_busy_cor_seg' => 'Fttb Busy Cor Seg',
            'fttb_free_cor_seg' => 'Fttb Free Cor Seg',
            'fttb_busy_mas_seg' => 'Fttb Busy Mas Seg',
            'fttb_free_mas_seg' => 'Fttb Free Mas Seg',
            'gpon_every_olt' => 'Gpon Every Olt',
            'gpon_every_busy' => 'Gpon Every Busy',
            'gpon_free_sip_size' => 'Gpon Free Sip Size',
            'branch_id' => 'Branch ID',
            'date' => 'Date',
        ];
    }

    /**
     * Gets query for [[Branch]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBranch()
    {
        return $this->hasOne(Branch::className(), ['id' => 'branch_id']);
    }
}
