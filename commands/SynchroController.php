<?php

namespace app\commands;

use Yii;
use yii\console\Controller;
use yii\web\Request;
use app\models\Users;

class SynchroController extends Controller
{
	public function actionIndex(){
		
		foreach ( $this->xml2array($this->getXml(Yii::$app->params['xml_url']))['user'] as $value) {
			$xml_user = $this->xml2array($value);
			$user = Users::find()->where(['colibri_id' => $xml_user['colibri_id']])->one();

			if(!$user)
				$user = new Users();

			$user->attributes = $xml_user;
			try{ 

				if($user && $xml_user['delete'] === true)
					$user->delete();
				else
					$user->save();

			}catch(\Exception $e){

				throw $e;
			}
			
		}
		echo "finish";

	}

	public function getXml($url){
	   $ch = curl_init($url);
	   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	   curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	   $content = curl_exec($ch);
	   curl_close($ch);
	   $xml = new \SimpleXMLElement($content);
	   return $xml;
	}

	public function xml2array ( $xmlObject, $out = array () ){
    foreach ( (array) $xmlObject as $index => $node ){
    	if($node == "-1") $node = "Не заданно";
    	if($node == "true") $node = true;
    	else
    	if($node == "false") $node = false;

        $out[$index] = ( is_object ( $node ) ) ? xml2array ( $node ) : $node;
    }
    return $out;
}

}