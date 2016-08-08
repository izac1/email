<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Delivery;

/**
 * DeliverySearch represents the model behind the search form about `app\models\Delivery`.
 */
class DeliverySearch extends Delivery
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id','delivery_name'], 'safe'],
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
        $query = Delivery::find();

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

        if($this->delivery_name!=""){

            $query->andFilterWhere(['like', 'delivery_name', $this->delivery_name]);

        }else
        $query->innerJoinWith(['user'])->FilterWhere(['like','last_name',$this->user_id])
        ->orFilterWhere(['like','first_name',$this->user_id])
        ->orFilterWhere(['like','email',$this->user_id]);

        return $dataProvider;
    }
}