<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Request;

/**
 * RequestSearch represents the model behind the search form about `app\models\Request`.
 */
class RequestSearch extends Request
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'type_id', 'request_status_id', 'contractor_id', 'created_user_id', 'accepted_user_id', 'track_id'], 'integer'],
            [['datetime', 'close_date_time'], 'safe'],
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
        $query = Request::find();

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
            'datetime' => $this->datetime,
            'type_id' => $this->type_id,
            'request_status_id' => $this->request_status_id,
            'contractor_id' => $this->contractor_id,
            'created_user_id' => $this->created_user_id,
            'accepted_user_id' => $this->accepted_user_id,
            'track_id' => $this->track_id,
            'close_date_time' => $this->close_date_time,
        ]);

        return $dataProvider;
    }
}
