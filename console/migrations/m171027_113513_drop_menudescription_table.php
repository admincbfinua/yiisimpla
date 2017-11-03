<?php

use yii\db\Migration;

/**
 * Handles the dropping of table `menudescription`.
 */
class m171027_113513_drop_menudescription_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->dropTable('menudescription');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->createTable('menudescription', [
            'id' => $this->primaryKey(),
        ]);
    }
}
