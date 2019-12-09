<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\activity;

/**
 * ActivitySearchCrud represents the model behind the search form of `app\models\activity`.
 */
class ActivitySearchCrud extends activity
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_author', 'isBlocked', 'isRepeat'], 'integer'],
            [['title', 'description', 'date', 'timeBegin', 'timeEnd', 'repeatType', 'email', 'createDate'], 'safe'],
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
        $query = activity::find();

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
            'id_author' => $this->id_author,
            'date' => $this->date,
            'timeBegin' => $this->timeBegin,
            'timeEnd' => $this->timeEnd,
            'isBlocked' => $this->isBlocked,
            'isRepeat' => $this->isRepeat,
            'createDate' => $this->createDate,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'repeatType', $this->repeatType])
            ->andFilterWhere(['like', 'email', $this->email]);
        $query->with('author');
        return $dataProvider;
    }

}
