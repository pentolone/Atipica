<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Bersaglio;
use app\models\Anagrafica;
use yii\db\Query;

/**
 * BersaglioSearch represents the model behind the search form of `\app\models\Bersaglio`.
 */
class BersaglioSearch extends Bersaglio
{
	public $nomeUtente;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_anagrafica'], 'integer'],
            [['nomeUtente', 'titolo', 'descrizione', 'data', 'utente'], 'safe'],
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
        $query = Bersaglio::find()->select(['bersaglio.*', 'CONCAT(anagrafica.nome, \' \', anagrafica.cognome) AS nomeUtente'])
                                                ->joinWith(['anagrafica'])->asArray();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['titolo' => SORT_ASC]]
        ]);
        $dataProvider->sort->attributes['anagrafica'] = ['asc' => ['nomeUtente' => SORT_ASC],];
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_anagrafica' => $this->id_anagrafica,
            'data' => $this->data,
        ]);

        $query->andFilterWhere(['like', 'descrizione', $this->descrizione])
                   ->andFilterWhere(['like', 'CONCAT(nome, \' \', cognome)', $this->nomeUtente])
                   ->andFilterWhere(['like', 'utente', $this->utente]);
        return $dataProvider;
    }
}
