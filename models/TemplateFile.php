<?php

namespace app\models;

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
            mkdir('uploads/'.$this->dirname);
            if(!$this->templateFile->saveAs('uploads/'. $this->dirname . '/' . $this->templateFile->baseName . '.' .$this->templateFile->extension)) $this->setError("Загрузкой файла");
            else
            return $this->unzip($this->templateFile->baseName); 
        } else {
            return false;
        }
    }

    public function save($file,$model){
        if($file->templateFile = UploadedFile::getInstance($file,'templateFile')){
            if($model->filename = $file->upload()){
                return true;
            }else return $this->setError("Загрузкой файла");
        }else return $this->setError("Загрузкой файла");
    }

    public function unzip($filename){
       $zip = new \ZipArchive();

       if($zip->open('uploads/'.$this->dirname.'/'.$this->templateFile->baseName.'.zip') === TRUE){
            if($zip->extractTo('uploads/'.$this->dirname.'/')){
             $zip->close();
             unlink('uploads/'.$this->dirname.'/'.$this->templateFile->baseName.'.zip');
             $this->imgFolderRpl($this->getFileByPath($this->dirname));
             return $this->dirname;
        }else return $this->setError("Проблемы с разархивацией");

       } return $this->setError("Проблемы с открытием архива");
    }

    public function generateRandomString($length = 5) {
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
    }

    public function getFileByPath($dirname){
        //var_dump($dirname);
        foreach (glob('uploads/'.$dirname.'/*.php') as $filename) {
             return  $filename;
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
}