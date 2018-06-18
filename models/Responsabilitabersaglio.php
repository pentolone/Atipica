<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "responsabilita_bersaglio".
 *
 * @property int $id
 * @property int $id_bersaglio
 * @property int $id_responsabilita
 * @property string $data
 * @property string $utente
 *
 * @property Bersaglio $bersaglio
 * @property Responsabilita $responsabilita
 */
class Responsabilitabersaglio extends \yii\db\ActiveRecord
{
	public $idAnagrafica;
	public $desBersaglio;
	public $ctrResponsabilita;

	public $id_risorse_umane = array();
	public $ctrRisorseUmane = 0;

	public $id_risorse_esterne = array();
	public $ctrRisorseEsterne = 0;
	public $utente;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'responsabilita_bersaglio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_bersaglio'], 'required'],
            [['id_bersaglio', 'id_responsabilita'], 'integer'],
            [['data'], 'safe'],
            [['utente'], 'string', 'max' => 130],
            [['id_bersaglio'], 'exist', 'skipOnError' => true, 'targetClass' => Bersaglio::className(), 'targetAttribute' => ['id_bersaglio' => 'id']],
            [['id_responsabilita'], 'exist', 'skipOnError' => true, 'targetClass' => Responsabilita::className(), 'targetAttribute' => ['id_responsabilita' => 'id']],
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
            'id_responsabilita' => 'Id Responsabilita',
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
    public function getResponsabilita()
    {
        return $this->hasOne(Responsabilita::className(), ['id' => 'id_responsabilita']);
    }
}
