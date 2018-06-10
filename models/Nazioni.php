<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nazioni".
 *
 * @property int $id
 * @property string $codice_PS
 * @property string $nazione_PS
 */
class Nazioni extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nazioni';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nazione_PS'], 'required'],
            [['codice_PS'], 'string', 'max' => 9],
            [['nazione_PS'], 'string', 'max' => 100],
            [['utente'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'codice_PS' => 'Codice  P.S.',
            'nazione_PS' => 'Nazione',
            'data' => 'Data/Ora ultimo aggiornamento',
            'utente' => 'Aggiornato da',
        ];
    }
}
