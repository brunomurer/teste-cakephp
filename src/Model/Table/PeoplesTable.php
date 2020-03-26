<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Peoples Model
 *
 * @method \App\Model\Entity\People get($primaryKey, $options = [])
 * @method \App\Model\Entity\People newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\People[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\People|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\People saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\People patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\People[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\People findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PeoplesTable extends Table
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

        $this->setTable('peoples');
        $this->setDisplayField('Id');
        $this->setPrimaryKey('Id');

        $this->addBehavior('Timestamp');
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
            ->integer('Id')
            ->allowEmptyString('Id', null, 'create');

        $validator
            ->scalar('nome')
            ->maxLength('nome', 255)
            ->allowEmptyString('nome');

        $validator
            ->email('email')
            ->allowEmptyString('email');

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
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }
}
