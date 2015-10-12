<?php
namespace App\Model\Table;

use App\Model\Entity\Question;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Questions Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Quizes
 */
class QuestionsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('questions');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Quizes', [
            'foreignKey' => 'quize_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->requirePresence('subtitle', 'create')
            ->notEmpty('subtitle');

        $validator
            ->requirePresence('logo', 'create')
            ->notEmpty('logo');

        $validator
            ->requirePresence('question_text', 'create')
            ->notEmpty('question_text');

        $validator
            ->requirePresence('answer_a', 'create')
            ->notEmpty('answer_a');

        $validator
            ->requirePresence('answer_b', 'create')
            ->notEmpty('answer_b');

        $validator
            ->add('correct_answer', 'valid', ['rule' => 'boolean'])
            ->requirePresence('correct_answer', 'create')
            ->notEmpty('correct_answer');

        $validator
            ->add('total_correct_answers', 'valid', ['rule' => 'numeric'])
            ->requirePresence('total_correct_answers', 'create')
            ->notEmpty('total_correct_answers');

        $validator
            ->add('total_answers', 'valid', ['rule' => 'numeric'])
            ->requirePresence('total_answers', 'create')
            ->notEmpty('total_answers');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['quize_id'], 'Quizes'));
        return $rules;
    }
}
