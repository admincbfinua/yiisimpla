<?php

use yii\db\Migration;

/**
 * Handles adding key to table `cache`.
 */
class m171102_102545_add_key_column_to_cache_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
		$this->addColumn('cache', 'key', $this->integer());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
    }
}
