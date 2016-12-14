<?php
namespace backend\controllers;

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
use app\models\Order;
use app\models\Client;
use app\models\Goods;

/**
 * Site controller
 */
class OrderController extends Controller
{ 
 	public function behaviors()
	    {
	        return [
	            'access' => [
	                'class' => AccessControl::className(),
	                'rules' => [
	                    [
	                        'allow' => true,
	                        'roles' => ['@'],
	                    ],
	                ],
	            ]
	        ];
	    }

	public function actionIndex ()
	{

		$orders=Order::find()

		->all ();
	
		return $this->render('index', ['orders' => $orders]);
	}
	

	public function actionEdit($ID_order) {
		$order=Order::findOne($ID_order);
		if ($order->load(Yii::$app->request->post())) {
			if ($order->save()) {
				return $this->redirect(['order/index']);
			}
		} else {
			if (!$order) {
				return 'Запись не найдена';
			}
			$goods=Goods::find()->all();
			$clients=Client::find()->all();
			return $this->render('edit', ['order'=>$order,'clients'=>$clients, 'goods'=>$goods]);
		}
	}
	
	public function actionDelete($ID_order){
		$order=Order::findOne($ID_order);
		if (!$order) {
			return 'Запись не найдена';
		}
		$order->delete();
		return $this->redirect(['order/index']);
	}
	
	public function actionAdd($client=null, $product=null) {
		$order=new Order;
		$order->ID_client=$client;
		$clients=Client::find()->all();
		if (isset($_POST['Order'])){
			$order->attributes=$_POST['Order'];
			if ($order->save()) {
				return $this->redirect(['order/index']);
			}
			
		}
		$goods=Goods::find()->having('status=1')->all();
		if (isset($_POST['Order'])){
			$order->attributes=$_POST['Order'];
			if ($order->save()) {
				return $this->redirect(['order/index']);
			}
			
		}
		return $this->render('add', ['order'=>$order,'clients'=>$clients, 'goods'=>$goods]);
		
	}

		public function actionArchive(){
		$orders=Order::find()
		
		->all ();
		return $this->render('archive', ['orders' => $orders]);
	}

	public function actionEditarchive($ID_order) {
		$order=Order::findOne($ID_order);
		if (!$order) {
			return 'Запись не найдена';
		}
		$goods=Goods::find()->having('status=1') ->all();
		$clients=Client::find()->all();
		if (isset($_POST['Order'])) {
			$order->attributes=$_POST['Order'];
			if ($order->save()) {
				return $this->redirect(['order/archive']);
			}
		}
		$goods=Goods::find()->all();
		if (isset($_POST['Order'])) {
			$order->attributes=$_POST['Order'];
			if ($order->save()) {
				return $this->redirect(['order/archive']);
			}
		}
		return $this->render('editarchive', ['order'=>$order,'clients'=>$clients, 'goods'=>$goods]);
	}
}