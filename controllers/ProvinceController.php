<?php

namespace app\controllers;

use Yii;
use app\models\Province;
use app\models\ProvinceSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;

/**
 * ProvinceController implements the CRUD actions for Province model.
 */
class ProvinceController extends Controller
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
     * Lists all Province models.
     * @return mixed
     */
    public function actionIndex()
    {
    	  if(!Yii::$app->user->isGuest) {
	        $searchModel = new ProvinceSearch();
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
     * Displays a single Province model.
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
     * Creates a new Province model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
    	  if((Yii::$app->user->id == 1) || Yii::$app->user->can('create-provincia') ) {
            $model = new Province();

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
     * Updates an existing Province model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
    	  if((Yii::$app->user->id == 1) || Yii::$app->user->can('update-provincia') ) {
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
     * Deletes an existing Province model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
    	  if((Yii::$app->user->id == 1) || Yii::$app->user->can('delete-provincia') ) {
             $this->findModel($id)->delete();

             return $this->redirect(['index']);
          } else { // user is not allowed
          	throw new ForbiddenHttpException;
          }
    }

    /**
     * Finds the Province model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Province the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Province::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
