<?php

namespace app\controllers;

use Yii;
use app\models\Authitem;
use app\models\AuthitemSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;

/**
 * AuthitemController implements the CRUD actions for Authitem model.
 *
 *-----------------------------------------------------
 *                 Admin ONLY! (id user = 1)
 *-----------------------------------------------------
 */
class AuthitemController extends Controller
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
     * Lists all Authitem models.
     * @return mixed
     */
    public function actionIndex()
    {
     	  if(Yii::$app->user->id == 1)  {
            $searchModel = new AuthitemSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            $dataProvider->query->orderBy('name');

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
          } else { // user is not allowed
          	throw new ForbiddenHttpException;
          }             
    }

    /**
     * Displays a single Authitem model.
     * @param string $id
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
     * Creates a new Authitem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
     	  if(Yii::$app->user->id == 1)  {
            $model = new Authitem();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->name]);
            }

            return $this->render('create', [
                'model' => $model,
            ]);
          } else { // user is not allowed
          	throw new ForbiddenHttpException;
          }             
    }

    /**
     * Updates an existing Authitem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
     	  if(Yii::$app->user->id == 1)  {
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->name]);
            }

            return $this->render('update', [
                'model' => $model,
            ]);
          } else { // user is not allowed
          	throw new ForbiddenHttpException;
          }             
    }

    /**
     * Deletes an existing Authitem model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
     	  if(Yii::$app->user->id == 1)  {
            $this->findModel($id)->delete();

            return $this->redirect(['index']);
          } else { // user is not allowed
          	throw new ForbiddenHttpException;
          }             
    }

    /**
     * Finds the Authitem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Authitem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Authitem::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
