<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Indicatori */

$this->title = 'Inserisci nuovo Indicatore';
$this->params['breadcrumbs'][] = ['label' => 'Indicatori', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="indicatori-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
