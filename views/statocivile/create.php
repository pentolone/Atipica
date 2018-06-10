<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Statocivile */

$this->title = 'Inserisci nuovo Stato Civile';
$this->params['breadcrumbs'][] = ['label' => 'Stato Civile', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="statocivile-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
