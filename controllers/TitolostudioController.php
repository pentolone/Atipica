<?php

namespace app\controllers;

use Yii;
use app\models\Titolostudio;
use app\models\TitolostudioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;

/**
 * TitolostudioController implements the CRUD actions for Titolostudio model.
 */
class TitolostudioController extends Controller
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
     * Lists all Titolostudio models.
     * @return mixed
     */
    public function actionIndex()
    {
    	  if(!Yii::$app->user->isGuest) {
	        $searchModel = new TitolostudioSearch();
	        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
	        $dataProvider->query->orderBy('descrizione');
		
	        return $this->render('index', [
	            'searchModel' => $searchModel,
	            'dataProvider' => $dataProvider,
	        ]);
         } else { // user is not allowed
          	throw new ForbiddenHttpException;
          }            
    }

    /**
     * Displays a single Titolostudio model.
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
     * Creates a new Titolostudio model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
    	  if((Yii::$app->user->id == 1) || Yii::$app->user->can('create-tstudio') ) {
             $model = new Titolostudio();

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
     * Updates an existing Titolostudio model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
    	  if((Yii::$app->user->id == 1) || Yii::$app->user->can('update-tstudio') ) {
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
     * Deletes an existing Titolostudio model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
    	  if((Yii::$app->user->id == 1) || Yii::$app->user->can('delete-tstudio') ) {
             $this->findModel($id)->delete();

             return $this->redirect(['index']);
          } else { // user is not allowed
          	throw new ForbiddenHttpException;
          }
    }

    /**
     * Finds the Titolostudio model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Titolostudio the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Titolostudio::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
