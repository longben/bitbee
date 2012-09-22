<?php
/**
 *
 * @copyright     Bitbee Studio
 * @link          http://www.bitbee.com
 * @package       app.Controller
 * @since         Bitbee(tm) v 1.0.0
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 */
class AppController extends Controller {

    /**
     * Components
     *
     * @var array
     * @access public
     */
    public $components = array(
        'Session',
        'RequestHandler',
        'Auth',
    );

    //public $helpers = array('Js');

    public function beforeFilter() {
        if (isset($this->params['admin']) && $this->params['admin']) {
            $this->layout = "admin";

            if(!$this->Session->check('Auth')) {
                $this->Session->setFlash(__('登录失效，请重新登录!', true));
            }
        }else{
            $this->Auth->allow('*');
        }

    }

    /**
     * 为Grid提供数据
     * @params $_conditions array 查询条件
     * @params $_order_field String 排序
     * @return void
     * 
     */
    public function findJSON4Grid($_order_field = 'id', $_conditions = array('1' => '1')){
        $q     = isset($_POST['q']) ? $_POST['q'] : '';           //查询关键字
        $page  = isset($_POST['page']) ? $_POST['page'] : null;   //查询页码
        $rows  = isset($_POST['rows']) ? $_POST['rows'] : 20;     //每页显示条目数
        $sort  = isset($_POST['sort'])?$_POST['sort'] : $_order_field;     //排序字段
        $order = isset($_POST['order'])?$_POST['order'] : 'desc'; //排序方式

        if(isset($_POST['q'])){
            $_conditions = array_merge($_conditions, array($this->modelClass. '.' . $_POST['field'] . ' LIKE' => '%'.$q.'%'));
        }

        $this->paginate = array(
            'conditions' => $_conditions,
            'recursive' => 0, //int
            'limit' => $rows, //int
            'page' => $page, //int
            'order' => $this->modelClass. '.' .  $sort . ' ' . $order
        );
        $this->set('data', $this->paginate());
    }

}
