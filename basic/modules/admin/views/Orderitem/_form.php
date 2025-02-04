<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\admin\models\Product;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\OrderItem */
/* @var $form yii\widgets\ActiveForm */
?>

<section class="background" style="min-height: 80em;"> <!-- orange back -->
    <div class="container cont" style="text-align:center; width: 40%; margin-left: auto; margin-right: auto;"> <!-- center -->
        <div class="content-down " style="border-radius: 25px"> <!-- white back -->
            <h1 class=" border-bottom pb-3"><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'order_id')->textInput() ?>

    <?= $form->field($model, 'product_id')->textInput()->dropDownList(Product::find()->select(['name', 'id'])->indexBy('id')->column())->label("Продукт") ?>

    <?= $form->field($model, 'count')->textInput() ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cost')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

        </div>
    </div>
</section>
