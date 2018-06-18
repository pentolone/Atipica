<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "voci_sottomenu".
 *
 * @property int $id
 * @property int $id_menu
 * @property int $sequenza
 * @property string $label
 * @property string $pagina
 * @property string $target
 * @property string $descrizione
 * @property int $livello
 * @property string $data
 *
 * @property VociMenu $menu
 */
class SubMenu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'voci_sottomenu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_menu', 'sequenza', 'label', 'pagina', 'target', 'descrizione'], 'required'],
            [['id_menu', 'sequenza', 'livello'], 'integer'],
            [['data'], 'safe'],
            [['label'], 'string', 'max' => 100],
            [['pagina'], 'string', 'max' => 300],
            [['target', 'descrizione'], 'string', 'max' => 50],
            [['id_menu'], 'exist', 'skipOnError' => true, 'targetClass' => VociMenu::className(), 'targetAttribute' => ['id_menu' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_menu' => 'Id Menu',
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
    public function getMenu()
    {
        return $this->hasOne(MainMenu::className(), ['id' => 'id_menu']);
    }
    
    
   /**
     * @Ritorna le voci del submenu abilitate per l'utente
     */
    private function getAvailableFunctions()
    {
    	
    	if(!Yii::$app->user->isGuest) {

          /**
           * La prima parte carica le voci per utente diverso da admin (ID > 1)
           **/
    		$sql ='SELECT voci_menu.id mid,
    		                       voci_menu.descrizione mdescrizione,
    		                       voci_menu.target mtarget,
    		                       voci_menu.sequenza mseq,'.
    		                       $this->tableName() .'.sequenza sseq,' .
    		                       $this->tableName() .'.id sid,' .
    		                       self::tableName() .'.descrizione sdescrizione,' .
    		                       self::tableName() .'.pagina starget ' .
    		        ' FROM ' . self::tableName() . ',
    		                        voci_menu,
    		                        abilitazione_livello
    		          WHERE   abilitazione_livello.auth_rule = ' . 
    		                       Yii::$app->db->quoteValue(Yii::$app->user->identity->auth_rule) .
    		        ' AND   ' . Yii::$app->user->identity->id . ' > 1 ' .
    		        ' AND       abilitazione_livello.id_pagina = ' . self::tableName() . '.id
    		          AND       voci_menu.id = ' . self::tableName() . '.id_menu';

          /**
           * La seconda parte carica le voci per utente admin (ID = 1)
           **/
    		$sql .=' UNION
    		            SELECT voci_menu.id mid,
    		                       voci_menu.descrizione mdescrizione,
    		                       voci_menu.target mtarget,
    		                       voci_menu.sequenza mseq,'.
    		                       $this->tableName() .'.sequenza sseq,' .
    		                       $this->tableName() .'.id sid,' .
    		                       self::tableName() .'.descrizione sdescrizione,' .
    		                       self::tableName() .'.pagina starget ' .
    		        ' FROM ' . self::tableName() . ', voci_menu, abilitazione_livello
    		          WHERE ' . Yii::$app->user->identity->id . ' = 1 
    		          AND       voci_menu.id = ' . self::tableName() . '.id_menu    		              		          
    		          ORDER   BY 4, 2, 5, 7';
    		                       
          $rows = Yii::$app->db->createCommand($sql)->queryAll();
          return($rows);
        }
     return null;
    }

   /**
     * @Verifica se l'utente collegato può accedere alla voce
     */
    
   /**
     * @Costruisce il menu dalle table del DB
     */
    public function buildDynamicMenu()
    {
    	$menuID='0';
    	$menuArray=array();
    	$menuItem=array();
    	$ix=-1;
    	
    	if($rows = $this->getAvailableFunctions()) {
    		foreach($rows as $item) {
    			          if($item['mid'] != $menuID) {
    			          	 $ix++;
    			          	// Menu drop down
    			          	 $menuArray[$ix] = array('label' =>  $item['mdescrizione'], 'items' => 
    			          	                                          array(array('label' => $item['sdescrizione'],   'url' =>  $item['starget'], 'id' => $item['sid'])));
                       //   $menuArray[$ix]['items'][1] = '<li class="divider"></li>';
                         // $menuArray[$ix]['items'][2] = '<li class="dropdown-header">Dropdown Header</li>';
    			          	 $menuID = $item['mid'];
    			          	 continue;
    			             }
    			           // Voci menu dropdown (submenu)
    			          array_push($menuArray[$ix]['items'], 
    			                            array('label' => $item['sdescrizione'],   'url' =>  $item['starget'], 'id' => $item['sid']));
    		            }
    		            // var_dump($menuArray);
    		            //return;
    	   }
    return($menuArray);
    }

}
