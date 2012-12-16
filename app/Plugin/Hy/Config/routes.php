<?php
    Router::connect('/zh/:action/*', array('plugin' => 'hy', 'controller' => 'apps'));
    Router::connect('/en/:action/*', array('plugin' => 'hy', 'controller' => 'english'));
	Router::connect('/', array('plugin'=>'hy' ,'controller' => 'apps', 'action' => 'sw'));
	Router::connect('/zh', array('plugin'=>'hy' ,'controller' => 'apps', 'action' => 'index'));
	Router::connect('/en', array('plugin'=>'hy' ,'controller' => 'english', 'action' => 'index'));
?>
