<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Comments';
$this->params['breadcrumbs'][] = $this->title;

?>

<h3 align="center"><?= Html::encode('Put your '.$this->title.' Below') ?></h3>
<br>
<?php $form = ActiveForm::begin([
	'layout' => 'horizontal',
	'enableClientValidation' => false
]); ?>
<?= $form->field($comment,'name')->textInput(['autofocus' => true]); ?>
<?= $form->field($comment,'comment')->textarea(['rows' => 3,'col' => 7]); ?>
<?= Html::submitButton('Send',['class' => 'btn btn-md btn-info', 'name' => 'send', 'style' => 'margin-left:293px']) ?>
<?php ActiveForm::end(); ?>