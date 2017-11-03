<?php

namespace common\models;
use Yii;

class Lang extends \yii\db\ActiveRecord
{
    static $current = null;
    public static function tableName()
    {
        return '{{%Lang}}';
    }

  
    public function rules()
    {
        return [
            [['url', 'local', 'name'], 'required'],
            [['default'], 'integer'],
            [['date_update', 'date_create'], 'safe'],
            [['url', 'local', 'name'], 'string', 'max' => 255],
        ];
    }

   
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'url' => Yii::t('app', 'Url'),
            'local' => Yii::t('app', 'Local'),
            'name' => Yii::t('app', 'Name'),
            'default' => Yii::t('app', 'Default'),
            'date_update' => Yii::t('app', 'Date Update'),
            'date_create' => Yii::t('app', 'Date Create'),
        ];
    }
	
	//Получение текущего объекта языка
	static function getCurrent()
	{
		if( self::$current === null ){
			self::$current = self::getDefaultLang();
		}
		return self::$current;
	}

	//Установка текущего объекта языка и локаль пользователя
	static function setCurrent($url = null)
	{
		$language = self::getLangByUrl($url);
		self::$current = ($language === null) ? self::getDefaultLang() : $language;
		Yii::$app->language = self::$current->local;
	}

	//Получения объекта языка по умолчанию
	static function getDefaultLang()
	{
		return Lang::find()->where('`default` = :default', [':default' => 1])->one();
	}

	//Получения объекта языка по буквенному идентификатору
	static function getLangByUrl($url = null)
	{
		if ($url === null) {
			return null;
		} else {
			$language = Lang::find()->where('url = :url', [':url' => $url])->one();
			if ( $language === null ) {
				return null;
			}else{
				return $language;
			}
		}
	}
	
}
