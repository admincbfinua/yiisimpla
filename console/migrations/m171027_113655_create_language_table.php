<?php

use yii\db\Migration;

/**
 * Handles the creation of table `language`.
 */
class m171027_113655_create_language_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('language', [
            'id' => $this->primaryKey(),
			'url' => $this->string(3),
            'local' => $this->string(7),
			'name' => $this->string(25),
			'default' => $this->integer(1),
			'date_create'=> $this->dateTime(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('language');
    }
}
