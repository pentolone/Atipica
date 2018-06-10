<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Bersaglio */

$this->title = 'Inserisci nuovo bersaglio';
$this->params['breadcrumbs'][] = ['label' => 'Bersaglio', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bersaglio-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
