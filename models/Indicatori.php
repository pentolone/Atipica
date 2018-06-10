<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "indicatori".
 *
 * @property int $id
 * @property int $id_bersaglio
 * @property string $titolo
 * @property string $descrizione
 * @property string $data
 * @property string $utente
 *
 * @property Bersaglio $bersaglio
 */
class Indicatori extends \yii\db\ActiveRecord
{
	public $desBersaglio;
	public $nomeUtente;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'indicatori';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_bersaglio', 'titolo', 'descrizione'], 'required'],
            [['id_bersaglio'], 'integer'],
            [['descrizione'], 'string'],
            [['data'], 'safe'],
            [['titolo'], 'string', 'max' => 100],
            [['utente'], 'string', 'max' => 130],
            [['id_bersaglio'], 'exist', 'skipOnError' => true, 'targetClass' => Bersaglio::className(), 'targetAttribute' => ['id_bersaglio' => 'id']],
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
            'desBersaglio' => 'Descrizione bersaglio',
            'nomeUtente' => 'Nome utente',
            'titolo' => 'Titolo',
            'descrizione' => 'Descrizione',
            'data' => 'Data/Ora ultimo aggiornamento',
            'utente' => 'Aggiornato da',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBersaglio()
    {
        return $this->hasOne(Bersaglio::className(), ['id' => 'id_bersaglio']);
    }
}
