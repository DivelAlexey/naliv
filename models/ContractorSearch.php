<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Contractor;

/**
 * ContractorSearch represents the model behind the search form about `app\models\Contractor`.
 */
class ContractorSearch extends Contractor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'account_id'], 'integer'],
            [['name', 'inn', 'kpp'], 'safe'],
            [['is_seller', 'is_carrier', 'is_del', 'confirmed'], 'boolean'],
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
        $query = Contractor::find();

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
            'is_seller' => $this->is_seller,
            'is_carrier' => $this->is_carrier,
            'account_id' => $this->account_id,
            'is_del' => $this->is_del,
            'confirmed' => $this->confirmed,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'inn', $this->inn])
            ->andFilterWhere(['like', 'kpp', $this->kpp]);

        return $dataProvider;
    }
}
