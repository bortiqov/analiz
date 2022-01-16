<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tariffs}}`.
 */
class m220112_162958_create_tariffs_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tariffs}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'reg_pay' => $this->integer(),
            'ab_pay' => $this->integer(),
            'speed' => $this->integer(),
            'traffic' => $this->string(),
            'un_traffic' => $this->string(),
            'shart' => $this->string(),
            'bonus' => $this->string(),
            'status' => $this->integer(),
            'created_at' => $this->string(),
            'updated_at' => $this->string(),
            'deleted_at' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tariffs}}');
    }
}
