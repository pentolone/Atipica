<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Anagrafica;

// Lista anagrafica
$anagrafica=Anagrafica::find()->select(['id', 'CONCAT(nome,\' \', cognome) nome'])->orderBy(['nome' => SORT_ASC])->all();
$listAnagrafiche = ArrayHelper::map($anagrafica, 'id', 'nome');

/* @var $this yii\web\View */
/* @var $model app\models\Bersaglio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bersaglio-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_anagrafica')->dropDownList(
                                         $listAnagrafiche,
                                         ['prompt'=>'Seleziona dalla lista...']); ?>

    <?= $form->field($model, 'titolo')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'descrizione')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'utente')->hiddenInput(['value' => 
                                 Yii::$app->user->identity->nome . ' ' . Yii::$app->user->identity->cognome])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
