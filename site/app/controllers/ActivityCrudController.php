<?php

namespace app\controllers;

use app\base\BaseController;
use Yii;
use app\models\activity;
use app\models\ActivitySearchCrud;
use yii\filters\PageCache;
use yii\web\Controller;
use yii\web\HttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ActivityCrudController implements the CRUD actions for activity model.
 */
class ActivityCrudController extends BaseController
{
    /**
     * {@inheritdoc}
     */
    /*public function beforeAction($action)
    {
        $this->view->params['lastPage'] = \Yii::$app->session->get('lastPage');
        return parent::beforeAction($action); // TODO: Change the autogenerated stub
    }
    public function afterAction($action, $result)
    {
        \Yii::$app->session->set('lastPage',\Yii::$app->request->url);
        return parent::afterAction($action, $result); // TODO: Change the autogenerated stub
    }*/

    public function beforeAction($action)
    {
        if(!Yii::$app->rbac->adminRbac()){
            throw new HttpException('401','Доступ только администратору');
        }
        return parent::beforeAction($action); // TODO: Change the autogenerated stub
    }

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            ['class'=>PageCache::class,'only' => ['index'],'duration' => 10]
        ];
    }

    /**
     * Lists all activity models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ActivitySearchCrud();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single activity model.
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
     * Creates a new activity model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new activity();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing activity model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing activity model.
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
     * Finds the activity model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return activity the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = activity::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
