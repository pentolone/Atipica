<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Risorseumane */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="risorseumane-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'titolo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'note')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'utente')->hiddenInput(['value' => 
                                 Yii::$app->user->identity->nome . ' ' . Yii::$app->user->identity->cognome])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
