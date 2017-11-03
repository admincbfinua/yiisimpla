<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Setting */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="setting-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'language_id')->textInput() ?>

    <?= $form->field($model, 'store_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'store_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'store_descr')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'store_meta_descr')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'store_phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'store_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'store_work_time')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'eshop')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
