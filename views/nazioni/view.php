<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Nazioni */

$this->title = $model->nazione_PS;
$this->params['breadcrumbs'][] = ['label' => 'Nazioni', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nazioni-view">

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
            'nazione_PS',
            'codice_PS',
            'data:datetime',
            'utente',
        ],
    ]) ?>

</div>
