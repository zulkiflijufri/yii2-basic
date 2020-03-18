<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>

<h1>Update Employee</h1>
<?php $form = ActiveForm::begin(); ?>
<?= $form->field($employee, 'name')->textInput(['value' => $employee->name,'autocomplete' => 'off']); ?>
<?= $form->field($employee, 'age')->textInput(['value' => $employee->age,'autocomplete' => 'off']); ?>
<?= Html::submitButton('Update', ['class' => 'btn btn-sm btn-success']); ?>
<?php ActiveForm::end(); ?>
