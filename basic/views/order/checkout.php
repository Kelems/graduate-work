<?php
/*
 * Страница оформления заказа, файл views/order/checkout.php
 */

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use ruskid\stripe\StripeCheckout;
?>

<section>
  <div class="container" style="padding: 4em 0px 3em 0em">
    <div class="row">
      <div class="col-sm-2"></div>
      <div class="col-sm-8">
        <h1 style="text-align: center">Оформление заказа</h1>
        <div id="checkout">
          <?php $form = ActiveForm::begin(['id' => 'checkout-form', 'class' => 'form-horizontal']);?>
          <?= $form->field($order, 'name')->textInput(); ?>
          <?= $form->field($order, 'phone')->textInput(); ?>
          <?= $form->field($order, 'pickup')->radioList(['0' => 'Самовывоз','1' => 'Доставка']); ?>
          <?= $form->field($order, 'address')->textarea(['rows' => 2]); ?>
          <?= $form->field($order, 'comment')->textarea(['rows' => 1]); ?>
          <?= Html::submitButton('Завершить заказ', ['class' => 'btn btn-primary col-12', 'style' => "text-align: center"]); ?>
          <?php ActiveForm::end(); ?>
        </div>
      </div>
    </div>
  </div>

</section>
