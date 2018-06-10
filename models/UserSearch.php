<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\User;

/**
 * UserSearch represents the model behind the search form of `\app\models\User`.
 */
class UserSearch extends User
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['username', 'pwd', 'authKey','auth_rule', 'accessToken', 'nome', 'cognome', 'cellulare', 'email', 'sendmail', 'data', 'utente'], 'safe'],
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
        $query = User::find();

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
            'auth_rule' => Yii::$app->db->quoteValue($this->auth_rule),
            'data' => $this->data,
        ]);
        
        // Skip ID = 1 (admin)        
        $query->andFilterWhere(['>', 'id', '1']);

        $query->andFilterWhere(['like', 'username', $this->username])
           ->andFilterWhere(['like', 'pwd', $this->pwd])
            ->andFilterWhere(['like', 'authKey', $this->authKey])
            ->andFilterWhere(['like', 'accessToken', $this->accessToken])
            ->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'cognome', $this->cognome])
            ->andFilterWhere(['like', 'cellulare', $this->cellulare])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'sendmail', $this->sendmail])
            ->andFilterWhere(['like', 'utente', $this->utente]);

        return $dataProvider;
    }
}
