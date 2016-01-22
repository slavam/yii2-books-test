<?php

use yii\db\Schema;
use yii\db\Migration;

class m160122_112152_create_book_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('book', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'author_id' => $this->integer(),
            'created_at' => $this->string(),
            'updated_at' => $this->string(),
            'preview' => $this->string(),
            'issue' => $this->string(),
            'PRIMARY KEY(id)'
        ]);
        
        $this->insert('book', [
            'title' => 'Фантомы',
            'author_id' => 1,
            'created_at' => '2016-01-21',
            'updated_at' => '2016-01-21',
            'preview' => 'image1.jpg',
            'issue' => '2014-04-20'
        ]);
        
        $this->insert('book', [
            'title' => 'Изучаем Ruby',
            'author_id' => 2,
            'created_at' => '2016-01-21',
            'updated_at' => '2016-01-21',
            'preview' => 'image2.jpg',
            'issue' => '2008-01-01'
        ]);
        
    }

    public function safeDown()
    {
        $this->delete('book', ['id' => 1]);
        $this->delete('book', ['id' => 2]);
        $this->dropTable('book');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
