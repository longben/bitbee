<?php
/**
 * Application model for Cake.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       Cake.Console.Templates.skel.Model
 */
class AppModel extends Model {

    public function getCount($_modelName, $_fieldName, $_queryString){
        $count = $this->find('count', array(
            'conditions' => array($_modelName.'.'.$_fieldName => $_queryString)
        ));
        return $count;
    }

    public function getMyId($_modelName, $_fatherId, $_category = null,
        $_fieldName = 'parent_id', $_stepLength = 2, $_totalLength = 10 ){
            $id = str_pad(1, $_totalLength, '0'); //初始化ID
            $hierarchy = 0; //初始化级别
            if(!empty($_fatherId)){
                //取父亲的级别
                $father = $this->findById($_fatherId);
                $hierarchy = $father[$_modelName]['hierarchy'];

                //取该父亲ID下的儿子总数
                $conditions = array($_modelName.'.'.$_fieldName => $_fatherId);
                if(!empty($_category)){
                    $conditions += array($_modelName.'.category' => $_category);
                }
                $count = $this->find('count', array('conditions' => $conditions));

                //格式化当前儿子序号，主要是左补零
                $child = str_pad($count + 1, $_stepLength, '0', STR_PAD_LEFT);

                //格式化当前ID值：父亲ID + 当前儿子序号右补零
                $id = $_fatherId + str_pad($child , $_totalLength - $hierarchy * $_stepLength, '0');
            }

            $my = array('id' => $id);
            $my += array('hierarchy' => $hierarchy + 1);

            return $my;
        }
}
