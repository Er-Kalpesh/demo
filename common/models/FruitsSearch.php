<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Fruits;

/**
 * FruitsSearch represents the model behind the search form of `common\models\Fruits`.
 */
class FruitsSearch extends Fruits
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'ext_id', 'created_at', 'updated_at','is_favorite'], 'integer'],
            [['name', 'family', 'fruit_order', 'genus', 'nutritions'], 'safe'],
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
        $query = Fruits::find();

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

        if(!empty($this->is_favorite)){
            $query->andWhere(['is_favorite'=>'1']);
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'ext_id' => $this->ext_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'family', $this->family])
            ->andFilterWhere(['like', 'fruit_order', $this->fruit_order])
            ->andFilterWhere(['like', 'genus', $this->genus])
            ->andFilterWhere(['like', 'nutritions', $this->nutritions]);

        return $dataProvider;
    }
}
