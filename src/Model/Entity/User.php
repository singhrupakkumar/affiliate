<?php

namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;

use Cake\ORM\Entity;



/**

 * User Entity

 *

 * @property int $id

 * @property string $first_name

 * @property string $last_name

 * @property string $email

 * @property string $phone

 * @property string $password

 * @property string $gender

 * @property string $dob

 * @property string $country

 * @property \Cake\I18n\FrozenTime $created

 * @property \Cake\I18n\FrozenTime $modified

 */

class User extends Entity

{



    /**

     * Fields that can be mass assigned using newEntity() or patchEntity().

     *

     * Note that when '*' is set to true, this allows all unspecified fields to

     * be mass assigned. For security purposes, it is advised to set '*' to false

     * (or remove it), and explicitly make individual fields accessible as needed.

     *

     * @var array

     */

    protected $_accessible = [

        '*' => true,

        'id' => false

    ];



    /**

     * Fields that are excluded from JSON versions of the entity.

     *

     * @var array

     */

    protected $_hidden = [

        'password'

    ];


	protected function _setPassword($password) {

        return (new DefaultPasswordHasher)->hash($password);

         

    }
	
	protected $_virtual = ['distance'];
	
	protected function _getDistance()
    {
        return "get_distance_in_miles_between_geo_locations('".$this->lat.'","'.$this->long."',Users.latitude,Users.longitude)";
    }

}

