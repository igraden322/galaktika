<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Workshop;

/**
 * WorkshopSearch represents the model behind the search form of `app\models\Workshop`.
 */
class WorkshopSearch extends Workshop
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'courseid'], 'integer'],
            [['begdate', 'enddate'], 'safe'],
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
        $query = Workshop::find();

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
            'courseid' => $this->courseid,
            'begdate' => $this->begdate,
            'enddate' => $this->enddate,
        ]);

        return $dataProvider;
    }
}
