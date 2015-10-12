<?php

use Phinx\Migration\AbstractMigration;

class AddForeignKeys extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     *
     * Uncomment this method if you would like to use it.
     *
    public function change()
    {
    }
    */
 
    /**
     * Migrate Up.
     */
    public function up()
    {
        $this->table('questions')
            ->addForeignKey('quize_id', 'quizes', 'id')
            ->save();
    }
 
    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->table('questions')
            ->dropForeignKey('quize_id');
    }
}