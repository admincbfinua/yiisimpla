<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "Setting".
 *
 * @property integer $id
 * @property integer $language_id
 * @property string $store_name
 * @property string $store_title
 * @property string $store_descr
 * @property string $store_meta_descr
 * @property string $store_phone
 * @property string $store_email
 * @property string $store_work_time
 * @property integer $eshop
 */
class Setting extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Setting';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['language_id', 'eshop'], 'integer'],
            [['store_name', 'store_title', 'store_descr', 'store_meta_descr', 'store_phone', 'store_email', 'store_work_time'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'language_id' => Yii::t('app', 'Language ID'),
            'store_name' => Yii::t('app', 'Store Name'),
            'store_title' => Yii::t('app', 'Store Title'),
            'store_descr' => Yii::t('app', 'Store Descr'),
            'store_meta_descr' => Yii::t('app', 'Store Meta Descr'),
            'store_phone' => Yii::t('app', 'Store Phone'),
            'store_email' => Yii::t('app', 'Store Email'),
            'store_work_time' => Yii::t('app', 'Store Work Time'),
            'eshop' => Yii::t('app', 'Eshop'),
        ];
    }
}
