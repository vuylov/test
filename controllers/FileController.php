<?php
/**
 * Created by PhpStorm.
 * User: Vuilov
 * Date: 10.12.2014
 * Time: 16:30
 */

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\File;

class FileController extends Controller{

    public function behaviors()
    {
        return [
            'access'    => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ]
            ],
        ];
    }

    public function actionDelete($id = null, $model = null)
    {
        $file = File::findOne($id);
        $file->delete();
        return $this->redirect(['admin/update', 'id' => $model]);
    }
} 