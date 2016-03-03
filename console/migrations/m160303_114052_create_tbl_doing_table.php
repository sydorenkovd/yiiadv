<?php

use yii\db\Migration;

class m160303_114052_create_tbl_doing_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('tbl_doing', [
            'id' => $this->primaryKey(),
            'id_name' => $this->integer(),
            'name' => $this->string()->notNull(),
            'email' => $this->string()->notNull()->unique(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
        $this->createTable('tbl_doing_name', [
            'id' => $this->primaryKey(),
            'surname' => $this->string()->notNull()
        ], $tableOptions);
        $this->createIndex('idx-tbl_doing-id_name', 'tbl_doing', 'id_name');
        $this->addForeignKey('fk-tbl_doing-id_name', 'tbl_doing', 'id_name', 'tbl_doing_name', 'id', 'CASCADE');

    }

    public function down()
    {
        $this->dropTable('tbl_doing');
        $this->dropTable('tbl_doing_name');
    }
}
