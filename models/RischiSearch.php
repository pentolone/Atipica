<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Rischi;

/**
 * RischiSearch represents the model behind the search form of `\app\models\Rischi`.
 */
class RischiSearch extends Rischi
{
	public $nomeUtente;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_bersaglio'], 'integer'],
            [['nomeUtente', 'titolo','descrizione', 'data', 'utente'], 'safe'],
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
        $query = Rischi::find()->select(['rischi.*', 'CONCAT(anagrafica.nome, \' \', anagrafica.cognome) AS nomeUtente'])
                                            ->from(['rischi', 'bersaglio', 'anagrafica'])
                                            ->where('bersaglio.id_anagrafica =  anagrafica.id')
                                            ->andWhere('bersaglio.id = rischi.id_bersaglio')
                                            ->asArray();
                                                //var_dump($query);
        //$query = Rischi::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['titolo'=>SORT_ASC]],
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
            'data' => $this->data,
        ]);

        $query->andFilterWhere(['like', 'descrizione', $this->descrizione])
            ->andFilterWhere(['like', 'CONCAT(nome, \' \', cognome)', $this->nomeUtente])
            ->andFilterWhere(['like', 'rischi.titolo', $this->titolo])
            ->andFilterWhere(['like', 'utente', $this->utente]);

        return $dataProvider;
    }
}
