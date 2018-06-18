<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "risorse_esterne_bersaglio".
 *
 * @property int $id
 * @property int $id_bersaglio
 * @property int $id_risorse_esterne
 * @property string $data
 * @property string $utente
 *
 * @property Bersaglio $bersaglio
 * @property RisorseEsterne $risorseEsterne
 */
class Risorseesternebersaglio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'risorse_esterne_bersaglio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_bersaglio', 'id_risorse_esterne'], 'required'],
            [['id_bersaglio', 'id_risorse_esterne'], 'integer'],
            [['data'], 'safe'],
            [['utente'], 'string', 'max' => 130],
            [['id_bersaglio'], 'exist', 'skipOnError' => true, 'targetClass' => Bersaglio::className(), 'targetAttribute' => ['id_bersaglio' => 'id']],
            [['id_risorse_esterne'], 'exist', 'skipOnError' => true, 'targetClass' => RisorseEsterne::className(), 'targetAttribute' => ['id_risorse_esterne' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_bersaglio' => 'Id Bersaglio',
            'id_risorse_esterne' => 'Id Risorse Esterne',
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
    public function getRisorseEsterne()
    {
        return $this->hasOne(RisorseEsterne::className(), ['id' => 'id_risorse_esterne']);
    }
}
