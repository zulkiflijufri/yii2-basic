<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>

<h1>Create Employee</h1>
<?php $form = ActiveForm::begin(); ?>
<?= $form->field($employee, 'name')->textInput(['autocomplete' => 'off']); ?>
<?= $form->field($employee, 'age')->textInput(['autocomplete' => 'off']); ?>
<?= Html::a('Back',['index'], ['class' => 'btn btn-sm btn-warning']); ?>
<?= Html::submitButton('Simpan', ['class' => 'btn btn-sm btn-info','style' => 'margin-left:10px']); ?>
<?php ActiveForm::end(); ?>