<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property integer $ID_order
 * @property integer $ID_client
 * @property integer $ID_goods
 * @property integer $quantity_goods
 * @property integer $status_order
 *
 * @property Client $iDClient
 * @property Goods $iDGoods
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_client', 'ID_goods', 'quantity_goods', 'status_order'], 'required'],
            [['ID_client', 'ID_goods', 'quantity_goods', 'status_order'], 'integer', 'message'=>'Должно быть числовое значение'],
            [['ID_client'], 'exist', 'skipOnError' => true, 'targetClass' => Client::className(), 'targetAttribute' => ['ID_client' => 'ID_client']],
            [['ID_goods'], 'exist', 'skipOnError' => true, 'targetClass' => Goods::className(), 'targetAttribute' => ['ID_goods' => 'ID_goods']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_order' => 'ID заказа',
            'ID_client' => 'ID клиента',
            'ID_goods' => 'ID препарата',
            'quantity_goods' => 'Количество',
            'status_order' => 'Статус',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDClient()
    {
        return $this->hasOne(Client::className(), ['ID_client' => 'ID_client']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDGoods()
    {
        return $this->hasOne(Goods::className(), ['ID_goods' => 'ID_goods']);
    }
}
