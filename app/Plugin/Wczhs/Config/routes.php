<?php
    Router::connect('/app/:action/*', array('plugin' => 'wczhs', 'controller' => 'apps'));
	Router::connect('/', array('plugin'=>'wczhs' ,'controller' => 'apps', 'action' => 'index'));
	Router::connect('/main', array('plugin'=>'wczhs' ,'controller' => 'apps', 'action' => 'main'));
	Router::connect('/education', array('plugin'=>'wczhs' ,'controller' => 'apps', 'action' => 'main'));
	Router::connect('/english', array('plugin'=>'wczhs' ,'controller' => 'apps', 'action' => 'english'));
?>
