<?php

namespace biz\master\controllers;

use Yii;
use biz\master\models\GlobalConfig;
use biz\master\models\searchs\GlobalConfig as GlobalConfigSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ConfigController implements the CRUD actions for GlobalConfig model.
 */
class ConfigController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all GlobalConfig models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GlobalConfigSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single GlobalConfig model.
     * @param  string $group
     * @param  string $name
     * @return mixed
     */
    public function actionView($group, $name)
    {
        return $this->render('view', [
            'model' => $this->findModel($group, $name),
        ]);
    }

    /**
     * Creates a new GlobalConfig model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new GlobalConfig;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'group' => $model->group, 'name' => $model->name]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing GlobalConfig model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param  string $group
     * @param  string $name
     * @return mixed
     */
    public function actionUpdate($group, $name)
    {
        $model = $this->findModel($group, $name);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'group' => $model->group, 'name' => $model->name]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing GlobalConfig model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param  string $group
     * @param  string $name
     * @return mixed
     */
    public function actionDelete($group, $name)
    {
        $this->findModel($group, $name)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the GlobalConfig model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param  string                $group
     * @param  string                $name
     * @return GlobalConfig          the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($group, $name)
    {
        if (($model = GlobalConfig::findOne(['group' => $group, 'name' => $name])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
