<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Purchases */

$this->title = 'Update Purchases: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Purchases', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'ingredients_has_provider_ingredients_id' => $model->ingredients_has_provider_ingredients_id, 'ingredients_has_provider_provider_id' => $model->ingredients_has_provider_provider_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="purchases-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>