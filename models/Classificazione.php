<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "classificazione".
 *
 * @property int $id
 * @property string $descrizione
 * @property string $note
 * @property string $data
 * @property string $utente
 */
class Classificazione extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'classificazione';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descrizione'], 'required'],
            [['note'], 'string'],
            [['data'], 'safe'],
            [['descrizione'], 'string', 'max' => 100],
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
