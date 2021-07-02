<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%task_history}}".
 *
 * @property int $id
 * @property int $executor_id
 * @property int $status_id
 * @property string|null $change_status_date
 */
class TaskHistory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%task_history}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['executor_id', 'status_id'], 'required'],
            [['executor_id', 'status_id'], 'integer'],
            [['change_status_date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'executor_id' => 'Executor ID',
            'status_id' => 'Status ID',
            'change_status_date' => 'Change Status Date',
        ];
    }
}
