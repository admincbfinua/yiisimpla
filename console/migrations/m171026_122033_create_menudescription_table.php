<?php

use yii\db\Migration;

/**
 * Handles the creation of table `menudescription`.
 */
class m171026_122033_create_menudescription_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('menudescription', [
            'id' => $this->primaryKey(),
            'menu_id' => $this->integer(11),
            'language_id' => $this->integer(2),
            'name' => $this->string(255),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('menudescription');
    }
}
