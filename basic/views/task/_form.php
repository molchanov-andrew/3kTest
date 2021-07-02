<?php

  use yii\helpers\Html;
  use yii\widgets\ActiveForm;
  use yii\helpers\ArrayHelper;
  use app\models\TaskStatus;

  /* @var $this yii\web\View */
  /* @var $model app\models\Task */
  /* @var $form yii\widgets\ActiveForm */

?>

<div class="task-form">

  <?php $form = ActiveForm::begin(); ?>

  <?= $form->field($model, 'task_name')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'dead_line')->textInput() ?>

  <?= $form->field($model, 'executor_id')->dropDownList(ArrayHelper::map($executors, 'id','name'),['prompt' => 'Выберите исполнителя...']) ?>

  <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'status_id')->textInput() ?>

    <div class="form-group">
	  <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

  <?php ActiveForm::end(); ?>

</div>
