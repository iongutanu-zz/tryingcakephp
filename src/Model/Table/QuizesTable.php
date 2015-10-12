<?php
namespace App\Model\Table;

use App\Model\Entity\Quize;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Quizes Model
 *
 * @property \Cake\ORM\Association\HasMany $Questions
 */
class QuizesTable extends Table
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

        $this->table('quizes');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Questions', [
            'foreignKey' => 'quize_id'
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
            ->requirePresence('sponsor_logo', 'create')
            ->notEmpty('sponsor_logo');

        $validator
            ->requirePresence('short_description', 'create')
            ->notEmpty('short_description');

        return $validator;
    }
}
