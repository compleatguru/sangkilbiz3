<?php

namespace biz\master\models\searchs;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use biz\master\models\Warehouse as WarehouseModel;

/**
 * Warehouse represents the model behind the search form about `biz\master\models\Warehouse`.
 */
class Warehouse extends WarehouseModel
{
    public function rules()
    {
        return [
            [['id_warehouse', 'id_branch', 'create_by', 'update_by'], 'integer'],
            [['cd_whse', 'nm_whse', 'create_at', 'update_at'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = WarehouseModel::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_warehouse' => $this->id_warehouse,
            'id_branch' => $this->id_branch,
            'create_by' => $this->create_by,
            'update_by' => $this->update_by,
        ]);

        $query->andFilterWhere(['like', 'cd_whse', $this->cd_whse])
            ->andFilterWhere(['like', 'nm_whse', $this->nm_whse])
            ->andFilterWhere(['like', 'create_at', $this->create_at])
            ->andFilterWhere(['like', 'update_at', $this->update_at]);

        return $dataProvider;
    }
}
