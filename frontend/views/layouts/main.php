<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use common\models\Lang;
use frontend\widgets\WLang;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<?php 
$menus = new \frontend\components\GetMenuRecurs();
$menu = $menus->getMenu();
$lng =(isset(Lang::getCurrent()->id) && Lang::getCurrent()->id)?Lang::getCurrent()->id:1;
//1-ru,2-ua,3-en 

//echo \Yii::$app->setting->getSettings()[$lng]['store_name']; - store name
	
	
?>
<?php 
/*
echo '<pre>';
print_r(\Yii::$app->setting->getSettings());
echo '</pre>'; 
die;
*/
?>

<!-- header -->
	<div class="header">
			<div class="header-grid">
					<div class="container">
				<div class="header-left animated wow fadeInLeft" data-wow-delay=".5s">
					<ul>
					<li><i class="glyphicon glyphicon-headphones"></i><a href="/">24x7 live support</a></li>
						<li><i class="glyphicon glyphicon-envelope" ></i><a href="mailto:<?php echo (isset(\Yii::$app->setting->getSettings()[$lng]))? Html::encode(\Yii::$app->setting->getSettings()[$lng]['store_email']):'info@example.com';?>"><?php echo (isset(\Yii::$app->setting->getSettings()[$lng]))? Html::encode(\Yii::$app->setting->getSettings()[$lng]['store_email']):'@example.com';?></a></li>
						<li><i class="glyphicon glyphicon-earphone" ></i><?php echo (isset(\Yii::$app->setting->getSettings()[$lng]))? Html::encode(\Yii::$app->setting->getSettings()[$lng]['store_phone']):'+1234 567 892';?></li>
						
					</ul>
				</div>
				<div class="header-right animated wow fadeInRight" data-wow-delay=".5s">
				<div class="header-right1 ">
					<ul>
						<?php if (Yii::$app->user->isGuest) :?>
							<li><i class="glyphicon glyphicon-log-in" ></i><a href="<?php echo Url::to(['/site/login']); ?>">Login</a></li>
							<li><i class="glyphicon glyphicon-book" ></i><a href="<?php echo Url::to(['/site/signup']); ?>">Register</a></li>
						<?php else:?>
							<?php echo '<li>' . Html::beginForm(['/site/logout'], 'post'). Html::submitButton('Logout (' . Yii::$app->user->identity->username . ')',['class' => 'btn btn-link logout']). Html::endForm(). '</li>';?>
						<?php endif;?>
					</ul>
				</div>
				<div class="header-right1 ">
					<?= WLang::widget();?>
				</div>
				<?php if(false):?>
					<?= WCart::widget();?>
				<?php endif;?>	
				<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>
			</div>
			</div>
			<div class="container">
			<div class="logo-nav">
				
					<nav class="navbar navbar-default">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header nav_2">
						<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						 <div class="navbar-brand logo-nav-left ">
							<h1 class="animated wow pulse" data-wow-delay=".5s"><a href="<?php echo Url::to(['/site/index']);?>"><?php echo (isset(\Yii::$app->setting->getSettings()[$lng]))? Html::encode(\Yii::$app->setting->getSettings()[$lng]['store_name']):'Classic<span>Style</span>';?></a></h1>
						</div>

					</div> 
					<?php if($menu):?>
						<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
							<ul class="nav navbar-nav">
								<?php foreach ($menu as $item) :?>
									
								<?php if (count($item->childs)):?>
 
								<?php foreach ($item->childs as $child) :?>
								<?php if ($child->language_id==$lng):?>
								<li class="dropdown">
									
									<a href="<?php echo($child->route_url)? Url::to([$child->route_url]): null; ?>" class="<?php if (count($child->childs)):?>dropdown-toggle<?php endif;?>" <?php if (count($child->childs)):?>data-toggle="dropdown"<?php endif;?>><?php echo $child->name;?> <?php if (count($child->childs)):?><b class="caret"></b><?php endif;?></a>
									<?php if (count($child->childs)):?>
 
								
									<ul class="dropdown-menu multi">
										<div class="row">
											<?php foreach ($child->childs as $sec_child) :?>
											<?php if ($sec_child->language_id==$lng):?>
											<div class="col-sm-4">
												
												<ul class="multi-column-dropdown">
													<h6><?php echo $sec_child->name; ?></h6>
													<?php if (count($sec_child->childs)):?>
													<?php foreach ($sec_child->childs as $th_child) :?>
														<?php if ($th_child->language_id==$lng):?>
														<li><a href="<?php echo($th_child->route_url)? Url::to([$th_child->route_url]): null; ?>"><?php echo $th_child->name;?></a></li>
														<?php endif;?>
													<?php endforeach; ?>
													<?php endif;?>
												</ul>
												
											</div>
											<?php endif;?>	
											<?php endforeach; ?>
											<div class="clearfix"></div>
										</div>
									
									</ul>
									<?php endif;?>	
								</li>
								<?php endif;?>
								<?php endforeach; ?>
								<?php endif;?>
							<?php endforeach; ?>
							</ul>
						</div>
					<?php endif;?>
					
					</nav>
				</div>
				
		</div>
	</div>
