<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;

$formatter = Yii::$app->formatter;
?>
<div class="risorseumane">
        <?= 'Titolo: ',HtmlPurifier::process($model['titolo']),  ' - Note: ',
                             HtmlPurifier::process($model['note']) 
 ?>
 </div>