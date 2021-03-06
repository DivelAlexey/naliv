<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Track]].
 *
 * @see Track
 */
class TrackQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Track[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Track|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
