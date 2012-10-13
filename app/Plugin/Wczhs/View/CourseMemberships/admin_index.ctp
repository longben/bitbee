<?php  echo $this->Html->script(array('jquery/jquery.linkageSelect'), array('inline' => false)); ?>

<table id="dg" class="easyui-datagrid" style="width:auto;height:auto"
    data-options="url:'/admin/wczhs/course_memberships/json_data.json',fitColumns:true,singleSelect:true,rownumbers:true,pagination:true,toolbar:'#toolbar',pageSize:20">
    <thead>  
        <tr>
            <th data-options="field:'display_name',formatter:function(value,row){return row.User.display_name;}">宝宝姓名</th>  
            <th data-options="field:'course_name',formatter:function(value,row){return row.Course.name;}">课程名称</th>  
            <th data-options="field:'patriarch',formatter:function(value,row){return row.CourseMembership.patriarch;}" width="50">家长名称</th>  
            <th data-options="field:'date_of_filing',formatter:function(value,row){return row.CourseMembership.date_of_filing;}" width="50">填表时间</th>
        </tr>  
    </thead>  
</table>  

<div id="toolbar">  
    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-add', plain:true"  onclick="newItem()">新增</a>
    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-edit', plain:true"  onclick="editItem()">编辑</a>
    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-remove', plain:true"  onclick="deleteItem()">删除</a>
    <span style="float:right;white-space:nowrap;clear: none;overflow:hidden; page-break-before: always;page-break-after: always;width:300px">
        <input class="easyui-searchbox" data-options="prompt:'请输入查询条件',menu:'#mm',searcher:function(value,name){search(value, name)}" style="width:300px"></input>
        <div id="mm" style="width:120px">
            <div data-options="name:'name',iconCls:'icon-user'">宝宝名称</div>
            <div data-options="name:'parent_id',iconCls:'icon-public'">家长名称</div>
        </div>
    </span>
</div> 

<div id="dlg" class="easyui-dialog" style="width:600px;height:auto;padding:10px 20px"
    closed="true" buttons="#dlg-buttons">
    <?php 
    $extends = array('1' => '有', '0' => '没有');
    echo $this->Form->create('CourseMembership', array('action' => 'add', 'id' => 'fm', 'class' => 'formee') );
    echo $this->Form->input('id', array('id' => 'id'));

    echo $this->Form->input('patriarch', array('div' => array('class' => 'grid-4-12'),'label'=>'填表家长'));
    echo $this->Form->input('date_of_filing', array('div' => array('class' => 'grid-4-12'), 'type' => 'text', 'class' => 'easyui-datebox', 'required' => true, 'label'=>'填表日期'));
    echo $this->Form->input('course_id', array( 'div' => array('class' => 'grid-4-12'), 'label'=>'课程') );

    echo $this->Form->input('department_id',array('id' => 'department','class' =>'dd', 'label' => '所在班级', 'div' => array('class' => 'grid-4-12 clear')));
    echo $this->Form->input('user_id',array('id' =>'user', 'class' => 'easyui-validatebox', 'label' => '宝宝名称', 'div' => array('class' => 'grid-8-12'),'required' => true));

    echo $this->Form->input('interest', array('div' => array('class' => 'grid-12-12'), 'label' => '宝宝今天上课对哪项活动最感兴趣'));

    echo $this->Form->input('different', array('div' => array('class' => 'grid-12-12'), 'label' => '宝宝今天上课什么地方不一样'));

    echo $this->Form->input('impression', array('div' => array('class' => 'grid-12-12'),'label' => '宝宝今天让你印象最深刻的是'));

    echo $this->Form->input('extend', array('options' => $extends, 'default' => '1','div' => array('class' => 'grid-4-12'),'label'=> '家庭延伸情况'));
    echo $this->Form->input('suggest', array('div' => array('class' => 'grid-8-12'),'label'=>'您的意见和建议'));

    echo $this->Form->input('expression', array('class' => 'easyui-validatebox', 'div' => array('class' => 'grid-12-12'), 'label' => '宝宝在活动中的具体表现','type'=>'textarea','required' => true));
    echo $this->Form->end();
    ?>
</div>
<div id="dlg-buttons">
    <a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveItem()">保存</a>
    <a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">取消</a>
</div>



<script type="text/javascript">
    var url;

    var options = {  
        ajax : '/admin/users/json_department.json'  
    }  
    var sel = new LinkageSelect(options);  
    sel.bind('#department');  
    sel.bind('#user');

    function newItem(){
        $('#dlg').dialog('open').dialog('setTitle','新增');
        clearForm('#fm');
        url = '/admin/wczhs/course_memberships/add/';
    }

    function editItem(){
        var row = $('#dg').datagrid('getSelected');

        var sel = new LinkageSelect(options);  
        sel.bind('#department', row.CourseMembership.department_id);  
        sel.bind('#user', row.CourseMembership.user_id);

        clearForm('#fm');
        /**
        * 生成通用JSON格式
        *
        */ 
        var _row = '';
        for(var key in row.CourseMembership){
            _row = _row + "'data[CourseMembership][" + key + "]':row.CourseMembership." + key + ",";
        }
        _row = '{' + _row + 't:1}';

        var json = eval("("+ _row +")");

        if (row){
            $('#dlg').dialog('open').dialog('setTitle','编辑');
            $('#fm').form('load', json);
            url = '/admin/wczhs/course_memberships/edit/'+row.id;
        }
    }

    function saveItem(){
        $('#fm').form('submit',{
            url: url,
            onSubmit: function(){
                return $(this).form('validate');
            },
            success: function(result){
                var result = eval('('+result+')');
                if (result.success){
                    $('#dlg').dialog('close');		// close the dialog
                    $('#dg').datagrid('reload');	// reload the user data
                } else {
                    $.messager.show({
                        title: 'Error',
                        msg: result.msg
                    });
                }
            }
        });
    }

    function deleteItem(){
        var row = $('#dg').datagrid('getSelected');
        if (row){
            $.messager.confirm('请确认','你是否要删除这条数据？',function(r){
                if (r){
                    $.post('<?=$this->Html->url('delete')?>',{id:row.CourseMembership.id},function(result){
                        if (result.success){
                            $('#dg').datagrid('reload');	// reload the user data
                        } else {
                            $.messager.show({	// show error message
                                title: 'Error',
                                msg: result.msg
                            });
                        }
                    },'json');
                }
            });
        }
    }


    function search(value, name){
        $('#dg').datagrid(
            'load',
            {q:value, field:name}
        );
    }



</script>

