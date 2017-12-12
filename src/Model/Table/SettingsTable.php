<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Staticpages Model
 *
 * @method \App\Model\Entity\Staticpage get($primaryKey, $options = [])
 * @method \App\Model\Entity\Staticpage newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Staticpage[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Staticpage|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Staticpage patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Staticpage[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Staticpage findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SettingsTable extends Table
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

        $this->setTable('settings');
        $this->setDisplayField('value');
        $this->setPrimaryKey('id');

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
     

        return $validator;
    }
	
	public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['key']));

        return $rules;
    }
}
