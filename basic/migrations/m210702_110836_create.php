<?php

  use yii\db\Migration;

  /**
   * Class m210702_110836_create
   */
  class m210702_110836_create extends Migration
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
	  $this->createTable('{{%task_history}}', [
		  'id' => $this->primaryKey(),
		  'executor_id' => $this->integer()->notNull(),
		  'status_id' => $this->integer()->notNull(),
		  'change_status_date' => $this->date()
	  ]);

	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown()
	{
//	  echo "m210702_110836_create cannot be reverted.\n";
	  $this->dropTable('{{%task_history}}');
//	  return false;
	}

	/*
	// Use up()/down() to run migration code without a transaction.
	public function up()
	{

	}

	public function down()
	{
		echo "m210702_110836_create cannot be reverted.\n";

		return false;
	}
	*/
  }
