<?php

namespace app\controllers;

use Yii;
use app\models\Attivita;
use app\models\AttivitaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;

/**
 * AttivitaController implements the CRUD actions for Attivita model.
 */
class AttivitaController extends Controller
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
     * Lists all Attivita models.
     * @return mixed
     */
    public function actionIndex()
    {
    	  if(!Yii::$app->user->isGuest) {
	        $searchModel = new AttivitaSearch();
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
     * Displays a single Attivita model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Attivita model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
    	  if((Yii::$app->user->id == 1) || Yii::$app->user->can('create-attivita') ) {
	        $model = new Attivita();
	
	        if ($model->load(Yii::$app->request->post()) && $model->save()) {
	            return $this->redirect(['view', 'id' => $model->id]);
	        }
	
	        return $this->render('create', [
	            'model' => $model,
	        ]);
          } else { // user is not allowed
          	throw new ForbiddenHttpException;
          }             
    }

    /**
     * Updates an existing Attivita model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
    	  if((Yii::$app->user->id == 1) || Yii::$app->user->can('update-attivita') ) {
	        $model = $this->findModel($id);
	
	        if ($model->load(Yii::$app->request->post()) && $model->save()) {
	            return $this->redirect(['view', 'id' => $model->id]);
	        }
	
	        return $this->render('update', [
	            'model' => $model,
	        ]);
          } else { // user is not allowed
          	throw new ForbiddenHttpException;
          }             
    }

    /**
     * Deletes an existing Attivita model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
    	  if((Yii::$app->user->id == 1) || Yii::$app->user->can('delete-attivita') ) {
	        $this->findModel($id)->delete();
	
	        return $this->redirect(['index']);
          } else { // user is not allowed
          	throw new ForbiddenHttpException;
          }             
    }

    /**
     * Finds the Attivita model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Attivita the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Attivita::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
