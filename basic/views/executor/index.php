<?php
  /* @var $this yii\web\View */

  /* @var $model [] */

  use yii\helpers\Html;


  $this->title = 'Executors List';
  $this->params['breadcrumbs'][] = $this->title;
  \yii\web\YiiAsset::register($this);

?>

<div class="executor-view">

    <h1><?= Html::encode($this->title) ?></h1>

  <?php foreach ($model as $executor) : ?>
    <div>
	  <?= Html::tag('p', Html::encode($executor['name']), ['class' => 'executor']) ?>
    </div>
  <?php endforeach; ?>

</div>
