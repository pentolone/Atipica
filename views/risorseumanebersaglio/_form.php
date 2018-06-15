<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Risorseumanebersaglio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="risorseumanebersaglio-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_bersaglio')->textInput() ?>

    <?= $form->field($model, 'id_risorse_umane')->textInput() ?>

    <?= $form->field($model, 'data')->textInput() ?>

    <?= $form->field($model, 'utente')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
