<?php

  namespace app\models\search;

  use yii\base\Model;
  use yii\data\ActiveDataProvider;
  use app\models\Task;

  /**
   * TaskSearch represents the model behind the search form of `app\models\Task`.
   */
  class TaskSearch extends Task
  {

	/**
	 * {@inheritdoc}
	 */
	public function rules()
	{
	  return [
		  [['id', 'status_id'], 'integer'],
		  [['task_name', 'dead_line', 'executor_id', 'description'], 'safe'],
	  ];
	}

	/**
	 * {@inheritdoc}
	 */
	public function scenarios()
	{
	  // bypass scenarios() implementation in the parent class
	  return Model::scenarios();
	}

	/**
	 * Creates data provider instance with search query applied
	 *
	 * @param array $params
	 *
	 * @return ActiveDataProvider
	 */
	public function search($params)
	{
	  $query = Task::find()->joinWith('taskExecutor');

	  // add conditions that should always apply here

	  $dataProvider = new ActiveDataProvider([
		  'query' => $query,
		'sort' => [
			'defaultOrder' => ['id' => SORT_ASC],
		  'attributes' => [
		  	'id',
			'task_name',
			'dead_line',
			'status_id',
			'description',
			'executor_id' => [
				'asc' => ['{{%executor}}.name' => SORT_ASC],
				'desc' => ['{{%executor}}.name' => SORT_DESC],
			]
		  ]
		]
	  ]);

	  $this->load($params);

	  if (!$this->validate()) {
		// uncomment the following line if you do not want to return any records when validation fails
		// $query->where('0=1');
		return $dataProvider;
	  }

	  // grid filtering conditions
	  $query->andFilterWhere([
		  'id' => $this->id,
		  'dead_line' => $this->dead_line,
		  'status_id' => $this->status_id,
		  'executor_id' => $this->executor_id
	  ]);

	  $query->andFilterWhere(['like', 'task_name', $this->task_name])
		  ->andFilterWhere(['like', 'description', $this->description]);

	  return $dataProvider;
	}
  }
