<?php
/** @var yii\web\View $this */
/** @var string $content */
use app\assets\AppAsset;
use yii\helpers\Url;
//use app\widgets\Alert;
//use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\bootstrap4\Modal;
use yii\bootstrap4\BootstrapWidgetTrait;

use yii\modules\admin;
use yii\widgets\Menu;

AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
	<meta charset="<?= Yii::$app->charset ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--
	<meta name="description" content="Real estate HTML Template">
	<meta name="keywords" content="real estate, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	-->
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- Favicon / Logo -->
	<link href="img/bread.png" rel="shortcut icon"/>
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<?php $this->registerCsrfMetaTags() ?>

	<title><?= Html::encode($this->title) ?></title>
	<?php $this->head() ?>
</head>

<body>
<?php $this->beginBody() ?>

<!-- page header -->
<header>
<?php
// Label contents
	NavBar::begin([ // отрываем виджет
		'options' => [
			'class' => 'navbar navbar-fixed', // site header style.
			'role' => 'navigation',
		],
		'renderInnerContainer' => false,
		'innerContainerOptions' => ['class' => 'container'],
		'brandLabel' => 'Хлебная Душа',	//Yii::$app->homeUrl, // название организации
		'brandUrl' => Yii::$app->homeUrl,//['basic/web/index.php'], // link
	]);
	echo Nav::widget([
		/*
		'options' => ['class' => 'navbar-nav navbar-right'],
		'options' => ['class' => 'skyblue mepanel'], // стили ul
		'options' => ['class' => 'nav-custom'], // стили ul
		*/
		'options' => ['class' => 'navbar-right'],
		'items' => [
			['label' => 'КОНТАКТЫ', 'url' => Yii::$app->urlManager->createAbsoluteUrl('basic/web/index.php/site/contact')],
			['label' => 'ПРОДУКЦИЯ', 'items' => [
				['label' => 'ХЛЕБА', 'url' => Yii::$app->urlManager->createAbsoluteUrl('basic/web/index.php/site/category?id=1')],
				['label' => 'БАГЕТЫ', 'url' => Yii::$app->urlManager->createAbsoluteUrl('basic/web/index.php/site/category?id=3')],
				['label' => 'ПИРОГИ', 'url' => Yii::$app->urlManager->createAbsoluteUrl('basic/web/index.php/site/category?id=2')],
				['label' => 'ДЕСЕРТЫ', 'url' => Yii::$app->urlManager->createAbsoluteUrl('basic/web/index.php/site/category?id=4')],
      ],],

			// Если пользователь гость, показыаем ссылку "Вход", если он авторизовался "Выход"
//				Yii::$app->user->isGuest ?
				['label' => 'РЕГИСТРАЦИЯ', 'url' => Yii::$app->urlManager->createAbsoluteUrl('basic/web/index.php/site/registration'), 'visible' => Yii::$app->user->isGuest ],
				['label' => 'ВОЙТИ', 'url' => Yii::$app->urlManager->createAbsoluteUrl('basic/web/index.php/site/login'), 'visible' => Yii::$app->user->isGuest ] ,
				['label' => 'КАБИНЕТ (' . Yii::$app->user->identity->email . ')', 'url' => ['basic/web/index.php/site/profile', 'id' => $user['id']], 'visible' => !Yii::$app->user->isGuest],
				['label' => 'ВЫЙТИ', 'url' => Yii::$app->urlManager->createAbsoluteUrl('basic/web/index.php/site/logout'), 'visible' => !Yii::$app->user->isGuest],
			['label' => Html::img('@web/img/cart.png'),'url' => Yii::$app->urlManager->createAbsoluteUrl('/basket/index'), 'encode' => false], //оформить в виде кнопки с иконкой
			['label' => Html::img('@web/img/tick1.png'), 'url' => Yii::$app->urlManager->createAbsoluteUrl('basic/web/index.php/site/tables') , 'encode' => false], //оформить в виде кнопки с иконкой
		],
		'encodeLabels' =>false,
	]);
	NavBar::end();
?>
</header>

	<!-- content Section -->
<section>

		<?= $content ?>

</section>

	<!-- Footer Section -->
  <footer class="footer w3layouts">
		<div class="container">
			<div class="footer-top-at w3">

				<div class="col-md-3 amet-sed w3l">  <!-- Первая колонка подвала-->
					<h4>Адрес</h4>
					<ul class="nav-bottom">
						<li>ДГТУ</li>
						<li>+7 (800) 100-19-30</li>
						<li>Сайт: www.donstu.ru</li>
						<li>площадь Гагарина, 1</li>
					</ul>
				</div>
				<div class="col-md-3 amet-sed w3ls"> <!-- вторая колонка подвала-->
					<h4>НАТУРАЛЬНЫЙ ВКУСНЫЙ ХЛЕБ</h4>
					<h4>Честность</h4>
					<h4>ручная работа</h4>
					<ul class="nav-bottom">	</ul>
				</div>
				<div class="social"> <!-- соц.сети -->
					<ul>
						<?php if(!Yii::$app->user->isGuest) : ?>
							<li><a href="<?= Url::to(['site/logout']) ?>"><i> Выйти </i></a></li>
						<?php endif ?>

						<li><a href="#"><i class="facebok"> </i></a></li>
						<li><a href="#"><i class="twiter"> </i></a></li>
						<li><a href="#"><i class="inst"> </i></a></li>
						<li><a href="#"><i class="goog"> </i></a></li>
							<div class="clearfix"></div>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
  </footer>
  <!-- Footer Section end -->

	<?php
		$footer =
		<<<FOOTER
		<button type="button" class="btn btn-default" data-dismiss="modal">
			Продолжить покупки
		</button>
		<button type="button" class="btn btn-warning">
			Оформить заказ
		</button>
		FOOTER;
		Modal::begin([
			'title' => '<h2>Корзина</h2>',
			'id' => 'basket-modal',
			'size'=>'modal-lg',
			'footer' => $footer
		]);
		Modal::end();
		unset($footer);
	?>

	<?php $this->endBody() ?>
	</body>
</html>
<?php $this->endPage() ?>