<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RisorseumanebersaglioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Risorseumanebersaglios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="risorseumanebersaglio-index">

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

            'id',
            'id_bersaglio',
            'id_risorse_umane',
            'data',
            'utente',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
