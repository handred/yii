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
            [['name', 'fio', 'year'], 'required'],
            [['user'], 'integer'],
            [['name', 'fio'], 'string', 'max' => 255],
            [['year'], 'string', 'max' => 4],
            [['photo'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg']
        ];
    }

    public function uploadphoto() {
        if (!$this->validate()) {
            return false;
        }
        $photo = $this->photo->baseName . '.' . $this->photo->extension;
        $this->photo->saveAs('uploads/' . $photo);
        return $photo;
    }
    
    public function getimage(){
        if(!is_file('uploads/'.$this->photo)){
            return false;
        }
        return  '<a target="_blank" href="/uploads/'.$this->photo.'"><img width="80" src="/uploads/'.$this->photo.'"/></a>';
    }

}
