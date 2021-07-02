<?php

  use yii\db\Migration;

  /**
   * Class m210630_145940_create
   */
  class m210630_145940_create extends Migration
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

	  $this->createTable('{{%task}}', [
		  'id' => $this->primaryKey(),
		  'task_name' => $this->string()->notNull(),
		  'dead_line' => $this->date()->notNull(),
		  'executor_id' => $this->integer()->notNull(),
		  'description' => $this->string()->notNull(),
		  'status_id' => $this->integer()->defaultValue(1),
	  ], $tableOptions);

	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown()
	{
//        echo "m210630_145940_create cannot be reverted.\n";
	  $this->dropTable('{{%task}}');
//        return false;
	}

	/*
	// Use up()/down() to run migration code without a transaction.
	public function up()
	{

	}

	public function down()
	{
		echo "m210630_145940_create cannot be reverted.\n";

		return false;
	}
	*/
  }
