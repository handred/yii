<?php

namespace app\models;

use \Yii;
use \yii\db\ActiveRecord;
use \yii\web\UploadedFile;
use yii\imagine\Image;

class Book extends ActiveRecord {

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

        if (!is_dir(\Yii::getAlias('@uploads'))) {
            mkdir(\Yii::getAlias('@uploads'));
        }

        if (!is_dir(\Yii::getAlias('@uploads/thumb'))) {
            mkdir(\Yii::getAlias('@uploads/thumb'));
        }

        $this->photo->saveAs(\Yii::getAlias('@uploads') . $photo);
        Image::thumbnail(\Yii::getAlias('@uploads') . $photo, 50, 50)->save(\Yii::getAlias('@uploads/thumb/') . $photo, ['quality' => 95]);

        return $photo;
    }

    public function getimage() {

        if (!is_file(\Yii::getAlias('@uploads') . $this->photo)) {
            $this->photo = 'nofoto.jpg';
        }
        return ['small' => \Yii::getAlias('@web/uploads/thumb/') . $this->photo, 'big' => \Yii::getAlias('@web/uploads/') . $this->photo];
    }

}
