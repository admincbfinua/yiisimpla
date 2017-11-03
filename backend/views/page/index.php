<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Pages');
$this->params['breadcrumbs'][] = $this->title;
?>
<div style="overflow:scroll;" class="page-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Page'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
		
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
			
            'id',
            'language_id',
            'title',
            'name',
			[
			'label' => 'content',
            'format' => 'raw',
			'contentOptions' => ['style' => 'width: 300px;'],
			'content'=>function($data){ return $data->content;}
			],
           // 'content:ntext',
            // 'slug',
            // 'status',
            // 'date_create',
            // 'date_update',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
