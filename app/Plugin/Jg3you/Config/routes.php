<?php
    Router::connect('/app/:action/*', array('plugin' => 'jg3you', 'controller' => 'apps'));
	Router::connect('/', array('plugin'=>'jg3you' ,'controller' => 'apps', 'action' => 'index'));
