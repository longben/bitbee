<?php
App::uses('AppModel', 'Model');
/**
 * TweetImage Model
 *
 * @property Tweet $Tweet
 * @property Album $Album
 * @property User $User
 */
class TweetImage extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Tweet' => array(
			'className' => 'Tweet',
			'foreignKey' => 'tweet_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Album' => array(
			'className' => 'Album',
			'foreignKey' => 'album_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
