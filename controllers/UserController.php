<?php

namespace app\controllers;

use Yii;
use app\models\User;
use app\models\UserSearch;
use app\models\Changepassword;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
return [
        'access' => [
            'class' => \yii\filters\AccessControl::className(),
            'only' => ['create', 'update'],
            'rules' => [
                // deny all POST requests
                [
                    'allow' => true,
                    'verbs' => ['POST'],
                    'roles' => ['@'],
                    
                ],
                // allow authenticated users
                [
                    'allow' => true,
                    'roles' => ['@'],
                ],
                // everything else is denied
            ],
        ],
    ];
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
    	  if(!Yii::$app->user->isGuest) {
	        $searchModel = new UserSearch();
	        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
	        
	        // set order by
	        $dataProvider->query->orderBy('username');
	        //var_dump($dataProvider);
	        return $this->render('index', [
	            'searchModel' => $searchModel,
	            'dataProvider' => $dataProvider,
	        ]);
          } else { // user is not allowed
          	throw new ForbiddenHttpException;
          }             
    }

    /**
     * Displays a single User model.
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
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
    	  if((Yii::$app->user->id == 1) || Yii::$app->user->can('create-user') ) {
            $model = new User();
            $model->setScenario('insert');

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
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
    	  if((Yii::$app->user->id == 1) || Yii::$app->user->can('update-user') ) {
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
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
    	  if((Yii::$app->user->id == 1) || Yii::$app->user->can('delete-user') ) {
             $this->findModel($id)->delete();

             return $this->redirect(['index']);
           } else { // user is not allowed
          	  throw new ForbiddenHttpException;
             }   
      }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('La pagina richiesta NON esiste.');
    }
/**
 * Change User password.
 *
 * @return mixed
 * @throws BadRequestHttpException
 */
public function actionChangepassword()
{
    $id = \Yii::$app->user->id;
 
    try {
        $model = new Changepassword($id);
       // var_dump($model);
        //return;
    } catch (InvalidParamException $e) {
        throw new \yii\web\BadRequestHttpException($e->getMessage());
    }
 
    if ($model->load(\Yii::$app->request->post()) && $model->validate() && $model->changePassword()) {
        \Yii::$app->session->setFlash('success', 'Password modificata con successo!');
    }
 
    return $this->render('changepassword', [
        'model' => $model,
    ]);
}
 
}
