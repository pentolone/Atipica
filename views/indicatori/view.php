<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use \app\models\Anagrafica;

/* @var $this yii\web\View */
/* @var $model app\models\Indicatori */
$schedaBersaglio = $model->getBersaglio()->one();
$schedaAnagrafica = Anagrafica::find()->where('id = ' . $schedaBersaglio["id_anagrafica"])->one();
$nomeUtente = $schedaAnagrafica['nome'];
$cognomeUtente = $schedaAnagrafica['cognome'];

$desBersaglio = $schedaBersaglio['descrizione'];
$model->desBersaglio = $desBersaglio;
$model->nomeUtente = $nomeUtente . ' ' . $cognomeUtente;

$this->title = $model->titolo;
$this->params['breadcrumbs'][] = ['label' => 'Indicatori', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="indicatori-view">

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
//            'id_bersaglio',
            'nomeUtente',
            'titolo',
            'descrizione:ntext',
            'desBersaglio',
            'data:datetime',
            'utente',
        ],
    ]) ?>

</div>
