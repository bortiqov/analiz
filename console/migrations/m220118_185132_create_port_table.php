<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%port}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%branch}}`
 */
class m220118_185132_create_port_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%port}}', [
            'id' => $this->primaryKey(),
            'adsl_busy' => $this->integer(),
            'adsl_free' => $this->integer(),
            'vdsl_busy' => $this->integer(),
            'vdsl_free' => $this->integer(),
            'vdsl_cipher' => $this->integer(),
            'fttb_busy_cor_seg' => $this->integer(),
            'fttb_free_cor_seg' => $this->integer(),
            'fttb_busy_mas_seg' => $this->integer(),
            'fttb_free_mas_seg' => $this->integer(),
            'gpon_every_olt' => $this->integer(),
            'gpon_every_busy' => $this->integer(),
            'gpon_free_sip_size' => $this->integer(),
            'branch_id' => $this->integer(),
            'date' => $this->integer(),
        ]);

        // creates index for column `branch_id`
        $this->createIndex(
            '{{%idx-port-branch_id}}',
            '{{%port}}',
            'branch_id'
        );

        // add foreign key for table `{{%branch}}`
        $this->addForeignKey(
            '{{%fk-port-branch_id}}',
            '{{%port}}',
            'branch_id',
            '{{%branch}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%branch}}`
        $this->dropForeignKey(
            '{{%fk-port-branch_id}}',
            '{{%port}}'
        );

        // drops index for column `branch_id`
        $this->dropIndex(
            '{{%idx-port-branch_id}}',
            '{{%port}}'
        );

        $this->dropTable('{{%port}}');
    }
}
