<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Professione */

$this->title = $model->descrizione;
$this->params['breadcrumbs'][] = ['label' => 'Professione', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="professione-view">

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
            'note',
            'data:datetime',
            'utente',
        ],
    ]) ?>

</div>
