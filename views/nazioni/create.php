<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Nazioni */

$this->title = 'Inserisci nuova Nazione';
$this->params['breadcrumbs'][] = ['label' => 'Nazioni', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nazioni-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
