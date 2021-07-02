<?php

  use yii\helpers\Html;
  use yii\grid\GridView;
  use yii\widgets\Pjax;
  use app\models\Executor;
  use app\models\TaskStatus;

  /* @var $this yii\web\View */
  /* @var $searchModel app\models\search\TaskSearch */
  /* @var $dataProvider yii\data\ActiveDataProvider */

  $this->title = 'Tasks';
  $this->params['breadcrumbs'][] = $this->title;

?>
<div class="task-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
	  <?= Html::a('Create Task', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

  <?php Pjax::begin(); ?>
  <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

  <?= GridView::widget([
	  'dataProvider' => $dataProvider,
	  'filterModel' => $searchModel,
	  'columns' => [
//		  ['class' => 'yii\grid\SerialColumn'],

		  'id',
		  'task_name',
		  'dead_line',
		  [
			  'label' => 'Task Executor',
			  'attribute' => 'executor_id',
			  'filter' => Executor::find()->select(['name', 'id'])->indexBy('id')->column(),
			  'value' => 'taskExecutor.name'
		  ],
		  'description',
		  [
			  'label' => 'Status',
			  'attribute' => 'status_id',
//			  'filter' => TaskStatus::find()->select(['status_name', 'id'])->indexBy('id')->column(),
			  'value' => 'taskStatus.status_name'
		  ],

		  ['class' => 'yii\grid\ActionColumn'],
	  ],
  ]); ?>

  <?php Pjax::end(); ?>

</div>
