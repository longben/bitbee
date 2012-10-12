<table id="dg" class="easyui-datagrid" style="width:auto;height:auto"
    data-options="url:'/admin/users/json_data.json',fitColumns:true,singleSelect:true,rownumbers:true,pagination:true,toolbar:'#toolbar',pageSize:20">
    <thead>  
        <tr>            
            <th width="50" data-options="field:'user_login',formatter:function(value,row){return row.User.user_login;}">登录名</th>  
			 <th width="50" data-options="field:'display_name',formatter:function(value,row){return row.User.display_name;}">真实姓名</th>              			
            <th width="50" data-options="field:'user_nicename',formatter:function(value,row){return row.User.user_nicename;}">昵称</th>               
            <th width="50" data-options="field:'user_registered',formatter:function(value,row){return row.User.user_registered;},sortable:true">注册时间</th>  
        </tr>  
    </thead>  
</table>  

<div id="toolbar">  
    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-add', plain:true"  onclick="newItem()">新增学员</a>
    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-edit', plain:true"  onclick="editItem()">编辑学员</a>
    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-tip', plain:true"  onclick="reset_pwd()">重置密码</a>

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
        $('#dlg').dialog('open').dialog('setTitle','新增学员');
        clearForm('#fm');

        $('#user_login').removeAttr("disabled")
        $('#user_login').validatebox({  
            required: true,  
            validType: "remote['/users/is_not_exists/user_login', 'user_login']",
            invalidMessage: "登录名不能重复"
        });

        $('#pwd').show();
        url = '/admin/users/add/';
    }

    function editItem(){
        var row = $('#dg').datagrid('getSelected');
        
        $('#user_login').attr("disabled","disabled");
        $("#user_login").validatebox('remove');

        $('#pwd').hide();

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

    function reset_pwd(){
        var row = $('#dg').datagrid('getSelected');
        if(row){
            $.messager.confirm('请确认','你是否要重置该用户密码？',function(r){
                if (r){
                    $.post("/admin/users/reset_pwd", {id:row.User.id},function(result){
                        var result = eval('('+result+')');
                        if (result.success){
                            $.messager.alert('密码重置','密码重置成功！<br/>密码重置为 <font color="red"><b>aaaaaa</b></font>','info');
                        } else {
                            $.messager.show({
                                title: 'Error',
                                msg: result.msg
                            });
                        }
                    });
                }
            });

        }
    }

    $('#dg').datagrid({
        onDblClickCell: function(index,field,value){
            editItem();
        }
    });
</script>

