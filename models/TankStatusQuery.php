<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[TankStatus]].
 *
 * @see TankStatus
 */
class TankStatusQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return TankStatus[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TankStatus|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
