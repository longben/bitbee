<table id="dg" class="easyui-datagrid" style="width:auto;height:auto"
    data-options="url:'/admin/users/json_data.json',fitColumns:true,singleSelect:true,rownumbers:true,pagination:true,toolbar:'#toolbar',pageSize:20">
    <thead>  
        <tr>
            <th data-options="field:'id',formatter:function(value,row){return row.User.id;}">编号</th>  
            <th data-options="field:'user_login',formatter:function(value,row){return row.User.user_login;}">登录名</th>  
            <th data-options="field:'user_nicename',formatter:function(value,row){return row.User.user_nicename;}">姓名</th>  
            <th data-options="field:'user_activation_key',formatter:function(value,row){return row.User.user_activation_key;}, width:100">激活码</th>  
            <th data-options="field:'user_registered',formatter:function(value,row){return row.User.user_registered;},sortable:true">注册时间</th>  
        </tr>  
    </thead>  
</table>  

<div id="toolbar">  
    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-add', plain:true"  onclick="newItem()">新增用户</a>
    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-edit', plain:true"  onclick="editItem()">编辑用户</a>
    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-tip', plain:true"  onclick="reset()">重置密码</a>

    <span style="float:right;white-space:nowrap;clear:none;overflow:hidden; page-break-before: always;page-break-after: always;width:300px">
        <input class="easyui-searchbox" data-options="prompt:'请输入查询条件',menu:'#mm',searcher:function(value,name){search(value, name)}" style="width:300px"></input>
        <div id="mm" style="width:120px">
            <div data-options="name:'user_nicename',iconCls:'icon-user'">姓名</div>
            <div data-options="name:'user_login',iconCls:'icon-public'">登录名</div>
        </div>
    </span>
</div> 


<div id="dlg" class="easyui-dialog" style="width:400px;height:auto;padding:10px 20px"
    closed="true" buttons="#dlg-buttons">
    <?php
        if(empty($plugin)){
            echo $this->element('user');
        }else{
            echo $this->element('user', array(), array('plugin' => $plugin));
        }
    ?>
</div>

<div id="dlg-buttons">
    <a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveItem()">保存</a>
    <a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">取消</a>
</div>


<script type="text/javascript">
    var url;

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

    function newItem(){
        $('#dlg').dialog('open').dialog('setTitle','新增模块');
        clearForm('#fm');
        url = '/admin/users/add/';
    }

    function editItem(){
        var row = $('#dg').datagrid('getSelected');

        $('#pwd').empty();

        /**
        * 生成通用JSON格式
        *
        */ 
        var _row = '';
        for(var key in row.User){
            _row = _row + "'data[User][" + key + "]':row.User." + key + ",";
        }
        for(var key in row.Meta){
            _row = _row + "'data[Meta][" + key + "]':row.Meta." + key + ",";
        }
        _row = '{' + _row + 't:1}';


        var json = eval("("+ _row +")");

        if (row){
            $('#dlg').dialog('open').dialog('setTitle','编辑模块');
            $('#fm').form('load', json);
            url = '/admin/users/edit';
        }
    }

    function search(value, name){
        $('#dg').datagrid(
            'load',
            {q:value, field:name}
        );
    }

    $('#dg').datagrid({
        onDblClickCell: function(index,field,value){
            editItem();
        }
    });
</script>

