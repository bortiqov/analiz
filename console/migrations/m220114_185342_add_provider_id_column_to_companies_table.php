<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%companies}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%companies}}`
 */
class m220114_185342_add_provider_id_column_to_companies_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%tariffs}}', 'provider_id', $this->integer());

        // creates index for column `provoider_id`
        $this->createIndex(
            '{{%idx-companies-provider_id}}',
            '{{%tariffs}}',
            'provider_id'
        );

        // add foreign key for table `{{%companies}}`
        $this->addForeignKey(
            '{{%fk-companies-provider_id}}',
            '{{%tariffs}}',
            'provider_id',
            '{{%companies}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%companies}}`
        $this->dropForeignKey(
            '{{%fk-companies-provider_id}}',
            '{{%tariffs}}'
        );

        // drops index for column `provoider_id`
        $this->dropIndex(
            '{{%idx-companies-provider_id}}',
            '{{%tariffs}}'
        );

        $this->dropColumn('{{%tariffs}}', 'provider_id');
    }
}
