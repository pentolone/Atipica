<?php

namespace app\controllers;

use Yii;
use app\models\Nazioni;
use app\models\NazioniSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;

/**
 * NazioniController implements the CRUD actions for Nazioni model.
 */
class NazioniController extends Controller
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
     * Lists all Nazioni models.
     * @return mixed
     */
    public function actionIndex()
    {
    	  if(!Yii::$app->user->isGuest) {
	        $searchModel = new NazioniSearch();
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
     * Displays a single Nazioni model.
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
     * Creates a new Nazioni model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
    	  if((Yii::$app->user->id == 1) || Yii::$app->user->can('create-nazione') ) {
             $model = new Nazioni();

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
     * Updates an existing Nazioni model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
    	  if((Yii::$app->user->id == 1) || Yii::$app->user->can('update-nazione') ) {
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
     * Deletes an existing Nazioni model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
    	  if((Yii::$app->user->id == 1) || Yii::$app->user->can('delete-nazione') ) {
             $this->findModel($id)->delete();

             return $this->redirect(['index']);
          } else { // user is not allowed
          	throw new ForbiddenHttpException;
          }    
    }

    /**
     * Finds the Nazioni model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Nazioni the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Nazioni::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
