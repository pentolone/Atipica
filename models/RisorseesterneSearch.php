<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Risorseesterne;

/**
 * RisorseesterneSearch represents the model behind the search form of `\app\models\Risorseesterne`.
 */
class RisorseesterneSearch extends Risorseesterne
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['titolo', 'note', 'data', 'utente'], 'safe'],
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
    	  if($id_bersaglio > 0) {
           $query = Risorseesterne::find()->select(['risorse_esterne.*'])
							                                            ->from(['risorse_esterne', 'risorse_esterne_bersaglio'])
															                  ->where('risorse_esterne.id = risorse_esterne_bersaglio.id_risorse_esterne')
							                                            ->andWhere('risorse_esterne_bersaglio.id_bersaglio = ' . $id_bersaglio);
 	 	     }
    	 else {
	        $query = Risorseesterne::find(); //->select(['risorse_esterne.*
    	 }
         
  /*      $query = Risorseesterne::find()->select(['risorse_esterne.*
																				        FROM risorse_esterne;*/

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['titolo' => SORT_ASC]],
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

        $query->andFilterWhere(['like', 'titolo', $this->titolo])
            ->andFilterWhere(['like', 'note', $this->note])
            ->andFilterWhere(['like', 'utente', $this->utente]);

        return $dataProvider;
    }
}
