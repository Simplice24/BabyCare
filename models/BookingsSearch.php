<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Bookings;

/**
 * BookingsSearch represents the model behind the search form of `app\models\Bookings`.
 */
class BookingsSearch extends Bookings
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'number_of_babysitters', 'created_at', 'updated_at'], 'integer'],
            [['babysitter_age_range', 'languages_spoken', 'gender', 'date', 'service', 'starting_time', 'ending_time', 'email', 'phone_number', 'address'], 'safe'],
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
        $query = Bookings::find();

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
            'number_of_babysitters' => $this->number_of_babysitters,
            'date' => $this->date,
            'service' => $this->service,
            'starting_time' => $this->starting_time,
            'ending_time' => $this->ending_time,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'babysitter_age_range', $this->babysitter_age_range])
            ->andFilterWhere(['like', 'languages_spoken', $this->languages_spoken])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'date', $this->date])
            ->andFilterWhere(['like', 'service', $this->service])
            ->andFilterWhere(['like', 'phone_number', $this->phone_number])
            ->andFilterWhere(['like', 'address', $this->address]);

        return $dataProvider;
    }
}
