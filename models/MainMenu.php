<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "voci_menu".
 *
 * @property int $id
 * @property int $sequenza
 * @property string $label
 * @property string $pagina
 * @property string $target
 * @property string $descrizione
 * @property int $livello
 * @property string $data
 *
 * @property VociSottomenu[] $vociSottomenus
 */
class MainMenu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'voci_menu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sequenza', 'label', 'pagina', 'target', 'descrizione'], 'required'],
            [['sequenza', 'livello'], 'integer'],
            [['data'], 'safe'],
            [['label'], 'string', 'max' => 100],
            [['pagina'], 'string', 'max' => 300],
            [['target', 'descrizione'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sequenza' => 'Sequenza',
            'label' => 'Label',
            'pagina' => 'Pagina',
            'target' => 'Target',
            'descrizione' => 'Descrizione',
            'livello' => 'Livello',
            'data' => 'Data',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVociSottomenus()
    {
    	//var_dump($this->hasMany(SubMenu::className(), ['id_menu' => 'id']));
    	//return null;
        return $this->hasMany(SubMenu::className(), ['id_menu' => 'id']);
    }
}
