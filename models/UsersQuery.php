<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[PortalUser]].
 *
 * @see PortalUser
 */
class UsersQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return PortalUser[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return PortalUser|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
