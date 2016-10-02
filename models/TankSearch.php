<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Tank;

/**
 * TankSearch represents the model behind the search form about `app\models\Tank`.
 */
class TankSearch extends Tank
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'contractor_id', 'tank_status_id', 'created_user_id'], 'integer'],
            [['vin', 'sections', 'next_order_date', 'created_date'], 'safe'],
            [['max_weight'], 'number'],
            [['confirmed'], 'boolean'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Tank::find();

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
            'contractor_id' => $this->contractor_id,
            'tank_status_id' => $this->tank_status_id,
            'max_weight' => $this->max_weight,
            'next_order_date' => $this->next_order_date,
            'created_date' => $this->created_date,
            'created_user_id' => $this->created_user_id,
            'confirmed' => $this->confirmed,
        ]);

        $query->andFilterWhere(['like', 'vin', $this->vin])
            ->andFilterWhere(['like', 'sections', $this->sections]);

        return $dataProvider;
    }
}
