<?php
use yii\helpers\Html;
use common\models\Lang;
$this->title = ($data)?Html::encode($data->title):'My Yii Application';
if($data)
{
	echo $data->content;
}
?>
	

