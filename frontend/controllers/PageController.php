<?php

namespace frontend\controllers;

use Yii;
use common\models\Page;
use yii\helpers\Url;

class PageController extends \yii\web\Controller
{
    public function actionIndex($id=0)
    {
        if((int)$id>0)
		{	
			$data = Page::find()->where(['id'=>(int) $id])->andwhere(['status'=>1])->one();
			if(!$data){$this->redirect(Url::to(['site/error']));}
			return $this->render('index',['data'=>$data]);
		}
		else
		{
			$this->redirect(Url::to(['site/error']));
		}
    }

}
