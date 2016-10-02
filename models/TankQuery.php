<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Tank]].
 *
 * @see Tank
 */
class TankQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Tank[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Tank|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
