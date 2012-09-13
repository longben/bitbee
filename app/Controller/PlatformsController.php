<?php
class PlatformsController extends AppController {
    var $name = 'Platforms';

    public $components = array('Session');

    var $uses = array('Module', 'Memo', 'Role');

    var $helpers = array('Ck');

    function captcha(){
        $this->Captcha->render();
    }

    function index() {
        $this->admin_index();
    }

    function admin_index() {
        $this->layout = 'blank';
        //if(!$this->Session->check('id')) {
        //	$this->Session->setFlash(__('非法请求!'));
        //	$this->redirect('/platforms/login');
        //}

        /*
        $this->Module->recursive = 0;
        $this->paginate['Module'] = array(
                 'conditions' => array('Module.parent_id' => '302', 'Module.type' => 'website'), 
                 'recursive' => -1, //int
                 'fields' => array('Module.id', 'Module.name'),
                 'order' => 'Module.id', //string or array defining order
                 'limit' => 10, //int
                 'page' => null //int
             );
        $this->set('modules', $this->paginate());
         */
        $this->Memo->id = $this->Session->read('id');
        $this->set('memo', $this->Memo->field('description'));

        $this->set('ip', $this->RequestHandler->getClientIP());

        if(0 == $this->Session->read('role')){
            $this->set('outlook', $this->Module->outlook());
        }else{
            $this->set('outlook', $this->Role->outlook($this->Session->read('role')));
        }

    }

    function login() {
        $this->layout = 'blank';
    }

    function login2() {
        $this->layout = 'blank';
    }	

    function logout() {
        $this->Session->destroy();
        $this->redirect('/login');
    }

    function admin_greybox_close() {
        $this->layout = 'greybox';
    }

    function admin_colorbox_close() {
        $this->layout = 'cake';
    }	

    function test(){
        $this->layout = 'blank';

        $this->set('outlook', $this->Role->outlook());
    }

    //elements维护--elements列表
    function admin_element(){
        $this->layout = "easyui";

        $this->set('files', glob(ELEMENT_PATH.'*.ctp'));
        //$this->set('files', scandir(APP));
    }

    //elements维护——elements编辑
    function admin_edit_element($file_name = null) {
        $this->layout = "cake";
        $this->set('content', file_get_contents(ELEMENT_PATH.$file_name));
        $this->set('file_name', $file_name);
    }

    //elements维护——elements保存
    function admin_save_element($filename) {
        if ($fh = fopen(ELEMENT_PATH.$filename, "w")) {
            fwrite($fh, $this->data['Platform']['content']);
            fclose($fh);
            $this->Session->setFlash('元素修改成功!');
            $this->redirect($this->referer());
        }
    }

}
?>
