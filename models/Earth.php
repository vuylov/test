<?php
/**
 * Created by PhpStorm.
 * User: Vuilov
 * Date: 19.11.2014
 * Time: 10:25
 */

namespace app\models;


class Earth extends Realty{
    const TYPE = 6;
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