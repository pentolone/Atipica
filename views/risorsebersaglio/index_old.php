<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RisorsebersaglioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Responsabilità/Risorse Bersaglio';
$this->params['breadcrumbs'][] = $this->title;
//$a = count($searchModel->id_responsabilita);

//var_dump($dataProvider);
//return;
$model = $dataProvider->models;
$baseURL = 'index.php?r=risorsebersaglio/';
//var_dump($model[0]->id_bersaglio);
//var_dump($model[0]['id_bersaglio']);
//return;

?>
<div class="risorsebersaglio-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Risorseumanebersaglio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'desBersaglio',
            'ctrResponsabilita',
            'id_bersaglio',

            ['class' => 'yii\grid\ActionColumn',
						'header' => 'Actions',
			         'template' => '{view}{update}{delete}',
			          'buttons' => [
			          
					          'view' => function ($url, $model) {
						                return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
		                            'title' => Yii::t('app', 'lead-view'),
						                ]);
					            },
					          ],
            'urlCreator' => function ($action, $model, $key, $index) {
            	                $baseURL = 'index.php?r=risorsebersaglio/';
					            if ($action === 'view') {
					                $url =$baseURL . $action . '&id_bersaglio='.$model['id_bersaglio'];
					                //var_dump($model);
					                return $url;
						            }

					            if ($action === 'update') {
					                $url =$baseURL . $action . '&id_bersaglio='.$model['id_bersaglio'];
					                //var_dump($model);
					                return $url;
						            }
						         }		     
				  ],
			  ],
    ]); ?>
</div>
