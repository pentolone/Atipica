<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo_documento".
 *
 * @property int $id
 * @property string $descrizione
 * @property string $codice_PS
 * @property string $note
 * @property string $data
 * @property string $utente
 */
class Tipodocumento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipo_documento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descrizione'], 'required'],
            [['data'], 'safe'],
            [['descrizione'], 'string', 'max' => 100],
            [['codice_PS'], 'string', 'max' => 5],
            [['note'], 'string', 'max' => 300],
            [['utente'], 'string', 'max' => 130],
			   [['codice_PS'], 'default', 'value' => null],  
			   [['note'], 'default', 'value' => null],  
      ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'descrizione' => 'Descrizione',
            'codice_PS' => 'Codice  P.S.',
            'note' => 'Note',
            'data' => 'Data/Ora ultimo aggiornamento',
            'utente' => 'Aggiornato da',
        ];
    }
}
