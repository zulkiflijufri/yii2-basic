<?php

namespace app\models;

use yii\db\ActiveRecord;

class Comment extends ActiveRecord
{
    // public $name;
    // public $comment;

    public function rules()
    {
    	return [
    		[
    			['name','comment'], 'required'
    		],
    	];
    }
}
?>