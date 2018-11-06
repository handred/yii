<?php

namespace app\models;

use \yii;
use \yii\db\ActiveRecord;
use \yii\web\UploadedFile;
use yii\imagine\Image;

class Book extends ActiveRecord {

    const upload_dir = 'uploads/';
    const upload_dir_small = 'uploads/thumb';

    public static function tableName() {
        return 'book';
    }

    public function rules() {
        return [
            [['name', 'fio', 'year'], 'required'],
            [['user'], 'integer'],
            [['onbase'], 'boolean'],
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

        if (!is_dir(self::upload_dir)) {
            mkdir(self::upload_dir);
        }

        if (!is_dir(self::upload_dir_small)) {
            mkdir(self::upload_dir_small);
        }

        $this->photo->saveAs(self::upload_dir . $photo);

        Image::thumbnail(self::upload_dir . $photo, 50, 50)->save(self::upload_dir_small . $photo, ['quality' => 95]);

        return $photo;
    }

    public function getimage() {
        if (!is_file(self::upload_dir . $this->photo)) {
            return '/' . self::upload_dir . '/nofoto.jpg';
        }
        return '/' . self::upload_dir . $this->photo;
    }

}
