<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Risorseumanebersaglio;

/**
 * RisorseumanebersaglioSearch represents the model behind the search form of `\app\models\Risorseumanebersaglio`.
 */
class RisorseumanebersaglioSearch extends Risorseumanebersaglio
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_bersaglio', 'id_risorse_umane'], 'integer'],
            [['data', 'utente'], 'safe'],
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
        $query = Risorseumanebersaglio::find();

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
            'id_bersaglio' => $this->id_bersaglio,
            'id_risorse_umane' => $this->id_risorse_umane,
            'data' => $this->data,
        ]);

        $query->andFilterWhere(['like', 'utente', $this->utente]);

        return $dataProvider;
    }
}
