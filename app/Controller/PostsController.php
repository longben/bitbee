<?php
//TT

class PostsController extends AppController {

    public $components = array('Session', 'BFile');

    public $uses = array('Post', 'Module');

    /**
     * 根据条件查询用户JSON数据
     *
     * @return JSON
     */
    public function admin_json_data(){
        //$_conditions = array('Post.post_status' => 'publish');
        $_conditions = array();

        if(isset($_GET['c'])){
            $_conditions = array_merge($_conditions, array('Meta.category' => $_GET['c']));
        }

        if(isset($_GET['u'])){
            $_conditions = array_merge($_conditions, array('Post.post_author' => $_GET['u']));
        }

        if(isset($_GET['p'])){
            $_conditions = array_merge($_conditions, array('Meta.picture <>' => NULL));
        }

        $this->findJSON4Grid('post_date', $_conditions); 
    }

    public function admin_json_set(){
        $this->admin_json_data();
    }


    public function admin_manage($category_id){
        $this->set('category_id', $category_id);

        $tags = $this->Module->generateTreeList(array('Module.parent_id' => $category_id), null, null, '--', null);

        $this->set('tags', $tags);
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index($category_id) {
        $this->set('category_id', $category_id);
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        $this->Post->id = $id;
        if (!$this->Post->exists()) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->set('post', $this->Post->read(null, $id));
    }

    /**
     * admin_read method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_read($id = null) {
        $this->Post->id = $id;
        if (!$this->Post->exists()) {
            throw new NotFoundException(__('Invalid post'));
        }
        return new CakeResponse(array('body' => json_encode($this->Post->read(null, $id))));
    }



    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add2() {
        if ($this->request->is('post')) {
            $this->Post->create();
            if ($this->Post->save($this->request->data)) {
                $this->Session->setFlash(__('The post has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The post could not be saved. Please, try again.'));
            }
        }
    }

	public function admin_add($category_id) {
        $this->autoRender = false;
		if (!empty($this->request->data)) {
			$reg = "/<img[^>]+src=(['\"])(.+)\\1/isU"; //过滤规则
			preg_match($reg, $this->request->data['Post']['post_content'], $matche);

            if(!empty($matche)){
                if( filter_var($matche[2], FILTER_VALIDATE_URL) ){ //判断是否是网址
                //if (preg_match('/http:\/\/[\w.]+[\w\/]*[\w.]*\??[\w=&\+\%]*/is', $matche[2])){
                    $url = get_headers($matche[2],1); //判断是否是网络资源
                    if(preg_match('/200/',$url[0])){
                        $this->request->data['Meta']['picture'] = $this->BFile->grabImage($matche[2]);
                    }
                }else{
                    $this->request->data['Meta']['picture'] = $matche[2];
                }                
            }

            $this->Post->create();
            $this->request->data['Post']['post_date'] = date("Y-m-d H:i:s");
            $this->request->data['Meta']['category'] = $category_id;
            $this->request->data['Post']['post_author'] = $this->Session->read('id');
            //$this->request->data['Post']['post_content'] = str_ireplace("src="," class='scrollLoading' data-url=", $this->request->data['Post']['post_content']);

            if ($this->Post->saveAll($this->request->data)) {
                return new CakeResponse(array('body' => json_encode(array('success'=>true))));
            } else {
                return new CakeResponse(array('body' => json_encode(array('msg'=>'Some errors occured.'))));
            }
        }
    }


    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit() {
        $this->autoRender = false;
        //$this->Post->id = $this->request->data['Post']['id'];

        if (!empty($this->request->data)) {
            //$this->request->data['Post']['post_content'] = str_ireplace("src=","data-url=", $this->request->data['Post']['post_content']);

            if ($this->Post->saveAll($this->request->data)) {
                return new CakeResponse(array('body' => json_encode(array('success'=>true))));
            } else {
                return new CakeResponse(array('body' => json_encode(array('msg'=>'Some errors occured.'))));
            }
        }
    }

    /**
     * admin_delete method
     *
     * @throws MethodNotAllowedException
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete() {
        if($this->request->is('post')){
            $this->Post->id = $this->data['id'];
            if ($this->Post->delete()) {
                return new CakeResponse(array('body' => json_encode(array('success'=>true))));
            }else{
                return new CakeResponse(array('body' => json_encode(array('msg'=>'Some errors occured.'))));
            }
        }
    }

    public function admin_elite(){
        $post = $this->Post->read(null, $this->data['id']);

        if(1 == $post['Meta']['elite']){
            $post['Meta']['elite'] = 0;
        }else{
            $post['Meta']['elite'] = 1;
        }

        if ($this->Post->Meta->save($post)) {
            return new CakeResponse(array('body' => json_encode(array('success'=>true))));
        }else{
            return new CakeResponse(array('body' => json_encode(array('msg'=>'Some errors occured.'))));
        }
    }

}
