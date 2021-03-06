<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\StatocivileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Stato Civile';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="statocivile-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Inserisici nuovo Stato Civile', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'descrizione',
            'note',
//            'data:datetime',
//            'utente',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
