<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[WayPoint]].
 *
 * @see WayPoint
 */
class WayPointQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return WayPoint[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return WayPoint|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
