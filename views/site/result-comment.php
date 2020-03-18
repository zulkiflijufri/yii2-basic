<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = 'Result Comment';
$this->params['breadcrumbs'][] = $this->title;
?>

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
                            <?= Html::a('Delete',['delete-comment','id' => $comment->id], ['class' => 'btn btn-sm btn-danger']); ?>
                            <?= Html::a('Edit',['edit-comment','id' => $comment->id], ['class' => 'btn btn-sm btn-info']); ?>
                        </td>
                    </tr>
                <?php endforeach ?>
            <?php else: ?>
                <tr>
                    <td colspan="4"><h4 class="text-center">No Comments</h4></td>
                </tr>
            <?php endif ?>
        </table>
        <br>
            <!-- link pagination -->
            <div class="text-center">
                <?= LinkPager::widget(['pagination' => $pagination]); ?>
            </div>
        </div>
  </div>
</div>