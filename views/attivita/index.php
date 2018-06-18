<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AttivitaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Attività';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="attivita-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Inserisci nuova attività', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nomeUtente',
            'desBersaglio',
            'descrizione',
            'desStatoAttivita',
            'data_esecuzione_attivita:date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
