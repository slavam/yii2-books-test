<?php

use yii\db\Schema;
use yii\db\Migration;

class m160122_111336_create_author_table extends Migration
{
    public function safeUp()
    {
         $this->createTable('author', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'PRIMARY KEY(id)'
        ]);
        
        $this->insert('author', [
            'name' => 'Дин Кунц',
        ]);
        
        $this->insert('author', [
            'name' => 'Майкл Фитцжеральд',
        ]);
    }

    public function safeDown()
    {
        $this->delete('author', ['id' => 1]);
        $this->delete('author', ['id' => 2]);
        $this->dropTable('author');
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
