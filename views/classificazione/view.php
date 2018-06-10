<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Classificazione */

$this->title = $model->descrizione;
$this->params['breadcrumbs'][] = ['label' => 'Classificazioni', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="classificazione-view">

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
            'descrizione',
            'note:ntext',
            'data:datetime',
            'utente',
        ],
    ]) ?>

</div>
