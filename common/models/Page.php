<?php
namespace common\models;

use Yii;

/**
 * This is the model class for table "Page".
 *
 * @property integer $id
 * @property integer $language_id
 * @property string $title
 * @property string $name
 * @property string $content
 * @property string $slug
 * @property integer $status
 * @property string $date_create
 * @property string $date_update
 */
class Page extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Page';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['language_id', 'status'], 'integer'],
            [['content'], 'string'],
            [['date_create', 'date_update'], 'safe'],
            [['title', 'name', 'slug'], 'string', 'max' => 255],
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
            'title' => Yii::t('app', 'Title'),
            'name' => Yii::t('app', 'Name'),
            'content' => Yii::t('app', 'Content'),
            'slug' => Yii::t('app', 'Slug'),
            'status' => Yii::t('app', 'Status'),
            'date_create' => Yii::t('app', 'Date Create'),
            'date_update' => Yii::t('app', 'Date Update'),
        ];
    }
}
