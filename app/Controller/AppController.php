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

    public function beforeFilter() {
        if (isset($this->params['admin']) && $this->params['admin']) {
            $this->layout = "admin";

            if(!$this->Session->check('Auth')) {
                $this->Session->setFlash(__('登录失效，请重新登录!', true));
            }
        }else{
            $this->Auth->allow();
        }

    }

    /**
     * 为Grid提供数据
     * @params $_conditions array 查询条件
     * @params $_order_field String 排序
     * @return void
     * 
     */
    public function findJSON4Grid($_order_field = 'id', $_conditions = array('1' => '1'), $_order = 'desc'){
        $q     = isset($_POST['q']) ? $_POST['q'] : '';           //查询关键字
        $page  = isset($_POST['page']) ? $_POST['page'] : null;   //查询页码
        $rows  = isset($_POST['rows']) ? $_POST['rows'] : 20;     //每页显示条目数
        $sort  = isset($_POST['sort'])?$_POST['sort'] : $_order_field;     //排序字段
        $order = isset($_POST['order'])?$_POST['order'] : $_order; //排序方式

        if(isset($_POST['q'])){
            if( isset( $_conditions ) ){
                $_conditions = array_merge( $_conditions, array( $this->modelClass. '.' . $_POST['field'] . ' LIKE' => '%'.$q.'%' ) );
            }else{
                $_conditions = array($_POST['field'] . ' LIKE' => '%'.$q.'%');
            }
        }

        $this->paginate = array(
            'conditions' => $_conditions,
            'recursive' => 0, //int
            'limit' => $rows, //int
            'page' => $page, //int
            'order' => $this->modelClass. '.' .  $sort . ' ' . $order
        );

        $this->set('data', $this->paginate($this->modelClass));

    }

    /**
     * 判断名称是否存在
     * @param string $fieldName 检查字段名称
     * @param int $type 检查方式
     * @return String JSON 
     * @access public
     */
    public function is_not_exists($fieldName, $type=0){
        if(!empty($this->request->data)){

            $count = $this->{$this->modelClass}->find('count', array(
                'conditions' => array($this->modelClass.'.'.$fieldName => $_POST[$fieldName])
            ));

            if($count == 0){
                return new CakeResponse(array('body' => 'true'));
            }elseif($count == 1 && $type == 1){
                return new CakeResponse(array('body' => 'true'));
            }else{
                return new CakeResponse(array('body' => 'false'));
            }
        }
    }  

    //新闻列表
    public function _posts($id){
        $this->paginate = array(
            'conditions' => "Meta.category = $id", 
            'recursive' => 0, //int
            'order' => 'Post.post_date desc',
            'limit' => 12
        );
        $this->set('news', $this->paginate());
    }

}
