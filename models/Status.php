<?php
/**
 * Created by PhpStorm.
 * User: Vuilov
 * Date: 01.12.2014
 * Time: 12:59
 */

namespace app\models;


class Status {
    CONST ACTIVE = 1;
    CONST DEACTIVE = 0;

    public static function getStatus($status)
    {
        switch($status){
            case 1:
                return 'Активный';
                break;
            case 0:
                return 'Неактивный';
                break;
        }
    }
} 