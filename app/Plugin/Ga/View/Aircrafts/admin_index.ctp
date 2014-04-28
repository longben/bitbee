<table id="dg"></table>

<div id="toolbar">
    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-add', plain:true"  onclick="newItem()">新增</a>
    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-edit', plain:true"  onclick="editItem()">编辑</a>
    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-tip', plain:true"  onclick="deleteItem()">删除</a>

    <span style="float:right;white-space:nowrap;clear:none;overflow:hidden; page-break-before: always;page-break-after: always;width:300px">
        <input class="easyui-searchbox" data-options="prompt:'请输入查询条件',menu:'#mm',searcher:function(value,name){search(value, name)}" style="width:300px"></input>
        <div id="mm" style="width:120px">
            <div data-options="name:'GaDepartment.name',iconCls:'icon-user'">企业名称</div>
        </div>
        <input class="easyui-searchbox" data-options="prompt:'请输入查询条件',menu:'#mm2',searcher:function(value,name){search(value, name)}" style="width:300px"></input>
        <div id="mm2" style="width:120px">
            <div data-options="name:'GaDepartment.name',iconCls:'icon-user'">企业名称</div>
        </div>
    </span>
</div>



<script type="text/javascript">

$('#dg').datagrid({
    url:'datagrid_data.json',
    url:'/admin/ga/aircrafts/json_data.json',
    fitColumns:true,
    singleSelect:true,
    rownumbers:true,
    pagination:true,
    toolbar:'#toolbar',
    pageSize:15,
    onDblClickCell:editItem,
    columns:[[
        {field:'id',title:'序号',formatter:function(value,row){return row.Aircraft.id},width:50},
        {field:'region_id',title:'所属地区',formatter:function(value,row){return row.Region.name},width:50},
        {field:'licence',title:'经营许可证',formatter:function(value,row){return '民航通企字'+ row.Meta.licence + '号'},width:50},
        {field:'name',title:'企业名称',formatter:function(value,row){return row.GaDepartment.name},width:50},
        {field:'corporation',title:'法人代表',formatter:function(value,row){return row.Meta.corporation},width:50},
        {field:'registered_capital',title:'注册资本',formatter:function(value,row){return row.Meta.registered_capital},width:50},
        {field:'issuing_authority',title:'发证机关',formatter:function(value,row){return row.Meta.issuing_authority},width:50}
    ]]
});

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
    url = '/admin/ga/ga_departments/add/';
    window.location = url;
}

function editItem(){
    var row = $('#dg').datagrid('getSelected');

    url = '/admin/ga/ga_departments/edit/' + row.GaDepartment.id;
    window.location = url;
}

function search(value, name){
    $('#dg').datagrid(
        'load',
        {q:value, field:name}
    );
}


</script>
