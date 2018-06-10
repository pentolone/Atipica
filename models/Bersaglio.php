<?php

namespace app\models;

use Yii;
use \app\models\Anagrafica;

/**
 * This is the model class for table "bersaglio".
 *
 * @property int $id
 * @property int $id_anagrafica
 * @property string $descrizione
 * @property string $data
 * @property string $utente
 *
 * @property Anagrafica $anagrafica
 */
class Bersaglio extends \yii\db\ActiveRecord
{
// Nome anagrafica	
	public $nomeUtente;
    /**
     * @inheritdoc
     */
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
            [['id_anagrafica', 'titolo', 'descrizione', 'utente'], 'required'],
            [['id_anagrafica'], 'integer'],
            [['descrizione', 'nomeUtente'], 'string'],
            [['data'], 'safe'],
            [['utente'], 'string', 'max' => 130],
            [['id_anagrafica'], 'exist', 'skipOnError' => true, 'targetClass' => Anagrafica::className(), 'targetAttribute' => ['id_anagrafica' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_anagrafica' => 'Nominativo',
            'titolo' => 'Titolo',
            'descrizione' => 'Descrizione',
            'nomeUtente' => 'Nome utente',
            'data' => 'Data/Ora ultimo aggiornamento',
            'utente' => 'Aggiornato da',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnagrafica()
    {
        return $this->hasOne(Anagrafica::className(), ['id' => 'id_anagrafica']);
    }

}
