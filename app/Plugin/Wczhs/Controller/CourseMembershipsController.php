<?php

/**
 * CourseMemberships Controller
 *
 */
class CourseMembershipsController extends WczhsAppController {

    public function admin_json_data(){
        if(isset($_GET['u'])){
            $this->findJSON4Grid('date_of_filing',array('CourseMembership.user_id' => $_GET['u']), 'DESC'); //
        }else{
            $this->findJSON4Grid('date_of_filing',null, 'DESC'); //
        }
    }

    public function admin_index(){

		$users = $this->CourseMembership->User->find('list');
		$courses = $this->CourseMembership->Course->find('list');

        $this->set(compact('users', 'courses'));

    }

    public function admin_add() {
        $this->autoRender = false;
        if (!empty($this->request->data)) {
            $this->CourseMembership->create();  
            if ($this->CourseMembership->save($this->request->data)) {
                return new CakeResponse(array('body' => json_encode(array('success'=>true))));
            } else {
                return new CakeResponse(array('body' => json_encode(array('msg'=>'Some errors occured.'))));
            }
        }
    }

    public function admin_edit() {
        $this->autoRender = false;
        if (!empty($this->request->data)) {    
            if ($this->CourseMembership->saveAll($this->request->data)) {
                return new CakeResponse(array('body' => json_encode(array('success'=>true, 'msg' => 'OK'))));
            } else {
                return new CakeResponse(array('body' => json_encode(array('msg'=>'Some errors occured.'))));
            }
        }
    }

    public function admin_delete() {
        if($this->request->is('post')){
            $this->CourseMembership->id = $this->data['id'];
            if ($this->CourseMembership->delete()) {
                return new CakeResponse(array('body' => json_encode(array('success'=>true))));
            }else{
                return new CakeResponse(array('body' => json_encode(array('msg'=>'Some errors occured.'))));
            }
        }
    }



}
