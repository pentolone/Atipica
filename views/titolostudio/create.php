<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Titolostudio */

$this->title = 'Inserisci nuovo Titolo di Studio';
$this->params['breadcrumbs'][] = ['label' => 'Titolostudio', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="titolostudio-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
