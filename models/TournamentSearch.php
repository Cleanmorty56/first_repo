<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Tournament;

/**
 * TournamentSearch represents the model behind the search form of `app\models\Tournament`.
 */
class TournamentSearch extends Tournament
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'gamemode_id', 'quantity_rounds', 'level_id'], 'integer'],
            [['img', 'name', 'description', 'location', 'status', 'registration_date'], 'safe'],
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
        $query = Tournament::find();

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
            'gamemode_id' => $this->gamemode_id,
            'quantity_rounds' => $this->quantity_rounds,
            'level_id' => $this->level_id,
            'registration_date' => $this->registration_date,
        ]);

        $query->andFilterWhere(['like', 'img', $this->img])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
