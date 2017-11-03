<?php

namespace backend\controllers;

use Yii;
use common\models\Menu;
use common\models\Lang;
use backend\controllers\MenuSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MenuController implements the CRUD actions for Menu model.
 */
class MenuController extends Controller
{
    /**
     * @inheritdoc
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
			[
                'class' => '\common\components\behaviors\DelcacheBehavior',
                'cache_id' => ['MenuCache'],
                'actions' => ['create', 'update', 'delete'],
             ],
			\backend\behaviors\Amiadmin::className(),
			
        ];
    }

    /**
     * Lists all Menu models.
     * @return mixed
     */
    public function actionIndex()
    {
       if(!$this->checkIsMeAdmin()){echo 'Restricted zone. Only admin permissons. ';die;};
		$searchModel = new MenuSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
			
        ]);
    }

    /**
     * Displays a single Menu model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        if(!$this->checkIsMeAdmin()){echo 'Restricted zone. Only admin permissons. ';die;};
		return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Menu model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(!$this->checkIsMeAdmin()){echo 'Restricted zone. Only admin permissons. ';die;};
		$model = new Menu();
		$lang = Lang::find()->all();
		$parent = $model::find()->all();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
				'lang' =>$lang,
				'parent'=>$parent,
            ]);
        }
    }

    /**
     * Updates an existing Menu model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if(!$this->checkIsMeAdmin()){echo 'Restricted zone. Only admin permissons. ';die;};
		$model = $this->findModel($id);
		$lang = Lang::find()->all();
		$parent = $model::find()->all();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
				'lang' =>$lang,
				'parent'=>$parent,
            ]);
        }
    }

    /**
     * Deletes an existing Menu model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if(!$this->checkIsMeAdmin()){echo 'Restricted zone. Only admin permissons. ';die;};
		$this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Menu model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Menu the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if(!$this->checkIsMeAdmin()){echo 'Restricted zone. Only admin permissons. ';die;};
		if (($model = Menu::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
