<?php
class PostMeta extends AppModel {

	var $name = 'PostMeta';

	var $hasOne = array(
			'Post' => array('className' => 'Post',
								'foreignKey' => 'id',
								'dependent' => true,
								'conditions' => '',
								'fields' => '',
								'order' => ''
			)
	);

}
?>