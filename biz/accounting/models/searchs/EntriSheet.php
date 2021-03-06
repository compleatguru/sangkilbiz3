<?php

namespace biz\accounting\models\searchs;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use biz\accounting\models\EntriSheet as EntriSheetModel;

/**
 * EntriSheet represents the model behind the search form about `biz\accounting\models\EntriSheet`.
 */
class EntriSheet extends EntriSheetModel
{
    public function rules()
    {
        return [
            [['id_esheet', 'create_by', 'update_by'], 'integer'],
            [['cd_esheet', 'nm_esheet', 'create_at', 'update_at'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = EntriSheetModel::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_esheet' => $this->id_esheet,
            'create_by' => $this->create_by,
            'update_by' => $this->update_by,
        ]);

        $query->andFilterWhere(['like', 'cd_esheet', $this->cd_esheet])
            ->andFilterWhere(['like', 'nm_esheet', $this->nm_esheet])
            ->andFilterWhere(['like', 'create_at', $this->create_at])
            ->andFilterWhere(['like', 'update_at', $this->update_at]);

        return $dataProvider;
    }
}
