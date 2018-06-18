<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Responsabilita */

$this->title = $model->titolo;
$this->params['breadcrumbs'][] = ['label' => 'Responsabilità', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="responsabilita-view">

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
            'titolo',
            'note:ntext',
            'data:datetime',
            'utente',
        ],
    ]) ?>

</div>
