<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Responsabilita */

$this->title = 'Inserisci nuova Responsabilità';
$this->params['breadcrumbs'][] = ['label' => 'Responsabilità', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="responsabilita-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
