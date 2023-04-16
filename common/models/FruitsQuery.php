<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Fruits]].
 *
 * @see Fruits
 */
class FruitsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Fruits[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Fruits|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
