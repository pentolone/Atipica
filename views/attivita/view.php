<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use \app\models\Anagrafica;

/* @var $this yii\web\View */
/* @var $model app\models\Attivita */

$schedaBersaglio = $model->getBersaglio()->one();
$desBersaglio = $schedaBersaglio['descrizione'];

$schedaStatoAttivita = $model->getStatoAttivita()->one();
$desStatoAttivita = $schedaStatoAttivita['descrizione'];

$schedaAnagrafica = Anagrafica::find()->where('id = ' . $schedaBersaglio["id_anagrafica"])->one();
$nomeUtente = $schedaAnagrafica['nome'];
$cognomeUtente = $schedaAnagrafica['cognome'];

$model->desBersaglio = $desBersaglio;
$model->desStatoAttivita = $desStatoAttivita;
$model->nomeUtente = $nomeUtente . ' ' . $cognomeUtente;

$this->title = $model->descrizione;
$this->params['breadcrumbs'][] = ['label' => 'Attività', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="attivita-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Sei sicuro di voler eliminare questo elemento?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nomeUtente',
            'desBersaglio',
            'descrizione',
            ['attribute' => $model->getAttributeLabel('desStatoAttivita'), 'value' => $desStatoAttivita, 
            'contentOptions' => [
                           'style' => 'background-color:' . $schedaStatoAttivita['colore']]
            ],

            'data_esecuzione_attivita:date',
            'data_chiusura_attivita:date',
            'attivita_conclusa:boolean',
            'note:ntext',
            'data:datetime',
            'utente',
        ],
    ]) ?>

</div>
