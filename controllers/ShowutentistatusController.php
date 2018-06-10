<?php

namespace app\controllers;

use Yii;
use app\models\Showutentistatus;
use app\models\Anagrafica;
use app\models\AnagraficaSearch;
use app\models\Bersaglio;
use app\models\BersaglioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;

/**
 * ShowutentistatusController
 */
class ShowutentistatusController extends Controller
{
	public function actionIndex($id = 1)
    {
    	// Search from database
        $searchModel = new BersaglioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
       $dataProvider->query->where(['bersaglio.id' => $id]);
        return $this->render('index', [
	            'dataProvider' => $dataProvider,
        ]);
    }
	public function actionView($id = 1)
    {
        $datiBersaglio = new Bersaglio();
        
        //var_dump($datiBersaglio);
        $data = $datiBersaglio->find()->where(['id' => $id])->one();
	     //$dataProvider = $searchBersaglio->search(Yii::$app->request->queryParams);
	     
    	  $model = new Showutentistatus();
    	  
    	  if($data) {
	    	  $model->titoloBersaglio = $data->titolo;
	    	  $model->descrizioneBersaglio = $data->descrizione;
	        return $this->render('view', [
	            'model' => $model,
	        ]);
       }
     else {
        throw new NotFoundHttpException('The requested page does not exist.');
     }
    }

    /**
     * Finds the Rischi model based on its primary key value.
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