<?php

  namespace app\models;

  use Yii;
  use app\models\Executor;
  use yii\db\ActiveQuery;

  /**
   * This is the model class for table "task".
   *
   * @property int $id
   * @property string $task_name
   * @property string $dead_line
   * @property string $executor
   * @property string $description
   * @property int $status_id
   */
  class Task extends \yii\db\ActiveRecord
  {
	/**
	 * {@inheritdoc}
	 */
	public static function tableName()
	{
	  return 'task';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules()
	{
	  return [
		  [['task_name', 'dead_line', 'executor_id', 'description'], 'required'],
		  [['dead_line'], 'date', 'format' => 'php:Y-m-d'],
		  [['status_id', 'executor_id'], 'integer'],
		  [['task_name', 'description'], 'string', 'max' => 255],
	  ];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels()
	{
	  return [
		  'id' => 'ID',
		  'task_name' => 'Task Name',
		  'dead_line' => 'Dead Line',
		  'executor_id' => 'Executor',
		  'description' => 'Description',
		  'status_id' => 'Status',
	  ];
	}

	/**
	 * @return ActiveQuery
	 */
	public function getTaskExecutor()
	{
	  return $this->hasOne(Executor::class, ['id' => 'executor_id']);
	}

	/**
	 * @return ActiveQuery
	 */
	public function getTaskStatus()
	{
	  return $this->hasOne(TaskStatus::class, ['id' => 'status_id']);
	}

  }
