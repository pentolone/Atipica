<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Anagrafica;

/**
 * AnagraficaSearch represents the model behind the search form of `\app\models\Anagrafica`.
 */
class AnagraficaSearch extends Anagrafica
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_provincia', 'id_cittadinanza', 'id_stato_nascita', 'id_tipo_doc', 'id_luogo_rilascio', 'id_stato_civile', 'id_professione', 'id_titolo_studio', 'id_classificazione'], 'integer'],
            [['cognome', 'nome', 'sesso', 'indirizzo', 'citta', 'cap', 'luogo_nascita', 'codice_catastale', 'data_nascita', 'cf', 'ts', 'telefono', 'cellulare', 'telefono_rif', 'email', 'n_doc', 'data_ril', 'data_exp', 'data', 'utente'], 'safe'],
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
        $query = Anagrafica::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['nome' => SORT_ASC, 'cognome' => SORT_ASC]]
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
            'id_cittadinanza' => $this->id_cittadinanza,
            'id_stato_nascita' => $this->id_stato_nascita,
            'data_nascita' => $this->data_nascita,
            'id_tipo_doc' => $this->id_tipo_doc,
            'data_ril' => $this->data_ril,
            'data_exp' => $this->data_exp,
            'id_luogo_rilascio' => $this->id_luogo_rilascio,
            'id_stato_civile' => $this->id_stato_civile,
            'id_professione' => $this->id_professione,
            'id_titolo_studio' => $this->id_titolo_studio,
            'id_classificazione' => $this->id_classificazione,
            'data' => $this->data,
        ]);

        $query->andFilterWhere(['like', 'cognome', $this->cognome])
            ->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'sesso', $this->sesso])
            ->andFilterWhere(['like', 'indirizzo', $this->indirizzo])
            ->andFilterWhere(['like', 'citta', $this->citta])
            ->andFilterWhere(['like', 'cap', $this->cap])
            ->andFilterWhere(['like', 'luogo_nascita', $this->luogo_nascita])
            ->andFilterWhere(['like', 'codice_catastale', $this->codice_catastale])
            ->andFilterWhere(['like', 'cf', $this->cf])
            ->andFilterWhere(['like', 'ts', $this->ts])
            ->andFilterWhere(['like', 'telefono', $this->telefono])
            ->andFilterWhere(['like', 'cellulare', $this->cellulare])
            ->andFilterWhere(['like', 'telefono_rif', $this->telefono_rif])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'n_doc', $this->n_doc])
            ->andFilterWhere(['like', 'utente', $this->utente]);

        return $dataProvider;
    }
}
