<?php
namespace frontend\controllers;
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use app\models\Sale;
use app\models\Goods;
use app\models\Client;
use app\models\Order;

/**
 * Site controller
 */
class SaleController extends Controller
{ 
	public function actionIndex ()
	{
		$goods=Goods::find()
		->orderBy(['name_goods' => SORT_ASC])
		->all ();
		return $this->render('index', ['goods' => $goods]);
	}
	
	public function actionView($id){
		$goods = Books::findOne($id);
		if ($goods) {
			return $this->render('view',
			['goods' => $goods]);
		} else {
			throw new \yii\web\NotFoundHttpException('Препарат не найден');
		}
	}

	public function actionOrder ($id)
	{
		$order = new Order;
		if ($order->load(Yii::$app->request->post())) {
			$order->ID_goods = $id;
			$order->status_order = 0;
			if ($order->save()) {
				return $this->redirect(['sale/index']);
			} else {
				echo 'GoodsID: '.$order->ID_goods;
				echo '<br>ClientID: '.$order->ID_client;
				echo '<br>Quantity: '.$order->quantity_goods;
				echo '<br>Status: '.$order->status_order;
			}
		} else {
			$order->ID_goods = $id;
			$product=Goods::findOne($id);
			$clients=Client::find()
			->orderBy(['last_name_client' => SORT_ASC])
			->all ();
			return $this->render('order', ['product' => $product, 'clients' => $clients, 'order' => $order]);
		}
	}
}