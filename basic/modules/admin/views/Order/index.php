<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\modules\admin\models\User;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\searchs\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заказы';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="background" style="min-height: 80em;"> <!-- orange back -->
  <div class="container cont" style="text-align:center;"> <!-- center -->
    <div class="content-down " style="border-radius: 25px"> <!-- white back -->
      <h1 class=" border-bottom pb-3"><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="container">
      <?= Html::a('Внести заказ', ['create'], ['class' => 'btn btn-success']) ?>
    </div>

    <div class="container">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
//            'user_id',
            [
              'attribute' => 'user_id',
              'filter' => User::find()->select(['email', 'id'])->indexBy('id')->column(),
              'value' => function($data){
                return $data->user->email;
              },
              'label' => "Пользователь"
            ],
            'name',
            'email:email',
            'phone',
            //'address',
            //'comment',
            //'cost',
            //'date_order',
            //'order_status',
            //'date_status',
            //'pickup',
            ['class' => 'yii\grid\ActionColumn', 'template' => '{view}'],
            ['class' => 'yii\grid\ActionColumn', 'template' => '{update}',],
        ],
    ]); ?>

      </div>
    </div>
  </div>
</section>
