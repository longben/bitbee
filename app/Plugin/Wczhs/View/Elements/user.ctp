<?php
	unset($departments[1]);
    echo $this->Form->create('User', array('action' => 'add', 'id' => 'fm'));
    echo $this->Form->input('id', array('id' => 'id'));	
    echo $this->Form->input('user_login', array('label' => '登 录 名', 'data-options' => 'required:true', 'class' => 'easyui-validatebox'));
    echo $this->Form->input('user_pass', array('label' => '登录密码', 'div' => array('id' => 'pwd'),'data-options' => 'required:true', 'class' => 'easyui-validatebox'));
	echo $this->Form->input('display_name', array('label' => '真实姓名', 'data-options' => 'required:true', 'class' => 'easyui-validatebox'));	
    echo $this->Form->input('user_nicename', array('label' => '昵　　称', 'class' => 'required',  'title' =>__('请输入昵称', true)));
    echo $this->Form->input('Meta.birthday', array('label' =>  '出生日期', 'type' => 'text', 'class' => 'easyui-datebox', 'required' => true));
    echo $this->Form->input('Meta.join_date', array('label' => '入园日期', 'type' => 'text','class' => 'easyui-datebox', 'required' => true)); 
    echo $this->Form->input('user_email', array('label' => '电子邮箱'));
    echo $this->Form->input('Meta.gender', array('label' => '性　　别'));
    echo $this->Form->input('Meta.father', array('label' => '爸爸姓名'));
    echo $this->Form->input('Meta.father_phone', array('label' => '爸爸手机'));
    echo $this->Form->input('Meta.mother', array('label' => '妈妈姓名'));
    echo $this->Form->input('Meta.mother_phone', array('label' => '妈妈手机'));
    echo $this->Form->hidden('Meta.role_id', array('value' => '2'));
    echo $this->Form->input('Meta.department_id',array('options' => $departments, 'label' => '所属班级'));
    echo $this->Form->end();
?>	
