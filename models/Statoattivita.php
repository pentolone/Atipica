<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "stato_attivita".
 *
 * @property int $id
 * @property string $descrizione
 * @property string $colore
 * @property string $note
 * @property string $data
 * @property string $utente
 *
 * @property Attivita[] $attivitas
 */
class Statoattivita extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'stato_attivita';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descrizione', 'utente'], 'required'],
            [['note'], 'string'],
            [['data'], 'safe'],
            [['descrizione'], 'string', 'max' => 100],
            [['colore'], 'string', 'max' => 7],
            [['colore'], 'default', 'value' => '#ffffff'],
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
            'colore' => 'Colore',
            'note' => 'Note',
            'data' => 'Data/Ora ultimo aggiornamento',
            'utente' => 'Aggiornato da',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttivitas()
    {
        return $this->hasMany(Attivita::className(), ['id_stato_attivita' => 'id']);
    }
}
