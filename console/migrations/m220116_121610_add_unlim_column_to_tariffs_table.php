<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%tariffs}}`.
 */
class m220116_121610_add_unlim_column_to_tariffs_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%tariffs}}', 'unlim', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%tariffs}}', 'unlim');
    }
}
