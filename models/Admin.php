<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

class Admin extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface 
{
  /*  public $id;
    public $username;
    public $password;
    public $authKey;
    public $accessToken;
*/

    public static function tableName()
    {
        return 'admin_table';
    }

   public function behaviors()
    {
        return [
            TimestampBehavior::className()
        ];
    }

    public static function findByLogin($login)
    {
        return static::findOne([
            'login' => $login
        ]);
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }

     public function getId()
    {
        return $this->id;
    }

    public static function findIdentity($id)
    {
        return static::findOne([
            'id' => $id
        ]);
    }

    public static function findIdentityByAccessToken($token, $type = NULL)
    {
        return false;
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }
    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }
    
}
