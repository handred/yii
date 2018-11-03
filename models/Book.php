<?php

namespace app\models;

use \yii\db\ActiveRecord;
use \yii\web\UploadedFile;

class Book extends ActiveRecord {

    public $id;
    public $fio;
    public $name;
    public $year;
    public $photo;
    public $onbase;

    public static function tableName() {
        return 'book';
    }

    public function rules() {
        return [
            [['name', 'fio', 'year'], 'required'],
            [['user'], 'integer'],
            [['name', 'fio', 'photo'], 'string', 'max' => 255],
            [['photo'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
        ];
    }

}
