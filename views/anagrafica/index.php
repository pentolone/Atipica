<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AnagraficaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Anagrafica';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anagrafica-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Inserisci nuova Anagrafica', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            'nome',
            'cognome',
            'sesso',
            'indirizzo',
            'citta',
            //'id_provincia',
            //'id_cittadinanza',
            //'id_stato_nascita',
            //'cap',
            //'luogo_nascita',
            //'codice_catastale',
            //'data_nascita',
            //'cf',
            //'ts',
            //'telefono',
            //'cellulare',
            //'telefono_rif',
            //'email:email',
            //'id_tipo_doc',
            //'n_doc',
            //'data_ril',
            //'data_exp',
            //'id_luogo_rilascio',
            //'id_stato_civile',
            //'id_professione',
            //'id_titolo_studio',
            //'id_classificazione',
            //'data',
            //'utente',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
