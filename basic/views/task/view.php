<?php

  use yii\helpers\Html;
  use yii\widgets\DetailView;
  use yii\helpers\ArrayHelper;

  /* @var $this yii\web\View */
  /* @var $model app\models\Task */

  $this->title = $model->task_name;
  $this->params['breadcrumbs'][] = ['label' => 'Tasks', 'url' => ['index']];
  $this->params['breadcrumbs'][] = $this->title;
  \yii\web\YiiAsset::register($this);

?>
<div class="task-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
	  <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
	  <?= Html::a('Delete', ['delete', 'id' => $model->id], [
		  'class' => 'btn btn-danger',
		  'data' => [
			  'confirm' => 'Are you sure you want to delete this item?',
			  'method' => 'post',
		  ],
	  ]) ?>
    </p>

  <?= DetailView::widget([
	  'model' => $model,
	  'attributes' => [
		  'id',
		  'task_name',
		  'dead_line',
		  [
			  'label' => 'Executor',
			  'value' => $model->taskExecutor->name,
		  ]
		,
		  'description',
		  'status_id',
	  ],
  ]) ?>

</div>
