<?php

use yii\db\Migration;

/**
 * Class m230417_074055_add_all_tables
 */
class m230417_074055_add_all_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
        CREATE TABLE `fruits` (
            `id` int(11) NOT NULL,
            `name` varchar(255) DEFAULT NULL,
            `ext_id` int(11) DEFAULT NULL,
            `family` varchar(255) DEFAULT NULL,
            `fruit_order` varchar(255) DEFAULT NULL,
            `genus` varchar(255) DEFAULT NULL,
            `nutritions` text,
            `is_favorite` int(4) DEFAULT '0',
            `created_at` int(14) DEFAULT NULL,
            `updated_at` int(14) DEFAULT NULL
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

          ALTER TABLE `fruits` ADD PRIMARY KEY (`id`);

          ALTER TABLE `fruits` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
        ");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230417_074055_add_all_tables cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230417_074055_add_all_tables cannot be reverted.\n";

        return false;
    }
    */
}
