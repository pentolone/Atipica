<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Risorsebersaglio;

/**
 * RisorsebersaglioSearch represents the model behind the search form of `\app\models\Risorsebersaglio`.
 */
class RisorsebersaglioSearch extends Risorsebersaglio
{
	//public $desBersaglio;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
           // [['id_bersaglio','id_responsabilita', 'id_risorse_umane', 'id_risorse_esterne'], 'integer'],
           [['ctrResponsabilita'], 'integer'],
           [['desBersaglio', 'data', 'utente'], 'safe'],
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
        $query = Risorsebersaglio::find($params);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
           'sort'=> ['attributes' => ['desBersaglio'],
	            'defaultOrder' => ['desBersaglio' => SORT_ASC]],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_bersaglio' => $this->id_bersaglio,
            'id_risorse_umane' => $this->id_risorse_umane,
        ]);

        $query->andFilterWhere(['like', 'utente', $this->utente])
			            ->andFilterWhere(['like','bersaglio.descrizione', $this->desBersaglio]);
        return $dataProvider;
    }
}
