<?php

  namespace app\controllers;

  use app\models\Executor;
  use app\models\TaskHistory;
  use Yii;
  use app\models\Task;
  use app\models\search\TaskSearch;
  use yii\web\Controller;
  use yii\web\NotFoundHttpException;
  use yii\filters\VerbFilter;
  use yii\helpers\ArrayHelper;

  /**
   * TaskController implements the CRUD actions for Task model.
   */
  class TaskController extends Controller
  {
	/**
	 * {@inheritdoc}
	 */
	public function behaviors()
	{
	  return [
		  'verbs' => [
			  'class' => VerbFilter::className(),
			  'actions' => [
				  'delete' => ['POST'],
			  ],
		  ],
	  ];
	}

	/**
	 * Lists all Task models.
	 * @return mixed
	 */
	public function actionIndex()
	{
	  $searchModel = new TaskSearch();
	  $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

	  return $this->render('index', [
		  'searchModel' => $searchModel,
		  'dataProvider' => $dataProvider,
	  ]);
	}

	/**
	 * Displays a single Task model.
	 * @param integer $id
	 * @return mixed
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	public function actionView($id)
	{
	  return $this->render('view', [
		  'model' => $this->findModel($id),
	  ]);
	}

	/**
	 * Creates a new Task model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
	  $model = new Task();
	  $executors = Executor::find()->all();

	  if ($model->load(Yii::$app->request->post()) && $model->save()) {
		$checkStatus = $this->updateHistory($model->status_id, $model->executor_id);

		if ($checkStatus){
		  $modelHistory = new TaskHistory();
		  $modelHistory->status_id = $model->status_id;
		  $modelHistory->executor_id = $model->executor_id;
		  $modelHistory->change_status_date = date('Y-m-d');

		  if($modelHistory->validate())
		  {
			$modelHistory->save();
		  }
		}
		return $this->redirect(['view', 'id' => $model->id]);
	  }

	  return $this->render('create', [
		  'model' => $model,
		  'executors' => $executors
	  ]);
	}

	/**
	 * Updates an existing Task model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id
	 * @return mixed
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	public function actionUpdate($id)
	{
	  $model = $this->findModel($id);
	  $executors = Executor::find()->all();

	  if ($model->load(Yii::$app->request->post()) && $model->save()) {


	    $checkStatus = $this->updateHistory($model->status_id, $model->executor_id);

	    if ($checkStatus){
	      $modelHistory = new TaskHistory();
	      $modelHistory->status_id = $model->status_id;
	      $modelHistory->executor_id = $model->executor_id;
	      $modelHistory->change_status_date = date('Y-m-d');

	      if($modelHistory->validate())
	      {
	      $modelHistory->save();
		  }
		}
		return $this->redirect(['view', 'id' => $model->id]);
	  }

	  return $this->render('update', [
		  'model' => $model,
		  'executors' => $executors
	  ]);
	}

	/**
	 * Deletes an existing Task model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id
	 * @return mixed
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	public function actionDelete($id)
	{
	  $this->findModel($id)->delete();

	  return $this->redirect(['index']);
	}

	/**
	 * Finds the Task model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return Task the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
	  if (($model = Task::findOne($id)) !== null) {
		return $model;
	  }

	  throw new NotFoundHttpException('The requested page does not exist.');
	}

	protected function updateHistory($statusId, $executorId)
	{
	  $historyModel = TaskHistory::find()->select(['status_id', 'executor_id'])->where(['status_id' => $statusId, 'executor_id' => $executorId])->all();
//	  if change status
	  return (empty($historyModel)) ? true : false;
	}

  }
