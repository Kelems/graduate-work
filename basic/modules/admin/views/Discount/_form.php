<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Discount */
/* @var $form yii\widgets\ActiveForm */
?>

<section class="background" style="min-height: 80em;"> <!-- orange back -->
        <div class="container cont" style="text-align:center; width: 25%; margin-left: auto; margin-right: auto;"> <!-- center -->
    <div class="content-down " style="border-radius: 25px"> <!-- white back -->
      <h1 class=" border-bottom pb-3"><?= Html::encode($this->title) ?></h1>

            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'percent')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'required_value')->textInput() ?>

            <div class="form-group">
                <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
            </div>
            <?php ActiveForm::end(); ?>
            
        </div>
    </div>
</section>
