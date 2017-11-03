<?php
namespace frontend\widgets;

class WCart extends \yii\bootstrap\Widget
{
    public function init(){}

    public function run() {
        return $this->render('cart/view', []);
    }
}