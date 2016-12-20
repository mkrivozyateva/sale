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
		$goods = Goods::findOne($id);
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
		$client = new Client;
		if ($order->load(Yii::$app->request->post()) && $client->load(Yii::$app->request->post())) {
			if (!$client->save()) {
				echo 'Ошибка сохранения клиента';
			} else {
				$order->ID_client = $client->ID_client;
				$order->ID_goods = $id;
				$order->status_order = 0;
				if ($order->save()) {
					return $this->redirect(['sale/index']);
				} else {
					echo 'Ошибка сохранения заказа';
					echo 'GoodsID: '.$order->ID_goods;
					echo '<br>ClientID: '.$order->ID_client;
					echo '<br>Quantity: '.$order->quantity_goods;
					echo '<br>Status: '.$order->status_order;
					echo '<br>Last Name: '.$client->last_name_client;
				}
			}
		} else {
			$order->ID_goods = $id;
			$product=Goods::findOne($id);
			if ($product == null){
				throw new \yii\web\NotFoundHttpException('Препарат не найден');
			}
			$clients=Client::find()
			->orderBy(['last_name_client' => SORT_ASC])
			->all ();
			return $this->render('order', ['product' => $product, 'clients' => $clients, 'order' => $order, 'client' => $client]);
		}
	}
}
