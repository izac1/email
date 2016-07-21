<?php

use yii\db\Migration;

/**
 * Handles the creation for table `admin_table`.
 */
class m160603_152243_create_admin_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('admin_table', [
            'id' => $this->primaryKey(),
            'login' => $this->string()->notNull(),
            'password'=>$this->string()->notNull(),
            'auth_key'=>$this->string()->notNull(),
        ]);

        $this->insert('admin_table',array(
            'login'=>'admin',
            'password' => Yii::$app->security->generatePasswordHash("qazxsw"),
            'auth_key' => '4A4eSoS3ngHn8qGoTMeR33sjcw4jiCCd',
        ));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('admin_table');
    }
}
