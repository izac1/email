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
            'colibri_id' => $this->integer()->notNull(),
            'first_name' => $this->string()->notNull(),
            'last_name' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'category_id' => $this->integer()->notNull(),
            'is_active' => $this->boolean()->notNull(),
            'is_demo' => $this->boolean()->notNull(),
            'is_subscribe' => $this->boolean()->notNull(),
            'is_online' => $this->boolean()->notNull(),
            'is_widget' => $this->boolean()->notNull(),
            'version' => $this->string()->notNull(),

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