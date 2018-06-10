<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
 
/* @var $this yii\web\View */
/* @var $model models\Showutentistatus */
/* @var $form ActiveForm */
 
$this->title = 'Show item status';
$this->params['breadcrumbs'][] = ['label' => 'Stat', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-changePassword">
 
    <?php $form = ActiveForm::begin(); ?>
 
        <?= $form->field($model, 'titoloBersaglio')->textInput() ?>
        <?= $form->field($model, 'descrizioneBersaglio')->textInput() ?>
 
        <div class="form-group">
            <?= Html::submitButton('Modifica', ['class' => 'btn btn-success']) ?>
        </div>
    <?php ActiveForm::end(); ?>
 
</div>
