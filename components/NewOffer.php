<?php
/**
 * Created by PhpStorm.
 * User: Vuilov
 * Date: 18.12.2014
 * Time: 12:26
 */

namespace app\components;
use app\models\Status;
use Yii;
use yii\base\Widget;
use yii\helpers\Url;
use app\models\Realty;
use yii\helpers\VarDumper;
use yii\web\HttpException;

class NewOffer extends Widget{

    const MODE_LAST = 1;
    const MODE_SIMILAR = 2;

    public $mode;
    public $count;
    public $model;

    public function init()
    {
        parent::init();
    }

    public function run()
    {

        if($this->mode === NewOffer::MODE_LAST){
            $realties = Realty::find()->with(['files', 'region', 'region', 'type'])->where(['status' => Status::ACTIVE])->orderBy(['create_time' => SORT_DESC])->limit($this->count)->all();
        }
        elseif($this->mode === NewOffer::MODE_SIMILAR){
            if($this->model === null)
                throw new HttpException(500, 'Bad parameters');

            $realties = Realty::find()->with(['files', 'region', 'region', 'type'])->where(
                'status = :status AND type_id = :type AND region_id = :region AND id <> :id', [
                ':status'   => Status::ACTIVE,
                ':type'     => $this->model->type_id,
                ':region'   => $this->model->region_id,
                ':id'       => $this->model->id
            ])->orderBy(['create_time' => SORT_DESC])->limit($this->count)->all();
        }

        if(count($realties) > 0){
            $html = '<ul class="offers">';
            foreach($realties as $realty){
                $html.='<li><div class="img-container"><a href="'.Url::to(['realty/view', 'type' => $realty->type_id, 'id' => $realty->id]).'"><img src="'.$realty->thumbnail.'" width="218px" class="img-responsive img-thumbnail"></a>';
                $html.='<div class="realty-price">'.$realty->price.' руб.</div></div>';
                $html.='<div class="small">'.$realty->type->name.'</div>';
                $html.='<div class="small">'.$realty->region->name.' р-н</div>';
                $html.='<div class="small">'.$realty->address.'</div>';
                $html.='</li>';
            }
            $html.='</ul>';
        }
        else{
            $html = '<div>Предложений нет</div>';
        }
        return $html;
    }

}