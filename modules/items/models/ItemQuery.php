<?php

use app\modules\items\models\Items;
use yii\db\ActiveQuery;

namespace app\modules\items\models;

/**
 * This is the ActiveQuery class for [[Items]].
 *
 * @see Items
 */
class ItemQuery extends ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Items[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Items|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
