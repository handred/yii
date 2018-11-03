<?php

namespace app\models;

class Book extends \yii\db\ActiveRecord
{
    public $id;
    public $username;
    public $password;
    public $authKey;
    public $accessToken;


    
    public static function tableName()
    {
        return 'book';
    }
    
}
