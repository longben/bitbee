<?php
Router::connect('/app/:action/*', array('plugin' => 'ga', 'controller' => 'apps'));
Router::connect('/', array('admin' => false, 'controller' => 'users', 'action' => 'login'));