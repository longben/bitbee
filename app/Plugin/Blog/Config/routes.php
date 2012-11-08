<?php
    Router::connect('/blog/:username', array('plugin' => 'blog', 'controller' => 'main', 'action' => 'index'), array('pass' => array('username')));
