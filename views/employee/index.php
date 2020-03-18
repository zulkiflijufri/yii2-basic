<h1>Daftar Employee</h1>
<?php use yii\helpers\Html; ?>
<?= Html::a('Create', ['create'],['class' => 'btn btn-sm btn-primary']); ?>
<table class="table table-bordered table-striped" style="margin-top: 10px">
	<tr>
		<th>ID</th>
		<th>Name</th>
		<th>Age</th>
		<th>Action</th>
	</tr>
	<?php foreach ($employees as $em) : ?>
		<tr>
			<td><?= $em->id ?></td>
			<td><?= $em->name ?></td>
			<td><?= $em->age ?></td>
			<td>
				<?= Html::a('<i class="glyphicon glyphicon-pencil"></i>',['update','id' => $em->id]); ?>
				<?= Html::a('<i class="glyphicon glyphicon-trash"></i>',['delete','id' => $em->id],['onclick' => 'return (confirm("Apakah data mau dihapus ??") ? true : false);','style' => 'color:red']); ?>
			</td>
		</tr>
	<?php endforeach ?>
</table>