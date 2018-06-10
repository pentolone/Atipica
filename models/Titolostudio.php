<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "titolo_studio".
 *
 * @property int $id
 * @property string $descrizione
 * @property string $note
 * @property string $data
 * @property string $utente
 */
class Titolostudio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'titolo_studio';
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
            [['note'], 'string', 'max' => 300],
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
            'descrizione' => 'Descrizione',
            'note' => 'Note',
            'data' => 'Data/Ora ultimo aggiornamento',
            'utente' => 'Aggiornato da',
        ];
    }
}
