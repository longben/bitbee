<?php
Router::connect('/app/:action/*', array('plugin' => 'ga', 'controller' => 'apps'));
Router::connect('/', array('plugin'=>'ga' ,'controller' => 'apps', 'action' => 'index'));
