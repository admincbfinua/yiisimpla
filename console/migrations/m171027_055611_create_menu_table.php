<?php

use yii\db\Migration;


class m171027_055611_create_menu_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('menu', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer(9)->notNull()->defaultValue(0),
			'language_id' => $this->integer(1)->notNull()->defaultValue(0),
			'name' => $this->string(255),
			'sort' => $this->integer(3)->notNull()->defaultValue(0),
			'route_url' => $this->string(255),
			'slug' => $this->string(255),
			'status' => $this->integer(1)->notNull()->defaultValue(1),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('menu');
    }
}
