<?php
    Router::connect('/app/:action/*', array('plugin' => 'jbyx', 'controller' => 'apps'));
	Router::connect('/', array('plugin'=>'jbyx' ,'controller' => 'apps', 'action' => 'index'));
