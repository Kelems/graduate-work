<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Comment */

$this->title = $model->product_id;
$this->params['breadcrumbs'][] = ['label' => 'Comments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<section class="background"> <!-- orange back -->
    <div class="container cont" style="text-align:center;"> <!-- center -->
        <div class="content-down container" style="border-radius: 25px"> <!-- white back -->
            <p>
                <?= Html::a('Удалить', ['delete', 'product_id' => $model->product_id, 'user_id' => $model->user_id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </p>

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'product_id',
                    'user_id',
                    'message',
                    'date_message',
                ],
            ]) ?>

        </div>
    </div>
</section>