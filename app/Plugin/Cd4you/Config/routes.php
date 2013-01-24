<?php
    Router::connect('/app/:action/*', array('plugin' => 'cds4you', 'controller' => 'apps'));
	Router::connect('/', array('plugin'=>'cds4you' ,'controller' => 'apps', 'action' => 'index'));
