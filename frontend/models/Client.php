<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "client".
 *
 * @property integer $ID_client
 * @property string $last_name_client
 * @property string $first_name_client
 * @property string $patronimic_name_client
 * @property string $date_birth
 * @property string $address
 *
 * @property Order[] $orders
 */
class Client extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'client';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['last_name_client', 'first_name_client', 'patronimic_name_client', 'date_birth', 'address'], 'required', 'message'=>'Поле обязательно для заполнения'],
            [['last_name_client', 'first_name_client', 'patronimic_name_client', 'address'], 'string', 'max' => 25],
            [['date_birth'], 'type', 'type' => 'date', 'message' => '{attribute}: неверная дата (dd/mm/yyyy)', 'dateFormat' => 'dd/MM/yyyy'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_client' => 'Id',
            'last_name_client' => 'Фамилия',
            'first_name_client' => 'Имя',
            'patronimic_name_client' => 'Отчество',
            'date_birth' => 'Дата рождения',
            'address' => 'Адрес',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['ID_client' => 'Id']);
    }
}
