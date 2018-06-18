<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "responsabilita".
 *
 * @property int $id
 * @property string $titolo
 * @property string $note
 * @property string $data
 * @property string $utente
 */
class Responsabilita extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'responsabilita';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['note'], 'string'],
            [['data'], 'safe'],
            [['titolo'], 'string', 'max' => 100],
            [['utente'], 'string', 'max' => 130],
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
            'titolo' => 'Responsabile',
            'note' => 'Note',
            'data' => 'Data/ora ultimo aggiornamento',
            'utente' => 'Aggiornato da',
        ];
    }
}
