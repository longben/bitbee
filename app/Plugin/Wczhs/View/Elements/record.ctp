<script charset="utf-8" src="/js/kindeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="/js/kindeditor/lang/zh_CN.js"></script>

<table id="dg" class="easyui-datagrid" style="width:auto;height:auto"
    data-options="url:'/admin/posts/json_data.json?c=201&u=<?=$this->Session->read('id')?>',fitColumns:true,singleSelect:true,rownumbers:true,pagination:true,toolbar:'#toolbar',pageSize:20">
    <thead>  
        <tr>
            <th data-options="field:'id'">编号</th>  
            <th data-options="field:'post_title'" width="100">标题</th>  
            <th data-options="field:'post_date'" width="50">发布时间</th>  
        </tr>  
    </thead>  
</table>  

<div id="toolbar">  
    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-add', plain:true"  onclick="newItem()">新增生活点滴记录</a>
    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-edit', plain:true"  onclick="editItem()">编辑</a>
    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-remove', plain:true"  onclick="deleteItem()">删除</a>
</div> 

<div id="dlg" class="easyui-dialog" style="width:770px;height:auto;padding:0px 0px"
    data-options="closed:true,buttons:'#dlg-buttons'">
		<?php 
        echo $this->Form->create('Post', array('inputDefaults' => array('label' => false), 'action' => 'add/', 'name' => 'fm', 'id' => 'fm', 'class' => 'formee'));
			echo $this->Form->input('id');
            echo $this->Form->input('post_title', array('div' => array('class' => 'grid-12-12'), 'type' => 'text', 'class' => 'required easyui-validatebox','style' => 'width:730px', 'data-options' => "required: true, missingMessage:'请输入标题'"));
            echo $this->Form->input('post_content', array('div' => array('class' => 'grid-12-12'),'style' => 'width:730px;height:300px;'));

			echo $this->Form->hidden('Module', array('value' => '201'));
			echo $this->Form->hidden('post_type', array('value' => 'post'));
			echo $this->Form->end();
		?>
</div>
<div id="dlg-buttons">
    <a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveItem()">保存</a>
    <a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">取消</a>
</div>

<div id="win" class="easyui-window" title="My Window" style="width:590px;height:400px" data-options="iconCls:'icon-save',modal:true,closed:true,buttons:'#dlg-buttons'"> </div>


<script type="text/javascript">
    var url;
    var editor = KindEditor.create('textarea[id="PostPostContent"]', {uploadJson: '/platforms/upload.json?u=<?=$this->Session->read('Auth.User.User.id')?>',allowFileManager : false});

    function newItem(){
        editor.remove();
        $('#dlg').dialog('open').dialog('setTitle','新增生活点滴记录');
        $('#fm').form('clear');
        url = '/admin/posts/add/201';

        editor.create();
        $('#dlg').center();

    }

    function editItem(){

        editor.remove();
        var row = $('#dg').datagrid('getSelected');

        /**
        * 生成通用JSON格式
        *
        */ 
        var _row = '';
        for(var key in row){
            _row = _row + "'data[Post][" + key + "]':row." + key + ",";
        }
        _row = '{' + _row + 't:1}';

        var json = eval("("+ _row +")");

        if (row){
            $('#dlg').dialog('open').dialog('setTitle','修改生活点滴记录');
            $('#fm').form('load', json);
            url = '/admin/posts/edit';
        }

        editor.create();
    }

    function saveItem(){
        $('#PostPostContent').val(editor.html());

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
            $.messager.confirm('请确认','你是否要删除这条生活记录？',function(r){
                if (r){
                    $.post('/admin/posts/delete',{id:row.id},function(result){
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
