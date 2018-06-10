<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Professione */

$this->title = 'Inserisci nuova Professione';
$this->params['breadcrumbs'][] = ['label' => 'Professioni', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="professione-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
