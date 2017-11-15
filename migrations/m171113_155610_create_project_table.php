<?php

use yii\db\Migration;

/**
 * Handles the creation of table `project`.
 */
class m171113_155610_create_project_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('project', [
            'id' => $this->primaryKey(),
            'project_id' => $this->string()->notNull(),
            'name' => $this->string()->notNull(),
            'field' => $this->integer()->notNull(),
            'type' => $this->integer()->notNull(),
            'description' => $this->string()->notNull(),
            'description' => $this->string()->notNull(),
            'status' => $this->integer()->notNull(),
            'country' => $this->string()->notNull(),
            'phone' => $this->integer()->notNull(),
            'needs' => $this->string()->notNull(),
            'cost' => $this->integer()->notNull(),
            'reasons' => $this->string()->notNull(),
            'advertise' => $this->integer()->defaultValue(0),
            'views' => $this->integer()->defaultValue(0),
            'image' => $this->string(),
            'created_at' => $this->dateTime(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('project');
    }
}
