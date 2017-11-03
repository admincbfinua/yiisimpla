<?php
namespace frontend\components;
use Yii;
use yii\base\Component;
use common\models\Setting;

class SettingsComponent extends Component  
{
    public $output=array();
	public function init()
	{
		parent::init();
	}
	public function getSettings()
    {
		$data=Setting::find()->asArray()->all();
		if($data)
		{
			/*if($data[0]['language_id']==1)
			{
				$this->output[1]=$data[0];
			}
			*/
			foreach($data as $key=>$value )
			{
				if($value['language_id']==1)
				{
					$this->output[1]=$data[$key];
				}
				elseif($value['language_id']==2)
				{
					$this->output[2]=$data[$key];
				}
				elseif($value['language_id']==3)
				{
					$this->output[3]=$data[$key];
				}
			}
			
		}
		return $this->output;
		
	}
	
}
