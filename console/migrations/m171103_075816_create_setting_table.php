<?php

use yii\db\Migration;

/**
 * Handles the creation of table `setting`.
 */
class m171103_075816_create_setting_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('setting', [
            'id' => $this->primaryKey(),
			'language_id' => $this->integer(1)->notNull()->defaultValue(0),
			'store_name' => $this->string(255),
			'store_title' => $this->string(255),
			'store_descr' => $this->string(255),
			'store_meta_descr' => $this->string(255),
			'store_phone' => $this->string(255),
			'store_email' => $this->string(255),
			'store_work_time' => $this->string(255),
			'eshop' => $this->integer(1)->notNull()->defaultValue(0),
			
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('setting');
    }
}
