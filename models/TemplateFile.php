<?php

namespace app\models;
use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class TemplateFile extends Model
{
    public $templateFile;
    public $dirname;
    public function rules()
    {
        return [
            [['templateFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'zip'],
        ];
    }
    
    public function upload()
    {
        if ($this->validate()) {
            $this->dirname = $this->templateFile->baseName . '_'.$this->generateRandomString();
            mkdir(Yii::getAlias('@upload_dir').'/'.$this->dirname);
            if(!$this->templateFile->saveAs(Yii::getAlias('@upload_dir').'/'. $this->dirname . '/' . $this->templateFile->baseName . '.' .$this->templateFile->extension)) $this->setError("Загрузкой файла");
            else
            return $this->unzip($this->templateFile->baseName); 
        } else {
            return false;
        }
    }

    public function save($file,$model){
        if($model->filename){
            if(is_dir(Yii::getAlias('@upload_dir').'/'.$model->filename)){
                if(!$this->deleteOld(Yii::getAlias('@upload_dir').'/'.$model->filename)) return $this->setError("Удаление старого файла");
            }
        }

        if($file->templateFile = UploadedFile::getInstance($file,'templateFile')){
            if($model->filename = $file->upload()){
                return true;
            }else return $this->setError("Загрузкой файла");
        }else return $this->setError("Загрузкой файла");
    }

    public function unzip($filename){
       $zip = new \ZipArchive();

       if($zip->open(Yii::getAlias('@upload_dir').'/'.$this->dirname.'/'.$this->templateFile->baseName.'.zip') === TRUE){
            if($zip->extractTo(Yii::getAlias('@upload_dir').'/'.$this->dirname.'/')){
             $zip->close();
             unlink(Yii::getAlias('@upload_dir').'/'.$this->dirname.'/'.$this->templateFile->baseName.'.zip');
             //$this->imgFolderRpl($this->getFileByPath($this->dirname));
             return $this->dirname;
        }else return $this->setError("Проблемы с разархивацией");

       } return $this->setError("Проблемы с открытием архива");
    }

    public function generateRandomString($length = 5) {
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
    }

    public function getFileByPath($dirname){
        foreach (glob(Yii::getAlias('@upload_dir').'/'.$dirname.'/*.php') as $filename) {
             return  $dirname.'/'.basename($filename);
        }
    }

    public function setError($message){
        $this->addError('templateFile',$message);
        return false;
    }

    public function imgFolderRpl($filename){
        $file = file_get_contents($filename);
        $file = str_replace('images/', Yii::$app->homeUrl.'uploads/'.$this->dirname.'/images/', $file);
        file_put_contents($filename, $file);
        return true;
    }

    public function attributeLabels()
    {
        return [
            'templateFile' => 'Файл шаблона',
        ];
    }

    public function deleteOld($path){
        $files = glob($path . '/*');
        foreach ($files as $file) {
            is_dir($file) ? removeDirectory($file) : unlink($file);
        }
        rmdir($path);
        return true;
    }
}