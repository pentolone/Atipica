<?php

namespace app\controllers;

use Yii;
use app\models\Showutentistatus;

use app\models\Anagrafica;
use app\models\Bersaglio;
use app\models\BersaglioSearch;
use app\models\Rischi;
use app\models\RischiSearch;
use app\models\Attivita;
use app\models\AttivitaSearch;
use app\models\Indicatori;
use app\models\IndicatoriSearch;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;

/**
 * ShowutentistatusController
 */
class ShowutentistatusController extends Controller
{
	public function actionIndex($id = 0)
    {
    	// Search from database
        $searchModel = new BersaglioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
       if($id > 0) {       
	       $dataProvider->query->where(['bersaglio.id' => $id]);
	      }
        return $this->render('index', [
	            'dataProvider' => $dataProvider,
        ]);
    }
	public function actionView($id) 
	/**
	 * Display all the information related to the selected utente/bersaglio
	 *
	 **/
    {
    	  $model = new Showutentistatus();

        $modelBersaglio = new Bersaglio();
        $modelAnagrafica = new Anagrafica();

        $modelAttivita = new AttivitaSearch();
        $modelRischio = new RischiSearch();
        $modelIndicatore = new IndicatoriSearch();

        $sql = 'anagrafica.*';        
        foreach($model->ages as $age) {
    //    	var_dump($age);
       // 	return;
        	            $sql .= ',(TIMESTAMPDIFF(DAY,
                                                              curdate(),
                                                              DATE_ADD(anagrafica.data_nascita,
                                                              INTERVAL ' . $age . ' YEAR))) AS giorniUtili' . $age .
                                    ', (TIMESTAMPDIFF(DAY,
                                                              data_nascita,
                                                              DATE_ADD(anagrafica.data_nascita,
                                                              INTERVAL ' . $age . ' YEAR))) AS giorniTotali' . $age;
                     }
        //var_dump($sql);
        //return;
        $datiBersaglio = $modelBersaglio->find()->where(['id' => $id])->one();
        $datiAnagrafica = $modelAnagrafica->find()->select([$sql])
                                                                     ->where(['id' => $datiBersaglio->id_anagrafica])->one();

        $datiAttivita = $modelAttivita->search(Yii::$app->request->queryParams, $datiBersaglio->id);
        $datiRischio = $modelRischio->search(Yii::$app->request->queryParams, $datiBersaglio->id);
        $datiIndicatore = $modelIndicatore->search(Yii::$app->request->queryParams, $datiBersaglio->id);

	// Pagination
        $datiAttivita->pagination->pageSize=10;
        $datiRischio->pagination->pageSize=10;
        $datiIndicatore->pagination->pageSize=10;                                                                    
        
        //var_dump($datiAttivita);	  
        
    	  
    	  if($datiBersaglio) { // Populate data information
    	      // Anagrafica
    	      $model->nomeUtente = $datiAnagrafica->fullNameAndDate;
            $model->dataNascita = $datiAnagrafica->data_nascita;  

			// 18 anni
            $model->giorniUtili18 = $datiAnagrafica->giorniUtili18;
            
            if($model->giorniUtili18 < 0)
                $model->giorniUtili18 = 0;
            $model->giorniTotali18 = $datiAnagrafica->giorniTotali18;  

			// 21 anni
            $model->giorniUtili21 = $datiAnagrafica->giorniUtili21;
            
            if($model->giorniUtili21 < 0)
                $model->giorniUtili21 = 0;
            $model->giorniTotali21 = $datiAnagrafica->giorniTotali21;  
            
	    	  $model->titoloBersaglio = $datiBersaglio->titolo;
	    	  $model->descrizioneBersaglio = $datiBersaglio->descrizione;

	    	  if($datiAttivita) { // Populate data information (Activities, multiple)
	    	     $model->datiAttivita = $datiAttivita;
		    }  

	    	  if($datiRischio) { // Populate data information (Risks, multiple)
	    	     $model->datiRischio = $datiRischio;
		    }  

	    	  if($datiIndicatore) { // Populate data information (Indicators, multiple)
	    	     $model->datiIndicatore = $datiIndicatore;
		    }  
	    	  
	        return $this->render('view', [
	            'model' => $model,
	        ]);
       }
    else {
        throw new NotFoundHttpException('The requested page does not exist.');
     }
    }

    /**
     * Finds the Showutentistatus model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Rischi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Showutentistatus::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
} // END of controller