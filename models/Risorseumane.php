<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "risorse_umane".
 *
 * @property int $id
 * @property string $titolo
 * @property string $note
 * @property string $data
 * @property string $utente
 */
class Risorseumane extends \yii\db\ActiveRecord
{
	public $id_bersaglio;
	public $id_risorse_umane;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'risorse_umane';
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
            'titolo' => 'Risorsa',
            'note' => 'Note',
            'data' => 'Data/ora ultimo aggiornamento',
            'utente' => 'Aggiornato da',
        ];
    }
}
