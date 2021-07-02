<?php

use yii\db\Migration;

/**
 * Class m210701_065815_create
 */
class m210701_065815_create extends Migration
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
	  $this->createTable('{{%executor}}', [
		  'id' => $this->primaryKey(),
		  'name' => $this->string()->notNull(),
	  ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
//        echo "m210701_065815_create cannot be reverted.\n";
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
        echo "m210701_065815_create cannot be reverted.\n";

        return false;
    }
    */
}
