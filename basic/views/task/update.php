<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Task */
/* @var $executors app\models\Executor */

$this->title = 'Update Task: ' . $model->task_name;
$this->params['breadcrumbs'][] = ['label' => 'Tasks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->task_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="task-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'executors' => $executors
    ]) ?>

</div>
