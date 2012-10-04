<?php
App::uses('WczhsAppController', 'Wczhs.Controller');
/**
 * CourseMemberships Controller
 *
 */
class CourseMembershipsController extends WczhsAppController {

    public function admin_json_data(){
        $this->findJSON4Grid('id',null, 'ASC'); //
    }

    public function admin_index(){

    }
}
