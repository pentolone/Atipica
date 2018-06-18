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

    public $idAnagrafica;
    public $nome;
    public $cognome;
    public $dataNascita;
    public $mesiPassati;
    public $giorniUtili;
    public $giorniTotali;

    public $giorniUtili18;
    public $giorniTotali18;

    public $giorniUtili21;
    public $giorniTotali21;
    public $ages = array('18', '21');

    public $idBersaglio;
    public $titoloBersaglio;
    public $descrizioneBersaglio;

    public $datiAttivita = array();
    public $datiRischio = array();
    public $datiIndicatore = array();
    public $datiResponsabilita = array();
    public $datiStatoAttivita = array();
    public $datiRisorseUmane = array();
    public $datiRisorseEsterne = array();

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
            ['idBersaglio', 'required'],
            ['titoloBersaglio', 'required'],
            ['descrizioneBersaglio', 'required'],
            
            // Rischio
            ['titoloRischio', 'required'],
            ['descrizioneRischio', 'required'],
            
            // Indicatore
            ['titoloIndicatore', 'required'],
            ['descrizioneIndicatore', 'required'],
            
            // Attivita
            ['titoloAttivita', 'required'],
            ['descrizioneAttivita', 'required'],
            
            // Progress Bar
            ['progressBar', 'required'],
         ];
    }
 
    public function attributeLabels()
    {
    	return [
            ['userName' => 'Nome utente'],
            ['dataNascita' => 'Data di Nascita'],
            ['mesiPassati' => 'Mesi trascorsi'],
            ['titoloBersaglio' => 'Bersaglio'],
         ];
    }

    public function getAvailableMonths($age = 18)
    /**
     * Return avilable months since birthDate
     *
     **/
    {
    }
         public function test() {
         	      $retValues = array();
         			foreach($this->datiAttivita as $attivita) {
                             // array_push($retValues, $attivita);
         				           //$retValues .= "ID = " . $attivita->descrizione;
         			            }
         			         return($retValues);
         			         }

} // End of model class definition