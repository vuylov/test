<?php
/**
 * Created by PhpStorm.
 * User: Vuilov
 * Date: 19.11.2014
 * Time: 10:24
 */

namespace app\models;


class Share extends Realty{
    const TYPE = 3;
    public static function find()
    {
        return parent::find()->where(['type_id' => self::TYPE]);
    }

    public function beforeSave($insert)
    {
        $this->type_id = self::TYPE;
        return parent::beforeSave($insert);
    }
} 