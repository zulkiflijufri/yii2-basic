<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'Yii2 App';
?>
<div class="site-index" style="background-color: #f0efef;">

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h2 class="display-4">
                Congratulations!
            </h2>
            <p class="lead">
                <!-- a href to views 'site/comment' -->
                <!-- <a href="<?= Url::to(['comment']) ?>">Let's join in the comment with Helper Url</a> -->
                <?= Html::a('Let\'s join in the comment',['comment']); ?>
            </p>
        </div>
    </div>

    <div class="body-content">

    </div>
</div>
