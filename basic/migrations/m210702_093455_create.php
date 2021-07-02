<?php

use yii\db\Migration;

/**
 * Class m210702_093455_create
 */
class m210702_093455_create extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
	  $tableOptions = null;
	  if ($this->db->driverName === 'mysql') {
		$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
	  }
	  $this->createTable('{{%task_status}}', [
		  'id' => $this->primaryKey(),
		  'status_name' => $this->string()->notNull(),
	  ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
//        echo "m210702_093455_create cannot be reverted.\n";
	  $this->dropTable('{{%executor}}');
//        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210702_093455_create cannot be reverted.\n";

        return false;
    }
    */
}
