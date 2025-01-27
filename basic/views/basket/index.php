<?php
/*
 * Страница корзины покупателя, файл views/basket/index.php
 */

use yii\helpers\Html;
use yii\helpers\Url;
use alkurn\stripe\StripeCheckout;

?>

<!-- контент -->
<section class="background" style="padding-bottom: 1em;">
  <div class="container" style="padding-top:2%"> <!-- center white -->
    <div class="content-product row" style="border: 15px solid white; "> <!-- white part -->
      <div class="col-sm-12 row ">      

        <div class="col-sm-12" style="padding-bottom: 6%">
          <h1 class="text-center" style="padding: 0% 0px 2% 0px">Корзина</h1>
          <div id="basket-content" >
            <?php if (!empty($basket)): ?> <!-- проверка пустоты корзины -->

              <div class="table-responsive">
                <form action="<?= Url::to(['basket/update']); ?>" method="post">
                  <?=
                    Html::hiddenInput(
                      Yii::$app->request->csrfParam,
                      Yii::$app->request->csrfToken
                    );
                  ?>
                  
                  <!-- таблица названий -->
                  <table class="table table-bordered text-center" >
                    <!-- первая таблица именований -->
                    <tr>
                      <td >Изображение</td>
                      <td >Наименование</td>
                      <td >Количество, шт.</td>
                      <td >Цена, руб.</td>
                      <td >Сумма, руб.</td>
                      <td style="vertical-align: middle;">
                        <a href="<?= Url::to(['basket/clear']); ?>" class="text-danger">
                          Очистить корзину
                        </a>
                      </td>
                    </tr>

                    <!-- наши данные в корзине -->
                    <?php foreach ($basket['products'] as $id => $item): ?>
                      <tr>
                        <!-- Изображение -->
                        <td class="text-center table-center table-names">
                          <?=Html::img('@web/img/products/medium/'.$item['image'], ['width' => '128']);?>
                        </td>
                    
                        <!-- Наименование -->
                        <td style="vertical-align: middle;">
                          <a href="<?= Url::to(['/site/product', 'id' => $id]); ?>">
                          <?= Html::encode($item['name']); ?>
                          </a>
                        </td >
                    
                        <!-- количество, шт. -->
                        <td style="vertical-align: middle;">
                          <?=Html::input('text',
                            'count['.$id.']',
                            $item['count'],
                            ['style' => 'width: 50%; text-align: center;']
                          );?>
                        </td>
                    
                        <!-- цена за штуку -->
                        <td style="vertical-align: middle;">
                          <?= $item['price']; ?>
                        </td>

                        <!-- цена всего -->
                        <td style="vertical-align: middle;">
                          <?= $item['price'] * $item['count']; ?>    
                        </td>
                    
                        <!-- кнопка удаления -->
                        <td style="vertical-align: middle;">
                          <a href="<?= Url::to(['basket/remove', 'id' => $id]); ?>" class="text-danger">
                            <i class="fa fa-times" aria-hidden="true">Удалить</i>
                          </a>
                        </td>

                      </tr>
                    <?php endforeach; ?>

                    <!-- перерасчет и итоги -->
                    <tr >
                      <!-- перерасчет -->
                      <td style="vertical-align: middle;">
                        <button type="submit"
                          class="btn btn-primary">
                          <i class="fa fa-refresh" aria-hidden="true"></i>
                            обновить заказ
                        </button>
                      </td>

                      <!-- слово "итого" -->
                      <td class="text-center table-center table-names" colspan="2" style="vertical-align: middle;">Итого</td>
                      
                      <!-- итоговое значение всего-->
                      <td class="text-center table-center table-names" style="vertical-align: middle;">
                        <?= round($basket['amount'] / 81.28, 2) . " $"; ?>  
                      </td>

                      <!-- итоговое значение всего-->
                      <td class="text-center table-center table-names" style="vertical-align: middle;">
                        <?= $basket['amount'] . " рублей"; ?>  
                      </td>

                      <td style="vertical-align: middle;">

                        <?php if ($disc > 0): ?> <!-- проверка есть ли скидка -->
                        <?= Html::encode('Скидка: '. $disc * 100 .'%'); ?> <!-- демонстрация пользователю наличие скидки -->
                        <?php endif ?>
                      </td>
                    </tr>
                  </table>
                </form>
              </div>
          
              <?php else: ?>
                <h1 class="text-center" style="padding:3em 1em 3em 1em">Ваша корзина ещё пуста</h1>
              <?php endif; ?>
            </div>
            
            <div class = "table-center" style="padding:2.5% 0px 2.5% 0px">
              <?php if (!empty($basket)): ?>
                <?php if (!Yii::$app->user->isGuest): ?>
                  <?php $amount = $basket['amount'] / 81.28 * 100 ?>

                  <script async
                    src="https://js.stripe.com/v3/buy-button.js">
                  </script>

                  <stripe-buy-button
                    buy-button-id="buy_btn_1NH5DcJ2JMK5WDIYiUylK6Kk"
                    publishable-key="pk_test_51ND7zAJ2JMK5WDIYG09pdRXxhkm1vZvEbZVL1uZVsPj7JpIOk1x8PMfIStFiYCQX1g1Pd8dfRbKrNSGgXJO9YiLu008QRwtQGp">
                  </stripe-buy-button>

                <?php else:  ?>
                  <!-- -->
                  <button type="button" class="btn btn-warning col-12" style="padding: 10px" onclick=" window.myDialog.show();"> Оформить заказ </button>
                  
                  <dialog id="myDialog" style="border: 0px;">  
                    <p>Для оформления заказа вам нужно авторизоваться в системе!</p>    
                  </dialog>

                <?php endif; ?>
                <!-- -->    
              <?php endif; ?>
            </div>

          </div>

      </div>
    </div>
  </div>
</section>
