<?php


namespace app\commands;

use Yii;
use yii\console\Controller;
use app\models\Delivery;
use yii\web\NotFoundHttpException;
use app\models\TemplateFile;
use yii\helpers\Url;  


class SendController extends Controller
{

    public function actionIndex(){    

        $messages = Delivery::find()->where(['status' => '0'])->limit(10)->all();
        foreach ($messages as $messag) { 
            try{
                Yii::$app->mail->compose('@upload_dir/'.TemplateFile::getFileByPath($messag->template->filename),['user'=>$messag->user])
                ->setFrom([Yii::$app->params['adminEmail'] => 'MyColibri'])
                ->setTo($messag->user->email)
                ->setSubject($messag->title)
                ->send();
                $messag->status = 1;
                $messag->save();

            }catch(\Swift_SwiftException $exception){
                echo $exception->getMessage()."\r\n";
                $messag->status = 2;
                $messag->save();
            }
            
        }
           
        //$this->renderFile('@webroot/'.TemplateFile::getFileByPath($message->template->filename));
    }

}
