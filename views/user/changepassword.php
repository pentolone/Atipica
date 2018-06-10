<?php
use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use yii\base\Widget;
use kartik\color\ColorInput;
 
/* @var $this yii\web\View */
/* @var $model frontend\models\Changepassword */
/* @var $form ActiveForm */
 
$this->title = 'Modifica password utente ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Utenti', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-changePassword">

    <h1><?= Html::encode($this->title) ?></h1>
 
    <?php $form = ActiveForm::begin([
        'id' => 'userchangepassword-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-2\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-2 control-label', 'style' => 'text-align: left'],
        ],
    ]); ?>
 
        <?= $form->field($model, 'old_password')->passwordInput() ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <?= $form->field($model, 'confirm_password')->passwordInput() ?>
        <?= $form->field($model, 'color')->widget(ColorInput::classname(), [
    'options' => ['placeholder' => 'Select color ...'],
]) ?>
<?php echo '<label class="control-label">Select Color</label>';
echo ColorInput::widget([
    'model' => $model,
    'attribute' => 'color_1',
    'options' => ['placeholder' => 'Select color ...']]); 
?>
        <div class="form-group">
            <?= Html::submitButton('Modifica', ['class' => 'btn btn-success']) ?>
        </div>
    <?php ActiveForm::end(); ?>
</div>