<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Comuni;

/**
 * ComuniSearch represents the model behind the search form of `\app\models\Comuni`.
 */
class ComuniSearch extends Comuni
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_provincia'], 'integer'],
            [['nome', 'cap', 'codice_catastale', 'codice_PS', 'data', 'utente'], 'safe'],
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
        $query = Comuni::find();

        // add conditions that should always apply here
        // Join with province table

        //$query->join('INNER JOIN', 'province', 'comuni.id_provincia = province.id') ;
        //$query->joinWith('province');
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['nome'=>SORT_ASC]]
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
            'id_provincia' => $this->id_provincia,
            'data' => $this->data,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'cap', $this->cap])
            ->andFilterWhere(['like', 'codice_catastale', $this->codice_catastale])
            ->andFilterWhere(['like', 'codice_PS', $this->codice_PS])
            ->andFilterWhere(['like', 'utente', $this->utente]);
        return $dataProvider;
    }
}
