<?php

namespace App\Model\Table;



use Cake\ORM\Query;

use Cake\ORM\RulesChecker;

use Cake\ORM\Table;

use Cake\Validation\Validator;



/**

 * Users Model

 *

 * @method \App\Model\Entity\User get($primaryKey, $options = [])

 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])

 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])

 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])

 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])

 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])

 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])

 *

 * @mixin \Cake\ORM\Behavior\TimestampBehavior

 */

class UsersTable extends Table

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



        $this->setTable('users');

        $this->setDisplayField('id');

        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
		
		$this->hasMany('Galleries')
            ->setForeignKey('user_id')
            ->setDependent(true);
			
		$this->hasMany('Reviews')
            ->setForeignKey('trainer_id')
            ->setDependent(true);	

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

            ->integer('id')

            ->allowEmpty('id', 'create');



        $validator

            ->notEmpty('first_name', 'Please Enter First Name');



        $validator

            ->notEmpty('last_name', 'Please Enter Last Name');



        $validator

            ->email('email')

            ->notEmpty('email', 'Please Enter Email');



        $validator

            ->notEmpty('phone', 'Please Enter Phone');



       /* $validator

            ->add('password1', [

                'length' => [

                    'rule' => ['minLength', 6],

                    'message' => 'The password have to be at least 6 characters!',

                ]

            ])

            ->add('password1',[

                'match'=>[

                    'rule'=> ['compareWith','password'],

                    'message'=>'The passwords does not match!',

                ]

            ])

            ->notEmpty('password1');

        $validator

            ->add('password', [

                'length' => [

                    'rule' => ['minLength', 6],

                    'message' => 'The password have to be at least 6 characters!',

                ]

            ])

            ->add('password',[

                'match'=>[

                    'rule'=> ['compareWith','password1'],

                    'message'=>'The passwords does not match!',

                ]

            ])

            ->notEmpty('password2');*/



        $validator

            ->allowEmpty('gender');



        $validator

            ->allowEmpty('dob');



        $validator

            ->allowEmpty('country');



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

