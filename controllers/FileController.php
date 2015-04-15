<?php
/**
 * Created by PhpStorm.
 * User: Vuilov
 * Date: 10.12.2014
 * Time: 16:30
 */

namespace app\controllers;

use Yii;
use app\models\Realty;
use app\models\File as F;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\helpers\FileHelper;
use yii\web\NotFoundHttpException;

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
        if(is_null($id) && is_null($model))
            throw new NotFoundHttpException('Ошибка при удалении файла');

        $file = File::findOne($id);

        if($file !== null){
            $file->delete();
            unlink(Yii::getAlias('@webroot').'/'.$file->path);
            //unlink(Yii::getAlias('@webroot').'/'.$file->thumbnail);
        }
        return $this->redirect(['admin/update', 'id' => $model]);
    }

    public function actionThumbnail($id = null, $model = null)
    {
        if(!$id && $model){
            echo 'Отсутствуют обязательные параметры';
            exit;
        }

        $file   = F::findOne($id);
        $model  = Realty::findOne($model);

        if(!$file && !$model){
            echo 'Модели не найдены в базе';
            exit;
        }else{

            $model->thumb = $file->path;
            $model->save();
            echo 'Стартовое изображение предпросмотра установлено успешно';
        }
    }
} 