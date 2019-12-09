<?php


namespace app\models;


use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;

class ActivitySearch extends Activity
{
    public function search($params=[]):ActiveDataProvider {
        $query = Activity::find();
        $this->load($params);
        $provider = new ActiveDataProvider( [
            'query'=>$query,
            'sort'=>[
                'defaultOrder' => [
                    'date'=>SORT_DESC
                ]
            ],
            'pagination' => [
                'pageSize' => 5
            ]
        ]);

        $query->with('author');
        if($params){
            foreach ($params as $key=>$val){
                if(ArrayHelper::keyExists($key,$params)){
                    $query->where([$key=>ArrayHelper::getValue($params,$key)]);
                }
            }

        }
        $query->andFilterWhere(['title'=>$this->title,'id_author'=>$this->id_author,'date'=>$this->date]);
        return $provider;
    }
}