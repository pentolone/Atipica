<?php

namespace app\controllers;

use Yii;
use app\models\Anagrafica;
use app\models\AnagraficaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;

/**
 * AnagraficaController implements the CRUD actions for Anagrafica model.
 */
class AnagraficaController extends Controller
{
	//public $layout='@app/themes/tf-dorian/layouts/main';
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
     * Lists all Anagrafica models.
     * @return mixed
     */
    public function actionIndex()
    {
    	  if(!Yii::$app->user->isGuest) {
	        $searchModel = new AnagraficaSearch();
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
     * Displays a single Anagrafica model.
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
     * Creates a new Anagrafica model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
       if((Yii::$app->user->id == 1) || Yii::$app->user->can('create-anagrafica') ) {
       	   $model = new Anagrafica();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                 return $this->redirect(['view', 'id' => $model->id]);
               }

            return $this->render('create', [
           'model' => $model,
            ]);
        }
        else { // user is not allowed
          	throw new ForbiddenHttpException;
          }
    }

    /**
     * Updates an existing Anagrafica model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
       if((Yii::$app->user->id == 1) || Yii::$app->user->can('update-anagrafica') ) {
           $model = $this->findModel($id);

           if ($model->load(Yii::$app->request->post()) && $model->save()) {
               return $this->redirect(['view', 'id' => $model->id]);
              }

           return $this->render('update', [
          'model' => $model,
        ]);
          } else { // user not allowed
          	throw new ForbiddenHttpException;
          }
    }

    /**
     * Deletes an existing Anagrafica model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
       if((Yii::$app->user->id == 1) || Yii::$app->user->can('delete-anagrafica') ) {
	        $this->findModel($id)->delete();
	
	        return $this->redirect(['index']);
          } else { // user not allowed
          	throw new ForbiddenHttpException;
          }
    }

    /**
     * Finds the Anagrafica model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Anagrafica the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Anagrafica::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
