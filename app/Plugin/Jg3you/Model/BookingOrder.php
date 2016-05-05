<?php
App::uses('Jg3youAppModel', 'Jg3you.Model');
/**
 * BookingOrder Model
 *
 * @property Booking $Booking
 */
class BookingOrder extends Jg3youAppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Booking' => array(
			'className' => 'Booking',
			'foreignKey' => 'booking_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
