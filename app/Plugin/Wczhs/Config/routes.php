<?php
    Router::connect('/app/:action/*', array('plugin' => 'Wczhs', 'controller' => 'Apps'));
	Router::connect('/', array('plugin'=>'Wczhs' ,'controller' => 'Apps', 'action' => 'index'));
	Router::connect('/main', array('plugin'=>'Wczhs' ,'controller' => 'Apps', 'action' => 'main'));
	Router::connect('/education', array('plugin'=>'Wczhs' ,'controller' => 'Apps', 'action' => 'main'));
	Router::connect('/english', array('plugin'=>'Wczhs' ,'controller' => 'Apps', 'action' => 'english'));
?>
