<?php
    Router::connect('/app/:action/*', array('plugin' => 'cd4you', 'controller' => 'apps'));
	Router::connect('/', array('plugin'=>'cd4you' ,'controller' => 'apps', 'action' => 'index'));
