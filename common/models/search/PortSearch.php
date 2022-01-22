<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Port;

/**
 * PortSearch represents the model behind the search form of `common\models\Port`.
 */
class PortSearch extends Port
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date'],'safe'],
            [['id', 'adsl_busy', 'adsl_free', 'vdsl_busy', 'vdsl_free', 'vdsl_cipher', 'fttb_busy_cor_seg', 'fttb_free_cor_seg', 'fttb_busy_mas_seg', 'fttb_free_mas_seg', 'gpon_every_olt', 'gpon_every_busy', 'gpon_free_sip_size', 'branch_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Port::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'adsl_busy' => $this->adsl_busy,
            'adsl_free' => $this->adsl_free,
            'vdsl_busy' => $this->vdsl_busy,
            'vdsl_free' => $this->vdsl_free,
            'vdsl_cipher' => $this->vdsl_cipher,
            'fttb_busy_cor_seg' => $this->fttb_busy_cor_seg,
            'fttb_free_cor_seg' => $this->fttb_free_cor_seg,
            'fttb_busy_mas_seg' => $this->fttb_busy_mas_seg,
            'fttb_free_mas_seg' => $this->fttb_free_mas_seg,
            'gpon_every_olt' => $this->gpon_every_olt,
            'gpon_every_busy' => $this->gpon_every_busy,
            'gpon_free_sip_size' => $this->gpon_free_sip_size,
            'branch_id' => $this->branch_id,
        ]);

        return $dataProvider;
    }
}
