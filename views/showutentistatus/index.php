<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
 
/* @var $this yii\web\View */
/* @var $model models\Showutentistatus */
/* @var $form ActiveForm */
 
$this->title = 'Stato utente';
$this->params['breadcrumbs'][] = ['label' => 'Anagrafica', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anagrafica-statoUtente">
     <?php $form = ActiveForm::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'descrizione',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
 
 
        <div class="form-group">
            <?= Html::submitButton('Modifica', ['class' => 'btn btn-success']) ?>
        </div>
    <?php ActiveForm::end(); ?>
 
</div>
