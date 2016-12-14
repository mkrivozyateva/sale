<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "goods".
 *
 * @property integer $ID_goods
 * @property string $name_goods
 * @property integer $weight_goods
 * @property integer $price_goods
 *
 * @property Order[] $orders
 */
class Goods extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'goods';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name_goods', 'weight_goods', 'price_goods'], 'required', 'message'=>'Поле обязательно для заполнения'],
            [['price_goods', 'weight_goods'], 'number'],
			[['name_goods'], 'string', 'max' => 25],
            [['weight_goods', 'price_goods'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_goods' => 'ID',
            'name_goods' => 'Название препарата',
            'weight_goods' => 'Вес препарата',
            'price_goods' => 'Цена препарата',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['ID_goods' => 'ID']);
    }
}
