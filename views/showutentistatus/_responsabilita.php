<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;

$formatter = Yii::$app->formatter;
?>
<div class="responsabilita">
        <?= 'Titolo: ',HtmlPurifier::process($model['titolo']),  ' - Note: ',
                             HtmlPurifier::process($model['note']) 
 ?>
 </div>