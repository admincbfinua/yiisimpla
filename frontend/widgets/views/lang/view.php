<?php use yii\helpers\Html; ?>
<ul>
	<li><?php //echo $current->name;?></li>
	<?php foreach ($langs as $lang):?><li><?php echo Html::a($lang->name, '/'.$lang->url. (new \frontend\components\LangRequest())->getLangUrl()); ?></li><?php endforeach;?>
</ul>

