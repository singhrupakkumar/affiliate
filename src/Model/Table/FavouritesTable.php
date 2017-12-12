<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Favourites Model
 *
 * @property \App\Model\Table\StoreTable|\Cake\ORM\Association\HasMany $Stores
 *
 * @method \App\Model\Entity\Favourite get($primaryKey, $options = [])
 * @method \App\Model\Entity\Favourite newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Favourite[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Favourite|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Favourite patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Favourite[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Favourite findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FavouritesTable extends Table
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

        $this->setTable('favourites');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

          $this->belongsTo('Stores', [
            'foreignKey' => 'store_id',
            'joinType' => 'INNER'
        ]);   
    

        // $this->hasMany('Products', [
            // 'foreignKey' => 'store_id'
        // ]);
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
}
