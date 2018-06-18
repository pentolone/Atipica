<?php

namespace app\controllers;

use Yii;
use Yii\db\Query;
use app\models\Responsabilita;
use app\models\ResponsabilitaSearch;
use app\models\Responsabilitabersaglio;
use app\models\Risorseumane;
use app\models\RisorseumaneSearch;
use app\models\Risorseumanebersaglio;
use app\models\Risorseesterne;
use app\models\RisorseesterneSearch;
use app\models\Risorseesternebersaglio;
use app\models\Risorsebersaglio;
use app\models\RisorsebersaglioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;

/**
 * RisorseumaneController implements the CRUD actions for Risorseumane model.
 */
class RisorsebersaglioController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Risorseumane models.
     * @return mixed
     */
    public function actionIndex()
    {
    	  if(!Yii::$app->user->isGuest) {
	        $searchModel = new RisorsebersaglioSearch();
	        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
	
	        return $this->render('index', [
	            'searchModel' => $searchModel,
	            'dataProvider' => $dataProvider,
	        ]);
          } else { // user is not allowed
          	throw new ForbiddenHttpException;
          }             
    }

    /**
     * Displays a single Risorseumane model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_bersaglio)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_bersaglio),
        ]);
    }

    /**
     * Creates a new Risorseumane model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
    	  $successSave = 0;
    	  $checkSuccessSave = 0;
    	  if((Yii::$app->user->id == 1) || Yii::$app->user->can('create-risorseub') ) {
	        $model = new Risorsebersaglio();
	        
	        if ($model->load(Yii::$app->request->post()) && $this->populateTables($model)) {
	            return $this->redirect(['view', 'id' => $model->id_bersaglio]);
	        }
	
	        return $this->render('create', [
	            'model' => $model,
	        ]);
          } else { // user is not allowed
	          	throw new ForbiddenHttpException;
          }             
    }

    /**
     * Updates an existing Risorseumane model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_bersaglio)
    {
    	  if((Yii::$app->user->id == 1) || Yii::$app->user->can('update-risorseub') ) {
	        $model = $this->findModel($id_bersaglio);
	
	        if ($model->load(Yii::$app->request->post()) &&  $this->populateTables($model)) {
		        \Yii::$app->session->setFlash('success', 'Dati modificati con successo!');
	            return $this->redirect(['index', 'id_bersaglio' => $model->id_bersaglio]);
	        }
	        return $this->render('update', [
	            'model' => $model,
	        ]);
          } else { // user is not allowed
          	throw new ForbiddenHttpException;
          }             
    }

    /**
     * Deletes an existing Risorseumane model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_bersaglio)
    {
    	  if((Yii::$app->user->id == 1) || Yii::$app->user->can('delete-risorseub') ) {
    	  	  $query = new Query();
	        $this->findModel($id_bersaglio)->delete();
	
	        return $this->redirect(['index']);
          } else { // user is not allowed
          	throw new ForbiddenHttpException;
          }             
    }

    /**
     * Finds the Risorseumane model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Risorseumane the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_bersaglio)
    {
        if (($model = Risorsebersaglio::findOne($id_bersaglio)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Clean data (delete, before update and before insert)
     */
    private function cleanTables($model)
    {
    	$query = new Query;
    	$tableList= array('risorse_esterne_bersaglio', 'risorse_umane_bersaglio','responsabilita_bersaglio');
    	
    	foreach($tableList as $table) {
	    		$sql = 'DELETE FROM ' . $table . ' WHERE id_bersaglio = ' . $model->id_bersaglio;
	    		$query->createCommand()->delete($table, ['id_bersaglio' => $model->id_bersaglio])->execute();
    	      }
    	      
    }

    /**
     * Insert all rows required in tables
     */
    private function populateTables($model)
    {
    	  $successSave = 0;
    	  $checkSuccessSave = 0;
//var_dump($model);
//return;
	        $successSave = (empty($model->id_risorse_umane) ? 0: count($model->id_risorse_umane)) +
	                                   (empty($model->id_risorse_esterne) ? 0: count($model->id_risorse_esterne)) +
										       (empty($model->id_responsabilita) ? 0 : count($model->id_responsabilita));

           //var_dump($model);
           //echo 'ss';var_dump($successSave);
           //return;
/*     	                  var_dump($successSave);
     	                  var_dump($model->id_risorse_esterne);
     	                  return;*/
        // $modelRisorseumane = new Risorseumanebersaglio();
         $this->cleanTables($model);
     	                 // var_dump($model->id_responsabilita); 
     	                  //return(false);
         
     	    if(!empty($model->id_responsabilita)) {
		     	    foreach($model->id_responsabilita as $rp) {
			                     $modelResponsabilita = new Responsabilitabersaglio();
		     	                  $modelResponsabilita->id_bersaglio = intval($model->id_bersaglio);
		     	                  $modelResponsabilita->id_responsabilita = intval($rp);
		     	                  $modelResponsabilita->utente = $model->utente;
		     	                  $checkSuccessSave += $modelResponsabilita->save();
		     	                  unset($modelResponsabilita);
		                       }
		                    }
         
     	    if(!empty($model->id_risorse_umane)) {
		     	    foreach($model->id_risorse_umane as $ru) {
			                     $modelRisorseumane = new Risorseumanebersaglio();
		     	                  $modelRisorseumane->id_bersaglio = intval($model->id_bersaglio);
		     	                  $modelRisorseumane->id_risorse_umane = intval($ru);
		     	                  $modelRisorseumane->utente = $model->utente;
		     	                  $checkSuccessSave += $modelRisorseumane->save();
		     	                  unset($modelRisorseumane);
		                       }
		                    }

     	    if(!empty($model->id_risorse_esterne)) {
		     	    foreach($model->id_risorse_esterne as $re) {

					        $modelRisorseesterne = new Risorseesternebersaglio();
     	                  $modelRisorseesterne->id_bersaglio = intval($model->id_bersaglio);
     	                  $modelRisorseesterne->id_risorse_esterne = intval($re);
     	                  $modelRisorseesterne->utente = $model->utente;
     	                  $checkSuccessSave += $modelRisorseesterne->save();
     	                  unset($modelRisorseesterne);
                       }
              }
           return($checkSuccessSave === $successSave);
    }
}
