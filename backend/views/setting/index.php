<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Settings');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="setting-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Setting'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'language_id',
            'store_name',
            'store_title',
            'store_descr',
            // 'store_meta_descr',
            // 'store_phone',
            // 'store_email:email',
            // 'store_work_time',
            // 'eshop',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
