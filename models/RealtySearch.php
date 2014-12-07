<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Role;
use app\models\Realty;
use yii\helpers\VarDumper;
use app\models\Status;
/**
 * RealtySearch represents the model behind the search form about `app\models\Realty`.
 */
class RealtySearch extends Realty
{
    public $beforePrice;
    public $afterPrice;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'type_id', 'user_id', 'region_id', 'builder_id', 'room_id', 'layout_id', 'housetype_id', 'category_id', 'furnish_id', 'price', 'status'], 'integer'],
            [['square', 'square_plot', 'address', 'detail', 'owner', 'create_time', 'deactivate_time', 'beforePrice', 'afterPrice'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function attributeLabels()
    {
        return [
            'region_id'     => 'Район',
            'builder_id'    => 'Застройщик',
            'room_id'       => 'Количество комнат',
            'layout_id'     => 'Вид планировки',
            'housetype_id'     => 'Тип дома',
            'square'        => 'Площадь',
            'square_plot'   => 'Площадь участка',
            'price'         => 'Цена',
            'address'       => 'Адрес',
            'detail'        => 'Подробнее',
            'owner'         => 'Владелец',
            'create_time'   => 'Дата добавления',
            'category_id'   => 'Вид постройки',
            'furnish_id'    => 'Тип отделки',
            'beforePrice'   => 'Цена от',
            'afterPrice'    => 'Цена до',
            'earthtype_id'  => 'Тип назначения',
            'commercetype_id'=> 'Тип коммерческой недвжимиости',
            'user_id'       => 'Недвижимость добавил'

        ];
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     * @param int $type
     * @param int $active
     *
     * @return ActiveDataProvider
     */
    public function search($params, $type, $active = Status::ACTIVE)
    {

        $query = Realty::find();
        $query->where([
            'type_id'   => $type,
            'status'    => $active
        ]);

        if(Yii::$app->user->identity->role_id == Role::REALTOR)
            $query->andWhere([
                'user_id'   => Yii::$app->user->id
            ]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id'                => $this->id,
            'type_id'           => $this->type_id,
            'user_id'           => $this->user_id,
            'region_id'         => $this->region_id,
            'builder_id'        => $this->builder_id,
            'room_id'           => $this->room_id,
            'layout_id'         => $this->layout_id,
            'housetype_id'      => $this->housetype_id,
            'category_id'       => $this->category_id,
            'price'             => $this->price,
            'status'            => $this->status,
            'create_time'       => $this->create_time,
            'deactivate_time'   => $this->deactivate_time,
            'furnish_id'        => $this->furnish_id,
            'earthtype_id'      => $this->earthtype_id,
            'commercetype_id'   => $this->commercetype_id,
        ]);

        $query->andFilterWhere(['like', 'square', $this->square])
            ->andFilterWhere(['like', 'square_plot', $this->square_plot])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'detail', $this->detail])
            ->andFilterWhere(['like', 'owner', $this->owner]);

        $query->andFilterWhere(['between', 'price', $this->beforePrice, $this->afterPrice]);

        return $dataProvider;
    }
}
