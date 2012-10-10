<?php
    echo $this->Form->create('User', array('action' => 'add', 'id' => 'fm'));
    echo $this->Form->input('id');	
    echo $this->Form->input('user_login', array('label' => __d('wczhs', 'User Login'), 'class' => 'required',  'title' =>__('请输入登录名', true)));
    echo $this->Form->input('user_nicename', array('label' => __d('wczhs', 'Nice Name'), 'class' => 'required',  'title' =>__('请输入姓名', true)));
    echo $this->Form->input('Meta.birthday', array('label' =>  '出生日期', 'type' => 'text', 'class' => 'easyui-datebox', 'required' => true));
    echo $this->Form->input('Meta.join_date', array('label' => '入园日期', 'type' => 'text','class' => 'easyui-datebox', 'required' => true)); 
    echo $this->Form->input('user_email', array('label' => __d('wczhs', 'User Email'), 'class' => 'required email',  'title' =>__('请输入邮箱地址', true)));
    echo $this->Form->input('user_pass', array('label' => __d('wczhs', 'User Pass'), 'div' => array('id' => 'pwd'),'class' => 'required',  'title' =>__('请输入密码', true)));
    echo $this->Form->input('Meta.gender', array('label' => __d('wczhs', 'Gender')));
    echo $this->Form->input('Meta.telphone_number', array('label' => __d('wczhs', 'Telphone Number')));
    echo $this->Form->input('Meta.cell_number', array('label' => __d('wczhs', 'Cell Number')));
    echo $this->Form->input('Meta.father', array('label' => __d('wczhs', 'Father')));
    echo $this->Form->input('Meta.father_phone', array('label' => __d('wczhs', 'Father Phone')));
    echo $this->Form->input('Meta.mother', array('label' => __d('wczhs', 'Mother')));
    echo $this->Form->input('Meta.mother_phone', array('label' => __d('wczhs', 'Mother Phone')));
    echo $this->Form->input('Meta.role_id', array('label' => __d('wczhs', 'Role Name')));
    echo $this->Form->input('Meta.department_id',array('label' => __d('wczhs', 'Class Name')));
    echo $this->Form->end();