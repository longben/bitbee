<?php
App::uses('AppController', 'Controller');

class PostsController extends AppController {

    /**
     * 根据条件查询用户JSON数据
     *
     * @return JSON
     */
    public function admin_json_data(){
        $this->findJSON4Grid('post_date', array('Meta.category' => $_GET['c'])); //
    }

    public function admin_manage($category_id){
        $this->set('category_id', $category_id);
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->Post->recursive = 0;
        $this->set('posts', $this->paginate());
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
				$this->request->data['Meta']['picture'] = $matche[2];
			}
			$this->Post->create();
			$this->request->data['Post']['post_date'] = date("Y-m-d H:i:s");
			$this->request->data['Meta']['category'] = $category_id;
			$this->request->data['Post']['post_author'] = $this->Session->read('Auth.User.User.id');

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
			if ($this->Post->save($this->request->data)) {
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

}