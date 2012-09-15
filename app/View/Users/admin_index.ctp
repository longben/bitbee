<table id="dg" class="easyui-datagrid" style="width:auto;height:auto"
    data-options="url:'/admin/users/json_data.json',fitColumns:true,singleSelect:true,rownumbers:true,pagination:true,toolbar:'#toolbar',pageSize:20">
    <thead>  
        <tr>
            <th data-options="field:'ID'">编号</th>  
            <th data-options="field:'user_login'">登录名</th>  
            <th data-options="field:'user_nicename'">姓名</th>  
            <th data-options="field:'user_activation_key', width:100">激活码</th>  
            <th data-options="field:'user_registered', sortable:true">注册时间</th>  
        </tr>  
    </thead>  
</table>  

<div id="toolbar">  
    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-add', plain:false"  onclick="new()">新增</a>
    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-tip', plain:false"  onclick="reset()">重置密码</a>

    <span style="float:right;white-space:nowrap;clear:none;overflow:hidden; page-break-before: always;page-break-after: always;width:300px">
        <input class="easyui-searchbox" data-options="prompt:'请输入查询条件',menu:'#mm',searcher:function(value,name){search(value, name)}" style="width:300px"></input>
        <div id="mm" style="width:120px">
            <div data-options="name:'user_nicename',iconCls:'icon-user'">姓名</div>
            <div data-options="name:'user_login',iconCls:'icon-public'">登录名</div>
        </div>
    </span>
</div> 

<script type="text/javascript">
    function search(value, name){
        $('#dg').datagrid(
            'load',
            {q:value, field:name}
        );
    }
</script>

