<?php

namespace app\models;

use \yii\db\ActiveRecord;
use \yii\web\UploadedFile;

class Book extends ActiveRecord {

    public static function tableName() {
        return 'book';
    }

    public function rules() {
        return [
            [['name', 'fio', 'year','photo'], 'required'],
            [['user'], 'integer'],
            [['name', 'fio'], 'string', 'max' => 255],
            [['photo'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

    public function upload() {
        if (!$this->validate()) {
            return false;
        }
        $photo = $this->photo->baseName . '.' . $this->photo->extension;
        $this->photo->saveAs('uploads/' . $photo);
        return $photo;
    }

}
