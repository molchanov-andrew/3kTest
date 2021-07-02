<?php

namespace app\controllers;

use app\models\Executor;
use yii\data\ActiveDataProvider;


class ExecutorController extends \yii\web\Controller
{
  /**
   * 02.07.2021
   * create Executers list
   * If creation is successful, the browser will be redirected to the 'index' page.
   * @return mixed
   */
    public function actionIndex()
    {
	  $model = Executor::find()->asArray()->all();

	  return $this->render('index', [
        	'model' => $model
		]);
    }

}
