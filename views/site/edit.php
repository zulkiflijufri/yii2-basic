<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Edit Comment';
$this->params['breadcrumbs'][] = $this->title;

?>

<h3 align="center"><?= Html::encode('Edit your '.$this->title.' Below') ?></h3>
<br>
<?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>
<?= $form->field($comment,'name')->textInput(['autofocus' => true,'value' => $comment->name]); ?>
<?= $form->field($comment,'comment')->textarea(['rows' => 3,'col' => 7,'value' => $comment->comment]); ?>
<?= Html::submitButton('Update',['class' => 'btn btn-md btn-info', 'name' => 'edit', 'style' => 'margin-left:293px']) ?>
<?php ActiveForm::end(); ?>
<br>
<code><?= __FILE__ ?></code>