<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NazioniSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Nazioni';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nazioni-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Inserisci nuova Nazione', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            'nazione_PS',
            'codice_PS',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
