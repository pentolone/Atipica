<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Statoattivita */

$this->title = $model->descrizione;
$this->params['breadcrumbs'][] = ['label' => 'Stato Attività', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="statoattivita-view">

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
            ['attribute' => $model->getAttributeLabel('descrizione'), 'value' => $model->descrizione, 
            'contentOptions' => [
                           'style' => 'background-color:' . $model->colore]
            ],
            'note:ntext',
            'data:datetime',
            'utente',
        ],
    ]) ?>

</div>
