<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use \app\models\Authitem;
use \app\models\Authitemchild;


/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
//$uLevel=AuthItemChild::find()->select(['parent', 'parent'])->distinct();
//$uLevel=Authitemchild::find()->all();
$uLevel=Authitem::find()->where(['type' => 1])->all();
$listData = ArrayHelper::map($uLevel, 'name', 'name');
?>


<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    
   <?php // Show password only if in insert 
       if(!$model->getID()) { ?>  
         <?= $form->field($model, 'pwd')->passwordInput(['maxlength' => true]) ?>
         <?= $form->field($model, 'repeat_pwd')->passwordInput(['maxlength' => true]) ?>

   <?php } ?>

    <?= $form->field($model, 'auth_rule')->dropDownList(
                                         $listData,
                                         ['prompt'=>'Seleziona dalla lista...']); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cognome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cellulare')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sendmail')->checkbox() ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'utente')->hiddenInput(['value' => 
                                 Yii::$app->user->identity->nome . ' ' . Yii::$app->user->identity->cognome])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
