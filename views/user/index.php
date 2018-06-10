<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\controllers\AccessController;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Utenti';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Inserisci nuovo utente', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'username',
            //'pwd',
            //'authKey',
            //'accessToken',
            'nome',
            'cognome',
           // 'auth_rule',
            //'cellulare',
            //'email:email',
            //'sendmail',
//            'data',
            //'data:datetime',
            //'utente',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
