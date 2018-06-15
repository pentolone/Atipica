<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;

$formatter = Yii::$app->formatter;
?>
<div class="rischi">
        <?= 'Titolo: ',HtmlPurifier::process($model['titolo']),  ' - Descrizione: ',
                             HtmlPurifier::process($model['descrizione']) 
 ?>
 </div>