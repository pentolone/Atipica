<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use \app\models\Province;


/* @var $this yii\web\View */
/* @var $model app\models\Anagrafica */
$schedaProvincia = $model->getProvincia()->one();
$model->nomeProvincia = $schedaProvincia['nome'] . ' (' . $schedaProvincia['sigla'] . ')';

$schedaCittadinanza = $model->getCittadinanza()->one();
$model->descrizioneCittadinanza = $schedaCittadinanza['nazione_PS'];

$schedaStatoNascita = $model->getStatoNascita()->one();
$model->descrizioneStatoNascita = $schedaStatoNascita['nazione_PS'];

$schedaTpDoc = $model->getTipoDocumento()->one();
$model->descrizioneTipoDocumento = $schedaTpDoc['descrizione'];

$luogoRilascio = $model->getLuogoRilascio()->one();
$model->luogoRilascio = $luogoRilascio['nome'];

$schedaClassificazione = $model->getClassificazione()->one();
$model->descrizioneClassificazione = $schedaClassificazione['descrizione'];

if($luogoRilascio) {
	// Cerco la provincia del luogo di rilascio
	$a = Province::find()->where(['id' => $luogoRilascio['id_provincia']])->one();
 	$model->luogoRilascio .= ' (' . $a['sigla'] . ')';
  }
 
$schedaProfessione = $model->getProfessione()->one();
$model->descrizioneProfessione = $schedaProfessione['descrizione'];

$schedaTitoloStudio = $model->getTitoloStudio()->one();
$model->descrizioneTitoloStudio = $schedaTitoloStudio['descrizione'];

$this->title = $model->nome . ' ' . $model->cognome;
$this->params['breadcrumbs'][] = ['label' => 'Anagrafica', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anagrafica-view">

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
            'nome',
            'cognome',
            'sesso',
            'indirizzo',
            'cap',
            'citta',
            'nomeProvincia',
            'descrizioneCittadinanza',
            'descrizioneStatoNascita',
            'luogo_nascita',
            'codice_catastale',
            'data_nascita:date',
            'cf',
            'ts',
            'telefono',
            'cellulare',
            'telefono_rif',
            'email:email',
            'descrizioneTipoDocumento',
            'n_doc',
            'data_ril:date',
            'data_exp:date',
            'luogoRilascio',
            'descrizioneStatoCivile',
            'descrizioneProfessione',
            'descrizioneTitoloStudio',
            'descrizioneClassificazione',
            'data:datetime',
            'utente',
        ],
    ]) ?>

</div>
