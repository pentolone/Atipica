<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Bersaglio */
//$nome;

$result = $model->getAnagrafica()->one();
$nome = $result['nome'] . ' ' . $result['cognome'];

$this->title = $nome;

$model->nomeUtente = $nome;
$this->params['breadcrumbs'][] = ['label' => 'Bersaglio', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="bersaglio-view">

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
            'titolo',
            'descrizione:ntext',
            'data:datetime',
            'utente',
        ],
    ]) ?>

</div>
