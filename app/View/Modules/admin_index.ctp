<table id="dg" class="easyui-datagrid" style="width:auto;height:auto"
    data-options="url:'/admin/modules/json_data.json',fitColumns:true,singleSelect:true,rownumbers:true,pagination:true,toolbar:'#toolbar',pageSize:20">
    <thead>  
        <tr>
            <th data-options="field:'Module.id'">编号</th>  
            <th data-options="field:'name'" width="50">名称</th>  
            <th data-options="field:'type'" width="50">类型</th>  
            <th data-options="field:'parent_id'" width="50">父系编号</th>  
            <th data-options="field:'hierarchy'" width="50">级别</th>
            <th data-options="field:'node'" width="50">NODE</th>
            <th data-options="field:'module_image'" width="50">图标</th>
            <th data-options="field:'url'">链接地址</th>
            <th data-options="field:'flag'" width="50">标志</th>
        </tr>  
    </thead>  
</table>  

<div id="toolbar">  
    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-add', plain:true"  onclick="newModule()">新增</a>
    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-edit', plain:true"  onclick="editModule()">编辑</a>
    <span style="float:right;white-space:nowrap;clear: none;overflow:hidden; page-break-before: always;page-break-after: always;width:300px">
        <input class="easyui-searchbox" data-options="prompt:'请输入查询条件',menu:'#mm',searcher:function(value,name){search(value, name)}" style="width:300px"></input>
        <div id="mm" style="width:120px">
            <div data-options="name:'name',iconCls:'icon-user'">模块名称</div>
            <div data-options="name:'parent_id',iconCls:'icon-public'">父系编码</div>
        </div>
    </span>
</div> 

	<div id="dlg" class="easyui-dialog" style="width:400px;height:280px;padding:10px 20px"
			closed="true" buttons="#dlg-buttons">
		<div class="ftitle">User Information</div>
        <?php echo $this->Form->create('Module', array('action' => 'add', 'id' => 'fm'));?>
<?php
echo $this->Form->input('name');
echo $this->Form->input('type');
echo $this->Form->input('parent_id');
echo $this->Form->input('module_image');
echo $this->Form->input('url');
echo $this->Form->submit('Submit');
?>
<?php echo $this->Form->end();?>
	</div>
	<div id="dlg-buttons">
		<a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveUser()">Save</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">Cancel</a>
	</div>



<script type="text/javascript">
		var url;
		function newModule(){
			$('#dlg').dialog('open').dialog('setTitle','New User');
			$('#fm').form('clear');
			url = 'save_user.php';
		}

		function editModule(){
			var row = $('#dg').datagrid('getSelected');


			if (row){
				$('#dlg').dialog('open').dialog('setTitle','Edit User');
                $('#fm').form('load',{'data[Module][name]':row.name});
				url = 'update_user.php?id='+row.id;
			}
		}



    function search(value, name){
        $('#dg').datagrid(
            'load',
            {q:value, field:name}
        );
    }
</script>

