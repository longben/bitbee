<?php
App::uses('Jg3youAppModel', 'Jg3you.Model');
/**
 * Booking Model
 *
 * @property BookingOrder $BookingOrder
 */
class Booking extends Jg3youAppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'BookingOrder' => array(
			'className' => 'BookingOrder',
			'foreignKey' => 'booking_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
