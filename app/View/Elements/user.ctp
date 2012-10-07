<?php
    echo $this->Form->create('User', array('action' => 'add', 'id' => 'fm'));
    echo $this->Form->input('id');
    echo $this->Form->input('user_login', array('class' => 'required',  'title' =>__('请输入登录名', true)));
    echo $this->Form->input('user_nicename', array('label' => '姓名', 'class' => 'required',  'title' =>__('请输入姓名', true)));
    echo $this->Form->input('user_email', array('class' => 'required email',  'title' =>__('请输入邮箱地址', true)));
    echo $this->Form->input('user_pass', array('div' => array('id' => 'pwd'),'class' => 'required',  'title' =>__('请输入密码', true)));
    echo $this->Form->input('Meta.gender');
    echo $this->Form->input('Meta.telphone_number');
    echo $this->Form->input('Meta.cell_number');
    echo $this->Form->input('Meta.role_id');
    echo $this->Form->input('Meta.department_id',array('label' => '部门'));
    echo $this->Form->end();