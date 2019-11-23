<?php

use app\modules\items\models\ItemQuery;
use Codeception\PHPUnit\Constraint\Page;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

namespace app\modules\items\models;

/**
 * This is the model class for table "item".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $page_id
 *
 * @property Page $page
 */
class Items extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['page_id'], 'required'],
            [['page_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['page_id'], 'exist', 'skipOnError' => true, 'targetClass' => Page::className(), 'targetAttribute' => ['page_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'page_id' => 'Page ID',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getPage()
    {
        return $this->hasOne(Page::className(), ['id' => 'page_id'])->inverseOf('items');
    }

    /**
     * {@inheritdoc}
     * @return ItemQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ItemQuery(get_called_class());
    }
}
