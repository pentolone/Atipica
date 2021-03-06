<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "risorse_esterne".
 *
 * @property int $id
 * @property string $titolo
 * @property string $note
 * @property string $data
 * @property string $utente
 *
 * @property RisorseEsterneBersaglio[] $risorseEsterneBersaglios
 */
class Risorseesterne extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'risorse_esterne';
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRisorseEsterneBersaglios()
    {
        return $this->hasMany(RisorseEsterneBersaglio::className(), ['id_risorse_esterne' => 'id']);
    }
}
