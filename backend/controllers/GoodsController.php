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
use app\models\Goods;

/**
 * Site controller
 */
class GoodsController extends Controller
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
		$goods=Goods::find()
		->orderBy(['name_goods' => SORT_ASC])
		->all ();
		return $this->render('index', ['goods' => $goods]);
	}
	

	public function actionEdit($ID_goods) {
		$goods=Goods::findOne($ID_goods);
		if (!$goods) {
			return 'Препарат не найден';
		}
	
		if (isset($_POST['Goods'])) {
			$goods->attributes=$_POST['Goods'];
			if ($goods->save()) {
				return $this->redirect(['goods/index']);
			}
		}
		return $this->render('add', ['goods'=>$goods]);
	}
	
	public function actionDelete($ID_goods){
		$goods=Goods::findOne($ID_goods);
		if (!$goods) {
			return 'Препарат не найден';
		}
		$goods->delete();
		return $this->redirect(['goods/index']);
	}
	
	public function actionAdd() {
		$goods=new Goods;
		
		if (isset($_POST['Goods'])){
			$goods->attributes=$_POST['Goods'];
			if ($goods->save()) {
				return $this->redirect(['goods/index']);
			}
			
		}
		return $this->render('add', ['goods'=>$goods]);
		
	}
}