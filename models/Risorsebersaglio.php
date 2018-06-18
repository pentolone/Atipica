<?php

namespace app\models;
use yii\base\Model;
use yii\db\Query;

use Yii;

/**
 * This is the model class for table "responsabilita_bersaglio,
 *                                                    risorse_umane_bersaglio and risorse_esterne_bersaglio".
 *
 * @property int $id
 * @property int $id_bersaglio
 * @property int $id_risorse_umane
 * @property int $id_risorse_esterne
 * @property string $data
 * @property string $utente
 *
 * @property Bersaglio $bersaglio
 * @property RisorseUmane $risorseUmane
 */
class Risorsebersaglio extends Model
{
	public $id_bersaglio;
	public $idAnagrafica;
	public $desBersaglio;
	public $id_responsabilita = array();
	public $ctrResponsabilita;

	public $id_risorse_umane = array();
	public $ctrRisorseUmane = 0;

	public $id_risorse_esterne = array();
	public $ctrRisorseEsterne = 0;
	public $utente;

    public static function tableName()
    {
        return 'bersaglio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_bersaglio'], 'required'],
            [['id_bersaglio'], 'integer'],
           // [['id_responsabilita','id_risorse_umane', 'id_risorse_esterne'], 'each', 'rule' => ['integer']],
            [['utente'], 'string', 'max' => 130],
            [['id_bersaglio'], 'exist', 'skipOnError' => true, 'targetClass' => Bersaglio::className(), 'targetAttribute' => ['id_bersaglio' => 'id']],
            [['id_responsabilita'], 'exist', 'skipOnError' => true, 'targetClass' => Responsabilita::className(), 'targetAttribute' => ['id_responsabilita' => 'id']],
            [['id_risorse_umane'], 'exist', 'skipOnError' => true, 'targetClass' => Risorseumane::className(), 'targetAttribute' => ['id_risorse_umane' => 'id']],
            [['id_risorse_esterne'], 'exist', 'skipOnError' => true, 'targetClass' => Risorseesterne::className(), 'targetAttribute' => ['id_risorse_esterne' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_bersaglio' => 'Bersaglio',
            'desBersaglio' => 'Bersaglio',
            'id_responsabilita' => 'Responsabilità',
            'id_risorse_umane' => 'Risorse Umane',
            'id_risorse_esterne' => 'Risorse Esterne',
            'data' => 'Data/Ora ultimo aggiornamento',
            'utente' => 'Aggiornato da',
        ];
    }

    public function find($params)
    /**
     * SELECT multiple data
     **/
    {

    	$tableFields = ['bersaglio.id AS id_bersaglio', 'bersaglio.id_anagrafica', 'bersaglio.descrizione AS desBersaglio', 
    	                         'responsabilita_bersaglio.id_responsabilita',
									    'risorse_umane_bersaglio.id_risorse_umane', 'risorse_esterne_bersaglio.id_risorse_esterne'];
 //   	$tableFields = ['bersaglio.id', 'bersaglio.descrizione'];
    	$additionalTables = [
//		    	                    ['INNER JOIN', 'responsabilita_bersaglio', 'responsabilita_bersaglio.id_bersaglio = bersaglio.id'],
		    	                    ['LEFT JOIN', 'responsabilita_bersaglio', 'responsabilita_bersaglio.id_bersaglio = bersaglio.id'],
		    	                    ['LEFT JOIN', 'risorse_umane_bersaglio', 'risorse_umane_bersaglio.id_bersaglio = bersaglio.id'],
		    	                    ['LEFT JOIN', 'risorse_esterne_bersaglio', 'risorse_esterne_bersaglio.id_bersaglio = bersaglio.id'],
						];
    	$query = new Query;
    	$query->join = $additionalTables;
    	
    	$query->select($tableFields)
				    	->from($this->tableName());

     return($query);
    }

    public static function findOne($id_bersaglio)
    /**
     * SELECT multiple data
     **/
    {

      $model = new RisorseBersaglio;
    	$tableFields = ['bersaglio.id AS id_bersaglio', 'bersaglio.id_anagrafica', 'bersaglio.descrizione AS desBersaglio', 
    	                         'responsabilita_bersaglio.id_responsabilita',
									    'risorse_umane_bersaglio.id_risorse_umane', 'risorse_esterne_bersaglio.id_risorse_esterne'];
 //   	$tableFields = ['bersaglio.id', 'bersaglio.descrizione'];
    	$additionalTables = [
//		    	                    ['INNER JOIN', 'responsabilita_bersaglio', 'responsabilita_bersaglio.id_bersaglio = bersaglio.id'],
		    	                    ['LEFT JOIN', 'responsabilita_bersaglio', 'responsabilita_bersaglio.id_bersaglio = bersaglio.id'],
		    	                    ['LEFT JOIN', 'risorse_umane_bersaglio', 'risorse_umane_bersaglio.id_bersaglio = bersaglio.id'],
		    	                    ['LEFT JOIN', 'risorse_esterne_bersaglio', 'risorse_esterne_bersaglio.id_bersaglio = bersaglio.id'],
						];
    	$query = new Query;
    	$query->join = $additionalTables;
    	
    	$m = $query->select($tableFields)
				    	->from(RisorseBersaglio::tableName())
				    	->where(['bersaglio.id' => intval($id_bersaglio)])->all();
//	var_dump($m);        
	   if($m) { // Found, valorizzo il modello coi dati
	       foreach ($m as $record) {
	   	                  $model->desBersaglio = $record['desBersaglio'];
	   	                  $model->id_bersaglio = intval($id_bersaglio);
	   	                  
	   	                  // Responsabilita
	   	                  
	   	                  if($record['id_responsabilita']) {
//	   	                      array_push($model->id_responsabilita, ['id' => $record['id_responsabilita']]); 
	   	                      array_push($model->id_responsabilita, intval($record['id_responsabilita'])); 
		   	                  }
	   	                  
	   	                  if($record['id_risorse_umane']) {
//	   	                      array_push($model->id_responsabilita, ['id' => $record['id_responsabilita']]); 
	   	                      array_push($model->id_risorse_umane, intval($record['id_risorse_umane'])); 
		   	                  }
	   	                  
	   	                  if($record['id_risorse_esterne']) {
//	   	                      array_push($model->id_responsabilita, ['id' => $record['id_responsabilita']]); 
	   	                      array_push($model->id_risorse_esterne, intval($record['id_risorse_esterne'])); 
		   	                  }
	                    }
	                    
	     return($model);
		 }
	 return(null);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBersaglio()
    {
        return $this->hasOne(Bersaglio::className(), ['id' => 'id_bersaglio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResponsabilita()
    {
        return $this->hasMany(Responsabilita::className(), ['id' => 'id_responsabilita']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRisorseUmane()
    {
        return $this->hasMany(RisorseUmane::className(), ['id' => 'id_risorse_umane']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRisorseEsterne()
    {
        return $this->hasMany(RisorseEsterne::className(), ['id' => 'id_risorse_esterne']);
    }
}
