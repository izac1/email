<?php

use yii\db\Migration;

/**
 * Handles the creation for table `categoris_table`.
 */
class m160511_215500_create_categoris_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('categoris_table', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('categoris_table');
    }
}
