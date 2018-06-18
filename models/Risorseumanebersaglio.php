<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "risorse_umane_bersaglio and risorse_esterne_bersaglio".
 *
 * @property int $id
 * @property int $id_bersaglio
 * @property int $id_risorse_umane
 * @property string $data
 * @property string $utente
 *
 * @property Bersaglio $bersaglio
 * @property RisorseUmane $risorseUmane
 */
class Risorseumanebersaglio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'risorse_umane_bersaglio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_bersaglio', 'id_risorse_umane'], 'required'],
            [['id_bersaglio', 'id_risorse_umane'], 'integer'],
            [['data'], 'safe'],
            [['utente'], 'string', 'max' => 130],
            [['id_bersaglio'], 'exist', 'skipOnError' => true, 'targetClass' => Bersaglio::className(), 'targetAttribute' => ['id_bersaglio' => 'id']],
            [['id_risorse_umane'], 'exist', 'skipOnError' => true, 'targetClass' => RisorseUmane::className(), 'targetAttribute' => ['id_risorse_umane' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_bersaglio' => 'Bersaglio',
            'id_risorse_umane' => 'Risorse Umane',
            'data' => 'Data',
            'utente' => 'Utente',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBersaglio()
    {
        return $this->hasOne(Bersaglio::className(), ['id' => 'id_bersaglio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRisorseUmane()
    {
        return $this->hasOne(RisorseUmane::className(), ['id' => 'id_risorse_umane']);
    }
}
