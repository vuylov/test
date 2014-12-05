<?php
/**
 * Created by PhpStorm.
 * User: Vuilov
 * Date: 30.10.2014
 * Time: 10:16
 */

namespace app\controllers;

use Yii;
use yii\helpers\VarDumper;
use yii\web\Controller;
use app\models\Realty;
use yii\web\NotFoundHttpException;
use app\models\Status;
use app\models\RealtySearch;

class RealtyController extends Controller{

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionView($type = null, $id = null)
    {
        $model = Realty::getInstanceType($type);

        $searchModel = new RealtySearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $type, Status::ACTIVE);


        if(is_null($id))//Выбрать все объекты по типу
        {

            return $this->render($model['folder'].'/public/index', [
                'type'          => $type,
                'dataProvider'  => $dataProvider,
                'model'   => $searchModel
            ]);
        }
        else {//просмотр объекта в разрезе типа
            $object = $model['class']::findOne($id);
            return $this->render($model['folder'].'/public/view', [
                'object'    => $object,
                'type'      => $type,
                'dataProvider'  => $dataProvider,
                'model'   => $searchModel,
            ]);
        }
    }

    public function actionDetail($type = null, $id = null)
    {
        $model  =   Realty::getInstanceType($type);
        if(!$id)
            throw new NotFoundHttpException('Объект недвижимости не найден');
        $object = Realty::findOne($id);
        return $this->render($model['folder'].'/public/detail',[
            'object'    => $object
        ]);
    }

}