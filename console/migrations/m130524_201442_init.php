<?php

use yii\db\Schema;
use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('tbl_user', [
            'id' => $this->primaryKey(),
            'full_name' => $this->string()->notNull(),
            'username' => $this->string()->notNull()->unique(),
            'email' => $this->string()->notNull()->unique(),
            'password_hash' => $this->string()->notNull(),
            'auth_key' => $this->string(32)->notNull(),
            'password_reset_token' => $this->string()->unique(),


            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createTable('{{tbl_job}}', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer(),
            'user_id' => $this->integer(),
            'title' => $this->string()->notNull(),
            'description' => $this->text()->notNull(),
            'type' => $this->string()->notNull(),
            'requirement' => $this->string()->notNull(),
            'salary' => $this->string()->notNull(),
            'city' => $this->string(32)->notNull(),
            'zipcode' => $this->string(32)->notNull(),
            'contact_email' => $this->string(32)->notNull(),
            'contact_phone' => $this->string(32)->notNull(),
            'is_published' => $this->string(1)->defaultValue(0),
            'create_date' => $this->integer()->notNull()

        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
