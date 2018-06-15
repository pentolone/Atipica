<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Attivita;

/**
 * AttivitaSearch represents the model behind the search form of `\app\models\Attivita`.
 */
class AttivitaSearch extends Attivita
{
	public $nomeUtente;
	public $desBersaglio;
	public $desStatoAttivita;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_bersaglio', 'id_stato_attivita'], 'integer'],
            [['nomeUtente', 'desBersaglio', 'desStatoAttivita', 'descrizione', 'data_esecuzione_attivita', 'data_chiusura_attivita', 'note', 'data', 'utente'], 'safe'],
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
    public function search($params, $id_bersaglio = 0)
    {

        $filterBersaglio = '1 = 1';    	
    	  if($id_bersaglio > 0) {
    	  	   $filterBersaglio = 'attivita.id_bersaglio = ' . $id_bersaglio;
    	  	   
    	     }
        $query = Attivita::find()->select(['attivita.*', 'CONCAT(anagrafica.nome, \' \', anagrafica.cognome) AS nomeUtente,
                                                             bersaglio.descrizione AS desBersaglio,
                                                             stato_attivita.descrizione AS desStatoAttivita,
                                                             stato_attivita.colore AS colore'])
                                            ->from(['attivita', 'bersaglio', 'anagrafica', 'stato_attivita'])
                                            ->where('bersaglio.id_anagrafica =  anagrafica.id')
                                            ->andWhere('bersaglio.id = attivita.id_bersaglio')
                                            ->andWhere('stato_attivita.id = attivita.id_stato_attivita')
                                            ->andWhere($filterBersaglio)
                                            ->asArray();
        //$query = Attivita::find();
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['attributes' => ['nomeUtente', 'desBersaglio', 'descrizione', 'data_esecuzione_attivita'],
                          'defaultOrder' => ['data_esecuzione_attivita'=>SORT_DESC]],
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
            'id_stato_attivita' => $this->id_stato_attivita,
            'data_esecuzione_attivita' => $this->data_esecuzione_attivita,
            'data_chiusura_attivita' => $this->data_chiusura_attivita,
            'data' => $this->data,
        ]);

        $query->andFilterWhere(['like', 'descrizione', $this->descrizione])
            ->andFilterWhere(['like', 'CONCAT(nome, \' \', cognome)', $this->nomeUtente])
            ->andFilterWhere(['like','bersaglio.descrizione', $this->desBersaglio])
            ->andFilterWhere(['like', 'note', $this->note])
            ->andFilterWhere(['like', 'utente', $this->utente]);

        return $dataProvider;
    }
}
