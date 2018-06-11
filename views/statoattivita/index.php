<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\StatoattivitaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Stato Attività';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="statoattivita-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Inserisci nuovo Stato attività', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions'=>function($model){
                return ['style' => 'background-color:' . $model->colore];
            },
           'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'descrizione',
            'note:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
