<?php
/**
 * Created by PhpStorm.
 * User: Vuilov
 * Date: 18.12.2014
 * Time: 12:26
 */

namespace app\components;
use Yii;
use yii\base\Widget;
use yii\helpers\Url;
use app\models\Realty;

class NewOffer extends Widget{
    public $count;
    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $html = '<ul class="offers">';
        $realties = Realty::find()->with(['files', 'region'])->orderBy('create_time')->limit($this->count)->all();
        //VarDumper::dump($realties, 10 ,true);
        foreach($realties as $realty){
            $html.='<li><div class="img-container"><a href="'.Url::to(['realty/view', 'type' => $realty->type_id, 'id' => $realty->id]).'"><img src="'.$realty->randomImg.'" width="218px" class="img-responsive img-thumbnail"></a>';
            $html.='<div class="realty-price">'.$realty->price.' руб</div></div>';
            $html.='<div class="small">'.$realty->type->name.'</div>';
            $html.='<div class="small">'.$realty->region->name.'</div>';
            $html.='<div class="small">'.$realty->address.'</div>';
            $html.='</li>';
        }
        $html.='</ul>';
        return $html;
    }

}