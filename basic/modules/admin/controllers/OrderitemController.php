<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\OrderItem;
use app\modules\admin\searchs\OrderitemSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OrderitemController implements the CRUD actions for OrderItem model.
 */
class OrderitemController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all OrderItem models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new OrderitemSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single OrderItem model.
     * @param int $order_id Order ID
     * @param int $product_id Product ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($order_id, $product_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($order_id, $product_id),
        ]);
    }

    /**
     * Creates a new OrderItem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new OrderItem();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'order_id' => $model->order_id, 'product_id' => $model->product_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing OrderItem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $order_id Order ID
     * @param int $product_id Product ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($order_id, $product_id)
    {
        $model = $this->findModel($order_id, $product_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'order_id' => $model->order_id, 'product_id' => $model->product_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing OrderItem model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $order_id Order ID
     * @param int $product_id Product ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($order_id, $product_id)
    {
        $this->findModel($order_id, $product_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the OrderItem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $order_id Order ID
     * @param int $product_id Product ID
     * @return OrderItem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($order_id, $product_id)
    {
        if (($model = OrderItem::findOne(['order_id' => $order_id, 'product_id' => $product_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
