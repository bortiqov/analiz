<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Tariffs;

/**
 * Tariffs represents the model behind the search form of `common\models\Tariffs`.
 */
class TariffsSearch extends Tariffs
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'reg_pay', 'ab_pay', 'speed', 'status', 'created_at', 'deleted_at', 'provider_id'], 'integer'],
            [['name', 'traffic', 'un_traffic', 'shart', 'bonus'], 'safe'],
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
        $query = Tariffs::find();

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
            'reg_pay' => $this->reg_pay,
            'ab_pay' => $this->ab_pay,
            'speed' => $this->speed,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'deleted_at' => $this->deleted_at,
            'provider_id' => $this->provider_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'traffic', $this->traffic])
            ->andFilterWhere(['like', 'un_traffic', $this->un_traffic])
            ->andFilterWhere(['like', 'shart', $this->shart])
            ->andFilterWhere(['like', 'bonus', $this->bonus]);

        return $dataProvider;
    }
}
