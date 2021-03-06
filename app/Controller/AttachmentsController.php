<?php
/**
 * Attachments Controller
 *
 * @property Attachment $Attachment
 */
class AttachmentsController extends AppController {


    public $uses = array('Attachment', 'Module');

    /**
     * 更加条件查询用户JSON数据
     *
     * @return JSON
     */
    public function admin_json_data(){
        $this->findJSON4Grid('id', array('Attachment.type_id' => $_GET['type'])); //不返回Admin用户
    }

    public function admin_index($type_id){

        $this->Module->id = $type_id;
        $msg = $this->Module->field('setting'); 


        $this->set(compact('msg', 'type_id'));
    }
	
    public function admin_video($type_id){
        App::uses('Folder', 'Utility');
        App::uses('File', 'Utility');

        $dir = new Folder(APP.'webroot'.DS.'upload'.DS.'video');
        $filePaths = $dir->find('.*\.flv');

        $this->set(compact('type_id', 'filePaths'));
    }	

    public function admin_add() {
        $this->autoRender = false;
        if (!empty($this->request->data)) {
            $this->Attachment->create();  
            if ($this->Attachment->save($this->request->data)) {
                return new CakeResponse(array('body' => json_encode(array('success'=>true))));
            } else {
                return new CakeResponse(array('body' => json_encode(array('msg'=>'Some errors occured.'))));
            }
        }
    }

    public function admin_edit() {
        $this->autoRender = false;
        if (!empty($this->request->data)) {    
            if ($this->Attachment->save($this->request->data)) {
                return new CakeResponse(array('body' => json_encode(array('success'=>true, 'msg' => 'OK'))));
            } else {
                return new CakeResponse(array('body' => json_encode(array('msg'=>'Some errors occured.'))));
            }
        }
    }

    public function admin_delete() {
        if($this->request->is('post')){
            $this->Attachment->id = $this->data['id'];
            if ($this->Attachment->delete()) {
                return new CakeResponse(array('body' => json_encode(array('success'=>true))));
            }else{
                return new CakeResponse(array('body' => json_encode(array('msg'=>'Some errors occured.'))));
            }
        }
    }

    public function flash_upload($session_id, $type_id = null, $object_id = null){
        $this->autoRender = false;
        if (!empty($this->request->data)) {
            $this->Attachment->create();
            $this->request->data['Attachment']['type_id'] = $type_id;  
            $this->request->data['Attachment']['object_id'] = $object_id;  
            if ($this->Attachment->save($this->request->data)) {
                return new CakeResponse(array('body' => json_encode(array('success'=>true))));
            } else {
                return new CakeResponse(array('body' => json_encode(array('msg'=>'Some errors occured.'))));
            }
        }
    }


}
