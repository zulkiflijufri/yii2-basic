<?php
namespace app\widgets;

use Yii;

class Alert2 extends \yii\bootstrap\Widget
{
    public function init()
    {
    	parent::init();
    	if(Yii::$app->session->hasFlash('send_success'))
    	{
    		echo '<div class="alert alert-success">';
    		echo Yii::$app->session->getFlash('send_success');
    		echo '</div>';
    	} else if(Yii::$app->session->hasFlash('update_success'))
    	{
    		echo '<div class="alert alert-info">';
    		echo Yii::$app->session->getFlash('update_success');
    		echo '</div>';
    	} else if(Yii::$app->session->hasFlash('delete_success'))
    	{
    		echo '<div class="alert alert-danger">';
    		echo Yii::$app->session->getFlash('delete_success');
    		echo '</div>';
    	}
    }
}