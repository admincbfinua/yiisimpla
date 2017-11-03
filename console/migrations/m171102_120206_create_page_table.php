<?php

use yii\db\Migration;

/**
 * Handles the creation of table `page`.
 */
class m171102_120206_create_page_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('page', [
            'id' => $this->primaryKey(),
			'language_id' => $this->integer(1)->notNull()->defaultValue(0),
			'title' => $this->string(255),
			'name' => $this->string(255),
			'content' => $this->text(),
			'slug' => $this->string(255),
			'status' => $this->integer(1)->notNull()->defaultValue(1),
			'date_create'=>$this->timestamp(),
			'date_update'=>$this->timestamp()
			
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('page');
    }
}
