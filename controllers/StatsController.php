<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use app\models\Delivery;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url; 


class StatsController extends Controller
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
            ],
        ];
    }

    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Delivery::find()->groupBy('delivery_name'),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionSucess($id){
    	$model = new Delivery();
    	$model = $model->find()->where(["id"=> $id])->one();

    	$dataProvider = new ActiveDataProvider([
    		'query' => Delivery::find()->where(["delivery_name"=> $model->delivery_name,"status"=>"1"]),
    		]);
    	
    	return $this->render('statistic',[
    			'dataProvider' => 	$dataProvider,
    			'model' => $model, 
    		]);
    }

    public function actionError($id){
    	$model = new Delivery();
    	$model = $model->find()->where(["id"=> $id])->one();

    	$dataProvider = new ActiveDataProvider([
    		'query' => Delivery::find()->where(["delivery_name"=> $model->delivery_name,"status"=>"2"]),
    		]);
    	
    	return $this->render('statistic',[
    			'dataProvider' => 	$dataProvider,
    			'model' => $model, 
    		]);


    }

}
