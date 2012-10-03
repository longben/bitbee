<?php
App::uses('WczhsAppController', 'Wczhs.Controller');
/**
 * Courses Controller
 *
 */
class CoursesController extends WczhsAppController {


    public function admin_json_data(){
        $this->findJSON4Grid('id',null, 'ASC'); //
    }


    public function admin_index(){

    }

    public function admin_add() {
        $this->autoRender = false;
        if (!empty($this->request->data)) {
            $this->Course->create();  
            if ($this->Course->save($this->request->data)) {
                return new CakeResponse(array('body' => json_encode(array('success'=>true))));
            } else {
                return new CakeResponse(array('body' => json_encode(array('msg'=>'Some errors occured.'))));
            }
        }
    }

    public function admin_edit() {
        $this->autoRender = false;
        if (!empty($this->request->data)) {    
            if ($this->Course->saveAll($this->request->data)) {
                return new CakeResponse(array('body' => json_encode(array('success'=>true, 'msg' => 'OK'))));
            } else {
                return new CakeResponse(array('body' => json_encode(array('msg'=>'Some errors occured.'))));
            }
        }
    }

    public function admin_delete() {
        if($this->request->is('post')){
            $this->Course->id = $this->data['id'];
            if ($this->Course->delete()) {
                return new CakeResponse(array('body' => json_encode(array('success'=>true))));
            }else{
                return new CakeResponse(array('body' => json_encode(array('msg'=>'Some errors occured.'))));
            }
        }
    }



}
