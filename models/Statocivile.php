<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "stato_civile".
 *
 * @property int $id
 * @property string $descrizione
 * @property string $note
 * @property string $data
 * @property string $utente
 */
class Statocivile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'stato_civile';
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
            [['note'], 'default', 'value' => null],
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
