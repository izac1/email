<?php

use yii\db\Migration;

/**
 * Handles the creation for table `delivery_table`.
 */
class m160522_144812_create_delivery_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('delivery_table', [
            'id' => $this->primaryKey(),
            'user_id'=> $this->integer()->notNull(),
            'template_id'=>$this->integer()->notNull(),
            'status'=>$this->integer()->notNull(),
            'delivery_name'=>$this->string()->notNull(),
            'title'=>$this->string()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('delivery_table');
    }
}
