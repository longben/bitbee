<?php
    Router::connect('/zh/:action/*', array('plugin' => 'hy2', 'controller' => 'apps'));
    Router::connect('/en/:action/*', array('plugin' => 'hy2', 'controller' => 'english'));
	Router::connect('/', array('plugin'=>'hy2' ,'controller' => 'apps', 'action' => 'index'));
	Router::connect('/zh', array('plugin'=>'hy2' ,'controller' => 'apps', 'action' => 'index'));
	Router::connect('/en', array('plugin'=>'hy2' ,'controller' => 'english', 'action' => 'index'));
