<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = 'Result Comment';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php if (Yii::$app->session->hasFlash('send_success')) : ?>

	<div class="alert alert-success">
		<?= Yii::$app->session->getFlash('send_success'); ?>
	</div>

<?php elseif (Yii::$app->session->hasFlash('delete_success')): ?>
    <div class="alert alert-warning">
        <?= Yii::$app->session->getFlash('delete_success'); ?>
    </div>

<?php elseif (Yii::$app->session->hasFlash('update_success')): ?>
    <div class="alert alert-info">
        <?= Yii::$app->session->getFlash('update_success'); ?>
    </div>
<?php endif; ?>

<h3 align="center"><?= Html::encode('Result comment'); ?></h3>
<br><br>

<div class="cotainer">
  <div class="row">
       <div class="col-md-8" style="margin-left: 200px">
        <table class="table">
            <tr>
              <td>ID</td>
              <td>Name</td>
              <td>Comment</td>
              <td></td>
            </tr>
            <?php $no = 1 ?>
            <?php if (count($comments) > 0): ?>
                <?php foreach ($comments as $comment): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $comment->name ?></td>
                        <td><?= $comment->comment ?></td>
                        <td>
                            <a class="btn btn-sm btn-danger" href="<?= Url::to(['delete-comment', 'id' => $comment->id]) ?>">Delete</a>
                            <a class="btn btn-sm btn-info" href="<?= Url::to(['edit-comment', 'id' => $comment->id]) ?>">Edit</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            <?php else: ?>
                <tr>
                    <td colspan="4"><h4 class="text-center">No Comments</h4></td>
                </tr>
            <?php endif ?>
        </table>

            <!-- link pagination -->
            <?= LinkPager::widget(['pagination' => $pagination]); ?>
        </div>
  </div>
</div>