<!-- //header -->
<?php //echo 'action='.$this->context->action->id.' contex='.$this->context->id;?>
<div class="<?php if(!(stripos($this->context->action->id, "index") === true) && !(stripos($this->context->id, "site") === true)):?>container<?php endif;?>">
<?= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],]) ?><?= Alert::widget() ?>
<?= $content ?>
</div>
<!-- footer -->
	<footer class="footer">
		<div class="container">
			<div class="footer-top">
			<div class="col-md-9 footer-top1">
			<h4>Duis aute irure dolor in reprehenderit in voluptate </h4>
			<p>Duis aute irure dolor in reprehenderit in voluptate velit esse.Excepteur sint occaecat cupidatat 
							non proident Duis aute irure dolor in reprehenderit in voluptate velit esse</p>
			</div>
			<div class="col-md-3 footer-top2">
			<a href="contact.html">Contact Us</a>
			</div>
			<div class="clearfix"> </div>
			</div>
			<div class="footer-grids">
				<div class="col-md-4 footer-grid animated wow fadeInLeft" data-wow-delay=".5s">
					<h3>About Us</h3>
					<p>Duis aute irure dolor in reprehenderit in voluptate velit esse.<span>Excepteur sint occaecat cupidatat 
						non proident, sunt in culpa qui officia deserunt mollit.</span></p>
				</div>
				<div class="col-md-4 footer-grid animated wow fadeInLeft" data-wow-delay=".6s">
					<h3>Contact Info</h3>
					<ul>
						<li><i class="glyphicon glyphicon-map-marker" ></i>1234k Avenue, 4th block, <span>New York City.</span></li>
						<li class="foot-mid"><i class="glyphicon glyphicon-envelope" ></i><a href="mailto:info@example.com">info@example.com</a></li>
						<li><i class="glyphicon glyphicon-earphone" ></i>+1234 567 567</li>
					</ul>
				</div>
				<div class="col-md-4 footer-grid animated wow fadeInLeft" data-wow-delay=".7s">
				<h3>Sign up for newsletter </h3>
				<form>
					<input type="text" placeholder="Email"  required="">
					<input type="submit" value="Submit">
				</form>
			
				</div>
			
				<div class="clearfix"> </div>
			</div>
			
			<div class="copy-right animated wow fadeInUp" data-wow-delay=".5s">
				<p>&copy 2016 Classic Style. All rights reserved | Design by <a href="http://w3layouts.com/">W3layouts</a></p>
			</div>
		</div>
	</footer>
<!-- //footer -->




<?php if(false):?><!-- standart design -->
			<div class="wrap">
				<?php
				NavBar::begin([
					'brandLabel' => 'My Company',
					'brandUrl' => Yii::$app->homeUrl,
					'options' => [
						'class' => 'navbar-inverse navbar-fixed-top',
					],
				]);
				$menuItems = [
					['label' => 'Home', 'url' => ['/site/index']],
					['label' => 'About', 'url' => ['/site/about']],
					['label' => 'Contact', 'url' => ['/site/contact']],
				];
				if (Yii::$app->user->isGuest) {
					$menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
					$menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
				} else {
					$menuItems[] = '<li>'
						. Html::beginForm(['/site/logout'], 'post')
						. Html::submitButton(
							'Logout (' . Yii::$app->user->identity->username . ')',
							['class' => 'btn btn-link logout']
						)
						. Html::endForm()
						. '</li>';
				}
				echo Nav::widget([
					'options' => ['class' => 'navbar-nav navbar-right'],
					'items' => $menuItems,
				]);
				NavBar::end();
				?>

				<div class="container">
					<?= Breadcrumbs::widget([
						'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
					]) ?>
					<?= Alert::widget() ?>
					<?= $content ?>
				</div>
			</div>

			<footer class="footer">
				<div class="container">
					<p class="pull-left">&copy; My Company <?= date('Y') ?></p>

					<p class="pull-right"><?= Yii::powered() ?></p>
				</div>
			</footer>
<?php endif;?>
<script>
 new WOW().init();
</script>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
