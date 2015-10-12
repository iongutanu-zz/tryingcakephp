<?php

use Phinx\Migration\AbstractMigration;

class AddChestionareTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $quizesTable = $this->table('quizes', ['id' => false, 'primary_key' => ['id']]);
        $quizesTable
            ->addColumn('id', 'integer', ['identity' => true, 'signed' => false])
            ->addColumn('title', 'string', ['length' => 255, 'null' => false])
            ->addColumn('subtitle', 'string', ['length' => 255, 'null' => false])
            ->addColumn('logo', 'string', ['length' => 255, 'null' => false])
            ->addColumn('sponsor_logo', 'string', ['length' => 255, 'null' => false])
            ->addColumn('short_description', 'text')
            ->addColumn('created', 'datetime')
            ->addColumn('modified', 'datetime')
            ->create();

        $questionsTable = $this->table('questions', ['id' => false, 'primary_key' => ['id']]);
        $questionsTable
            ->addColumn('id', 'integer', ['identity' => true, 'signed' => false])
            ->addColumn('quize_id', 'integer', ['signed' => false, 'null' => false])
            ->addColumn('title', 'string', ['length' => 255, 'null' => false])
            ->addColumn('subtitle', 'string', ['length' => 255, 'null' => false])
            ->addColumn('logo', 'string', ['length' => 255, 'null' => false])
            ->addColumn('question_text', 'text')
            ->addColumn('answer_a', 'text')
            ->addColumn('answer_b', 'text')
            ->addColumn('correct_answer', 'boolean')
            ->addColumn('total_correct_answers', 'integer', ['signed' => false, 'default' => 0])
            ->addColumn('total_answers', 'integer', ['signed' => false, 'default' => 0])
            ->addColumn('created', 'datetime')
            ->addColumn('modified', 'datetime')
            ->addIndex('quize_id')
            ->addIndex('correct_answer')
            ->addIndex('total_correct_answers')
            ->addIndex('total_answers')
            ->create();
    }
}
