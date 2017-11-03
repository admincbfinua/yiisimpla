<?php
namespace frontend\components;
use Yii;
use common\models\Menu;

class GetMenuRecurs  
{
    public function getMenu()
    {
    	/*
		$cache = Yii::$app->cache;
		if (!$cache->get('MenuCache'))
		{
			$data = Menu::find()->where(['status'=>1])->orderBy(['sort'=>SORT_ASC])->all();
			$dependency = new \yii\caching\DbDependency(['sql' => 'SELECT COUNT(*) FROM {{%menu}} WHERE `status`=1']);
			$cache->set('MenuCache', $data, 60*60, $dependency);
		}
		else
		{
			$data = $cache->get('MenuCache'); 
		}
		*/
		$duration = 60*5;// for 300 second 
		$dependency = new \yii\caching\DbDependency(['sql' => 'SELECT COUNT(*) FROM {{%menu}} WHERE `status`=1']);
		$data=Menu::getDB()->cache(function ($db){
			return Menu::find()->where(['status'=>1])->orderBy(['sort'=>SORT_ASC])->all();
			},$duration,$dependency);
		//$data=Menu::find()->where(['status'=>1])->orderBy(['sort'=>SORT_ASC])->all();
		return $this->buildTree($data);
		
	}
	
	protected function buildTree(&$data, $rootID = 0) 
	{
        $tree = array();
        foreach ($data as $id => $node) {
            if ($node->parent_id == $rootID) {
                //unset($data[$id]);
                $node->childs = $this->buildTree($data, $node->id);
                $tree[] = $node;
            }
        }
        return $tree;
    } 
	
    
   
}
