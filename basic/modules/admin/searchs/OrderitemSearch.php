<?php

namespace app\modules\admin\searchs;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\OrderItem;

/**
 * OrderitemSearch represents the model behind the search form of `app\modules\admin\models\OrderItem`.
 */
class OrderitemSearch extends OrderItem
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'product_id', 'count'], 'integer'],
            [['price', 'cost'], 'number'],
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
        $query = OrderItem::find();

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
            'order_id' => $this->order_id,
            'product_id' => $this->product_id,
            'count' => $this->count,
            'price' => $this->price,
            'cost' => $this->cost,
        ]);

        return $dataProvider;
    }
}
