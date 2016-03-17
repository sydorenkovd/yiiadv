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
        $this->createTable('auth_assignment', [
            'item_name' => $this->string(64)->notNull(),
            'user_id' => $this->integer()->notNull(),
            'created_at' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP')
        ]);
    $this->createTable('auth_item', [
       'name' => $this->string(64)->notNull(),
        'type' => $this->integer()->notNull(),
        'description' => $this->text(),
        'rule_name' => $this->string(64)->defaultValue(null),
        'data' => $this->text(),
        'created_at' => $this->integer()->defaultValue(null),
        'updated_at' => $this->integer()->defaultValue(null)
    ]);
        $this->createTable('auth_item_child', [
           'parent' => $this->string(64)->notNull(),
            'child' => $this->string(64)->notNull()
        ]);
        $this->createTable('auth_rule', [
           'name' => $this->string(64)->notNull(),
            'data' => $this->text()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull()
        ]);
        $this->createTable('customer', [
           'id' => $this->integer()->notNull(),
            'name' => $this->string(50)->notNull(),
            'surname' => $this->string(50)->notNull(),
            'phone_number' => $this->string(50)->notNull()
        ]);
        $this->createTable('event', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'description' => $this->text()->notNull(),
            'create_date' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP')
        ]);
        $this->createTable('migration', [
           'version' => $this->string(180)->notNull(),
            'apply_time' => $this->integer()->notNull()
        ]);
        $this->createTable('po', [
           'id' => $this->primaryKey(),
            'po_no' => $this->string(20)->notNull(),
            'description' => $this->text()->notNull()
        ]);
        $this->createTable('po_item', [
            'id' => $this->primaryKey(),
            'po_item_no' => $this->string(10)->notNull(),
            'quantity' => $this->double()->notNull(),
            'po_id' => $this->primaryKey()
        ]);
        $this->createTable('reservation', [
            'id' => $this->primaryKey(),
            'room_id' => $this->integer()->notNull(),
            'customer_is' => $this->integer()->notNull(),
            'price_per_day' => $this->decimal(20,2)->notNull(),
            'date_from' => $this->dateTime()->notNull(),
            'date_to' => $this->dateTime()->notNull(),
            'reservation_date' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP')
        ]);
        $this->createTable('room', [
            'id' => $this->primaryKey(),
            'floor' => $this->integer()->notNull(),
            'room_number' => $this->integer()->notNull(),
            'has_conditioner' => $this->integer(1)->notNull(),
            'has_tv' => $this->integer(1)->notNull(),
            'has_phone' => $this->integer(1)->notNull(),
            'available_from' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP')->notNull(),
            'price_per_day' => $this->decimal(20,2)->defaultValue(null),
            'description' => $this->text()->notNull()
        ]);
        $this->createTable('tbl_author', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->defaultValue(null),
            'is_moderator' => $this->string(1)->defaultValue(0),
            'username' => $this->string(30)->notNull(),
            'email' => $this->string(40)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'auth_key' => $this->string()->notNull(),
            'created_at' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP'),
            'status' => $this->integer(4)->notNull()
        ]);
        $this->createTable('tbl_author_post', [
        'id_post' => $this->integer()->defaultValue('0')->notNull(),
        'id_author' => $this->integer()->defaultValue('0')->notNull(),
        ]);
        $this->createTable('tbl_category', [
        'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'create_date' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP')->notNull()
        ]);
        $this->createTable('tbl_comment', [
            'id' => $this->primaryKey(),
            'pid' => $this->integer()->notNull(),
            'title' => $this->string()->notNull(),
            'content' => $this->string()->notNull(),
            'publish_status' => 'ENUM(`moderate`, `publish`) NOT NULL DEFAULT `publish`',
            'post_id' => $this->integer()->defaultValue(null),
            'author_id' => $this->integer()->defaultValue(null)
        ]);
        $this->createTable('tbl_customers', [
        'id' => $this->primaryKey(),
            'customer_name' => $this->string(100)->notNull(),
            'zip_code' => $this->string(20)->notNull(),
            'city' => $this->string(100)->notNull(),
            'provice' => $this->string(100)->notNull()
        ]);
        $this->createTable('tbl_doing', [
            'id' => $this->primaryKey(),
            'id_surname' => $this->integer()->notNull(),
            'name' => $this->string(25)->notNull(),
            'email' => $this->string(50)->notNull(),
            'created_at' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP')->notNull(),
            'updated_at' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP')->notNull()
    ]);
        $this->createTable('tbl_doing_name', [
            'id' => $this->primaryKey(),
            'surname' => $this->string()->notNull()
        ]);
        $this->createTable('tbl_emails', [
            'id' => $this->primaryKey(),
            'receiver_name' => $this->string(50)->notNull(),
            'receiver_email' => $this->string(200)->notNull(),
            'subject' => $this->string()->notNull(),
            'content' => $this->text()->notNull(),
            'attachment' => $this->string()->notNull()
        ]);
        $this->createTable('tbl_locations', [
            'id' => $this->primaryKey(),
            'zip_code' => $this->string(25)->notNull(),
            'city' => $this->string(100)->notNull(),
            'province' => $this->string(100)->notNull(),
            'file' => $this->string()->defaultValue(null),
            'logo' => $this->string()->defaultValue(null)
        ]);
        $this->createTable('tbl_posts', [
            'id' => $this->primaryKey(),
            'author_id' => $this->integer()->defaultValue(null),
            'category_id' => $this->integer()->defaultValue(null),
            'title' => $this->string()->defaultValue('sydorenkovd')->notNull(),
            'description' => $this->text()->notNull(),
            'logo' => $this->string()->notNull(),
            'create_date' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP'),
            'image' => $this->string(30)->defaultValue(null),
            'is_moderate' => $this->string(1)->defaultValue('0')->notNull(),
            'publish_status' => 'ENUM(`draft`, `published`) NOT NULL DEFAULT `draft`',
        ]);
        $this->createTable('tbl_tag', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'frequency' => $this->integer(6)->defaultValue('0')->notNull()
        ]);
        $this->createTable('tbl_tagPost', [
            'tag_id' => $this->integer()->defaultValue(null),
            'post_id' => $this->integer()->defaultValue(null)
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
