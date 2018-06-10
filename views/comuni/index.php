<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ComuniSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Comuni Italiani';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comuni-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Inserisci nuovo Comune', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

         //'id',
            'nome',
            //'sigla',
            'cap',
            'codice_catastale',
            //'codice_PS',
            //'data',
            //'utente',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
