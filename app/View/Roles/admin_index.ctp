<table id="dg" class="easyui-datagrid" style="width:auto;height:auto"
    data-options="url:'/admin/roles/json_data.json',fitColumns:true,singleSelect:true,rownumbers:true,pagination:true,toolbar:'#toolbar',pageSize:20">
    <thead>  
        <tr>
            <th data-options="field:'id'">编号</th>  
            <th data-options="field:'name'" width="50">名称</th>  
            <th data-options="field:'type'" width="50">类型</th>  
            <th data-options="field:'flag'" width="50">标志</th>
            <th data-options="field:'created'" width="50">创建时间</th>
        </tr>  
    </thead>  
</table>  

<div id="toolbar">  
    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-add', plain:true"  onclick="newItem()">新增角色</a>
    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-edit', plain:true"  onclick="editItem()">编辑角色</a>
    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-tip', plain:true"  onclick="roleAuth()">角色授权</a>
    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-remove', plain:true"  onclick="deleteItem()">删除角色</a>
    <span style="float:right;white-space:nowrap;clear: none;overflow:hidden; page-break-before: always;page-break-after: always;width:300px">
        <input class="easyui-searchbox" data-options="prompt:'请输入查询条件',menu:'#mm',searcher:function(value,name){search(value, name)}" style="width:300px"></input>
        <div id="mm" style="width:120px">
            <div data-options="name:'name',iconCls:'icon-user'">角色名称</div>
        </div>
    </span>
</div> 

<div id="dlg" class="easyui-dialog" style="width:400px;height:auto;padding:10px 20px"
    closed="true" buttons="#dlg-buttons">
    <?php 
    echo $this->Form->create('Role', array('action' => 'add', 'id' => 'fm'));
    echo $this->Form->input('id', array('id' => 'id'));
    echo $this->Form->input('name', array('label' => '角色名称', 'class' => 'easyui-validatebox' ,  'id' => 'name'));
    echo $this->Form->end();
    ?>

    <script type="text/javascript">
    $('#name').validatebox({  
        required: true,  
        validType: "remote['/admin/roles/isExists', 'name']"  
    });  
    </script>
</div>
<div id="dlg-buttons">
    <a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveItem()">保存</a>
    <a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">取消</a>
</div>


<div id="dlgAuth" class="easyui-dialog" style="width:240px;height:590px;padding:0px 0px"
    data-options="iconCls:'icon-save',modal:true,closed:true,buttons:'#dlgAuth-buttons'">
    <div id="role" style="height:520px;"></div>
</div>
<div id="dlgAuth-buttons">
    <a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveAuth()">保存</a>
    <a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgAuth').dialog('close')">取消</a>
</div>




<script type="text/javascript">
    var url;

    function roleAuth(){
        var row = $('#dg').datagrid('getSelected');

        if(row){
            $('#role').html('Loading...');
            $('#dlgAuth').dialog('open').dialog('setTitle','角色授权');
            $('#role').html('<iframe id="auth" scrolling="auto" frameborder="0"  src="/admin/roles/authorization/'+ row.id +'" style="width:100%;height:100%;"></iframe>');
        }
    }

    function saveAuth(){
        $("#auth").contents().find("#bbForm").form('submit',{
            url: '/admin/roles/authorization',
            success: function(result){
                var result = eval('('+result+')');
                if (result.success){
                    $('#dlgAuth').dialog('close');		// close the dialog
                    $.messager.alert('信息提示','<font color=blue>角色授权成功！</font>','info');
                } else {
                    $.messager.show({
                        title: 'Error',
                        msg: result.msg
                    });
                }
            }
        });

    }

    function newItem(){
        $('#dlg').dialog('open').dialog('setTitle','新增角色');
        clearForm('#fm');
        url = '/admin/roles/add/';
    }

    function editItem(){
        var row = $('#dg').datagrid('getSelected');
        clearForm('#fm');
        /**
        * 生成通用JSON格式
        *
        */ 
        var _row = '';
        for(var key in row){
            _row = _row + "'data[Role][" + key + "]':row." + key + ",";
        }
        _row = '{' + _row + 't:1}';

        var json = eval("("+ _row +")");

        if (row){
            $('#dlg').dialog('open').dialog('setTitle','编辑角色');
            $('#fm').form('load', json);
            url = '/admin/roles/edit/'+row.id;
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
                    $.post('<?=$this->Html->url('delete')?>',{id:row.id},function(result){
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

