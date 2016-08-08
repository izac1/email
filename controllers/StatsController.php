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
use app\models\DeliverySearch; 


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
        $searchModel = new DeliverySearch();
        $dataProvider = $searchModel->search_delev(Yii::$app->request->queryParams);

        return $this->render('index', [
             'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionSucess($id){
    	//$model = new Delivery();
    	//$model = $model->find()->where(["id"=> $id])->one();
        $searchModel = new DeliverySearch();

    	$dataProvider = $searchModel->search_delev_by_status(Yii::$app->request->queryParams,$id,1); 

        //new ActiveDataProvider([
    		//'query' => Delivery::find()->where(["delivery_name"=> $model->delivery_name,"status"=>"1"]),
    		//]);
    	
    	return $this->render('statistic',[
    			'dataProvider' => 	$dataProvider,
                'searchModel'=> $searchModel
    		]);
    }

    public function actionError($id){
    	//$model = new Delivery();
    	//$model = $model->find()->where(["id"=> $id])->one();

    	/*$dataProvider = new ActiveDataProvider([
    		'query' => Delivery::find()->where(["delivery_name"=> $model->delivery_name,"status"=>"2"]),
    		]);*/

        $searchModel = new DeliverySearch();

        $dataProvider = $searchModel->search_delev_by_status(Yii::$app->request->queryParams,$id,2); 
    	
    	return $this->render('statistic',[
    			'dataProvider' => 	$dataProvider,
                'searchModel'=> $searchModel
    		]);


    }

}
