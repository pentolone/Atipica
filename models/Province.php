<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "province".
 *
 * @property int $id
 * @property string $sigla
 * @property string $nome
 *
 * @property Sottosezione[] $sottoseziones
 */
class Province extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'province';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sigla', 'nome', 'data', 'utente'], 'required'],
            [['sigla'], 'string', 'max' => 2],
            [['nome'], 'string', 'max' => 200],
            [['sigla'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sigla' => 'Sigla',
            'nome' => 'Nome',
            'data' => 'Data/Ora ultimo aggiornamento',
            'utente' => 'Aggiornato da',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */

    public function getProvinciaByID($id_provincia = 0)
    {
        return $this->hasOne(Anagrafica::className(), ['id' => 'id_provincia']);
    }
}
