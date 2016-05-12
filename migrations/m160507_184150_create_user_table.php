<?php

use yii\db\Migration;

/**
 * Handles the creation for table `user_table`.
 */
class m160507_184150_create_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user_table', [
            'id' => $this->primaryKey(),
            'firstname' => $this->string()->notNull(),
            'lastname' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'category_id' => $this->integer()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('user_table');
    }
}
