<?php

use yii\db\Migration;

/**
 * Handles the creation for table `template_table`.
 */
class m160508_215806_create_template_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('template_table', [
            'id' => $this->primaryKey(),
            'template_name' => $this->string()->notNull(),
            'template_title' => $this->string()->defaultValue('Не заданно'),
            'filename' => $this->string()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('template_table');
    }
}
