<?php

use yii\db\Migration;

/**
 * Handles the creation of table `cache`.
 */
class m171102_082343_create_cache_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('cache', [
            'id' => $this->primaryKey(),
			'expire' => $this->integer(11),
            'data' => $this->text(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('cache');
    }
}
