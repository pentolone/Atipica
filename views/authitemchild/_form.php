<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Authitem;

/* @var $this yii\web\View */
/* @var $model app\models\Authitemchild */
/* @var $form yii\widgets\ActiveForm */
$listp = AuthItem::find()->where(['type' => 1])->orderBy(['name' => SORT_ASC])->all();
$listc = AuthItem::find()->where(['type' => 2])->orderBy(['name' => SORT_ASC])->all();
$listParent = ArrayHelper::map($listp, 'name',('description' != null ? 'name' : 'description'));
$listChildren = ArrayHelper::map($listc, 'name', ('description' != null ? 'name' : 'description'));
?>

<div class="authitemchild-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'parent')->dropDownList(
                                         $listParent,
                                         ['prompt'=>'Seleziona dalla lista...']); ?>

    <?= $form->field($model, 'child')->dropDownList(
                                         $listChildren,
                                         ['prompt'=>'Seleziona dalla lista...']); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
