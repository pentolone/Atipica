<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comuni".
 *
 * @property int $id
 * @property string $nome
 * @property int $id_provincia
 * @property string $cap
 * @property string $codice_catastale
 * @property string $codice_PS
 * @property string $data
 * @property string $utente
 */
class Comuni extends \yii\db\ActiveRecord
{
	public $sigla;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comuni';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'id_provincia', 'cap', 'codice_catastale', 'codice_PS'], 'required'],
            [['id_provincia'], 'integer'],
            //[['sigla'], 'string', 'max' => 2],
          //  ['id_provincia', 'exist', 'targetClass' => Province::className(), 'targetAttribute' => 'id',
            //'allowArray' => true],
            [['data'], 'safe'],
            [['nome'], 'string', 'max' => 100],
            [['cap'], 'string', 'max' => 5],
            [['codice_catastale'], 'string', 'max' => 4],
            [['codice_PS'], 'string', 'max' => 9],
            [['utente'], 'string', 'max' => 130],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'id_provincia' => 'Provincia',
            'sigla' => 'Provincia',
            'cap' => 'CAP',
            'codice_catastale' => 'Codice Catastale',
            'codice_PS' => 'Codice  P.S.',
            'data' => 'Data/Ora ultimo aggiornamento',
            'utente' => 'Aggiornato da',
        ];
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProvincia()
    {
        return $this->hasOne(Province::className(), ['id' => 'id_provincia']);
    }

/*    public function getProvinciaByID($id_provincia)
    {
        return $this->hasOne(Province::className(), ['id' => $id_provincia]);
    } */
}
