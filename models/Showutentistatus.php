<?php

namespace app\models;
use yii\base\Model;
//use Bersaglio;

use Yii;

/**
 * This is the model class for showing Utente progress in his own path.
 *
 **/

class Showutentistatus extends Model {
    public $nomeUtente;

    public $titoloBersaglio;
    public $descrizioneBersaglio;

    public $titoloRischio;
    public $descrizioneRischio;

    public $titoloIndicatore;
    public $descrizioneIndicatore;

    public $appBackendTheme;
    public $appFrontendTheme;

    public $progressBar;
        
    public function rules()
    {
    	return [
			   // Application Backend Theme
            ['appBackendTheme', 'required'],

            // Application Frontend Theme
            ['appFrontendTheme', 'required'],
            
            // Nome utente
            ['nomeUtente', 'required'],
            
            // Bersaglio
            ['titoloBersaglio', 'required'],
            ['descrizioneBersaglio', 'required'],
            
            // Rischio
            ['titoloRischio', 'required'],
            ['descrizioneRischio', 'required'],
            
            // Indicatore
            ['titoloIndicatore', 'required'],
            ['descrizioneIndicatore', 'required'],
            
            // Progress Bar
            ['progressBar', 'required'],
         ];
    }
 
    public function attributeLabels()
    {
    	return [
            ['userName' => 'Nome utente'],
            ['titoloBersaglio' => 'Bersaglio'],
         ];
    }

} // End of model class definition