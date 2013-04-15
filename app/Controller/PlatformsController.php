<?php
class PlatformsController extends AppController {
    var $name = 'Platforms';

    public $components = array('Session', 'PImage');

    var $uses = array('Module', 'Memo', 'Role', 'TweetImage');

    public function upload(){ //保存图片

        if (isset($_POST["PHPSESSID"])) {
            session_start();
            session_id($_POST["PHPSESSID"]);
        } else if (isset($_GET["PHPSESSID"])) {
            session_start();
            session_id($_GET["PHPSESSID"]);
        }

        $this->log($this->Session->read('Auth.User.User.id'), 'cxf');


        App::import('Vendor', '/utils/file');

        $user_id = '';

        if( $this->Session->check('id') ){
            $user_id = $this->Session->read('id');
        }else{
            $user_id = 1;
        }

        $user_name = '';

        $upload_path = UPLOAD_PATH . $user_id . DS . 'default' . DS;
        $view_path = UPLOAD_VIEW_PATH . $user_id .'/default/';

        if(!file_exists(UPLOAD_PATH . $user_id)){
            mkdir(UPLOAD_PATH.$user_id);
        }

        if(!file_exists($upload_path)){
            mkdir($upload_path);
        }


        $_tmp_filename = $_FILES['imgFile']['name'];
        $_new_filename = md5(time().$_tmp_filename).'.'.getFileExtension($_tmp_filename);
        $uploadfile = $upload_path . $_new_filename;

        if(move_uploaded_file($_FILES['imgFile']['tmp_name'], $uploadfile)){
            list($width, $height, $type) = getimagesize($uploadfile);

            if(!empty($type)){

                $this->PImage->resizeImage('resizeCrop', $_new_filename, $upload_path, '120x120_'.$_new_filename, 120, 120, 100);
                $this->PImage->resizeImage('resizeCrop', $_new_filename, $upload_path, '240x180_'.$_new_filename, 240, 180, 100);

                $this->request->data['TweetImage']['name'] = 'TWEET_IMAGE';
                $this->request->data['TweetImage']['tweet_id'] = 0; //表示临时存储
                $this->request->data['TweetImage']['user_id'] = $user_id;
                $this->request->data['TweetImage']['user_name'] = $user_name;
                $this->request->data['TweetImage']['photo'] = "$user_id/default/" . $_new_filename;
                $this->request->data['TweetImage']['image_url'] = '';
                $this->request->data['TweetImage']['width'] = $width;
                $this->request->data['TweetImage']['height'] = $height;
                $this->request->data['TweetImage']['album_id'] = $this->Session->read('default_album_id');
                $this->TweetImage->create();
                $this->TweetImage->save($this->request->data);

                $id = $this->TweetImage->getLastInsertID();

                $file = $view_path.$_new_filename;
                $micrograph = $view_path.'120x120_'.$_new_filename;
            }else{
                $id = 0;
                $file = $view_path.$_new_filename;
                $micrograph = $view_path.$_new_filename;
            }
        }

        return new CakeResponse(array('body' => json_encode(array('error' => 0, 'url' => $file, 'id' => $id, 'file' => $micrograph))));
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


    //elements维护——elements编辑
    function admin_element($file_name = null) {
        //$this->layout = "cake";
        $this->set('content', file_get_contents(ELEMENT_PATH.$file_name));
        $this->set('file_name', $file_name);
    }

    //elements维护——elements保存
    function admin_save_element() {
        $this->autoRender = false;
        if ($fh = fopen(ELEMENT_PATH. $this->request->data['Platform']['file_name'] , "w")) {
            fwrite($fh, $this->request->data['Platform']['content']);
            fclose($fh);
            return new CakeResponse(array('body' => json_encode(array('success'=>true))));
        }else{
            return new CakeResponse(array('body' => json_encode(array('msg'=>'Some errors occured.'))));
        }
    }

}
?>
