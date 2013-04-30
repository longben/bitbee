<?php
class DATABASE_CONFIG {


    public function __construct(){
        $db_name = is_null(Configure::read('Site.db'))?'bitbee':Configure::read('Site.db');

        $this->default = array(
            //'datasource' => 'HpMysql',
            'datasource' => 'Database/Mysql',
            'persistent' => false,
            'host' => 'localhost',
            'login' => 'bitbee',
            'password' => 'M9HcYnVC5fwAdjV5',
            'database' => $db_name,
            'encoding' => 'utf8',
        );
    }

}
