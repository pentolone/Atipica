<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Statoattivita;

/**
 * StatoattivitaSearch represents the model behind the search form of `\app\models\Statoattivita`.
 */
class StatoattivitaSearch extends Statoattivita
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['descrizione', 'colore', 'note', 'data', 'utente'], 'safe'],
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
        $query = Statoattivita::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['descrizione' => SORT_ASC]]
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
            'data' => $this->data,
        ]);

        $query->andFilterWhere(['like', 'descrizione', $this->descrizione])
            ->andFilterWhere(['like', 'colore', $this->colore])
            ->andFilterWhere(['like', 'note', $this->note])
            ->andFilterWhere(['like', 'utente', $this->utente]);

        return $dataProvider;
    }
}
