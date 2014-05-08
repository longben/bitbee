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
    </span>
</div>



<script type="text/javascript">

$('#dg').datagrid({
    url:'/admin/ga/assignments/json_data.json',
    fitColumns:true,
    singleSelect:true,
    rownumbers:true,
    pagination:true,
    toolbar:'#toolbar',
    pageSize:15,
    onDblClickCell:editItem,
    columns:[[
        {field:'id',title:'序号',formatter:function(value,row){return row.Assignment.id},width:50},
        {field:'area',title:'所属地区',formatter:function(value,row){return row.Area.name},width:50},
        {field:'name',title:'企业名称',formatter:function(value,row){return row.Department.name},width:50},
        {field:'assignment_date',title:'作业时间',formatter:function(value,row){return row.Assignment.assignment_date},width:50},
        {field:'assignment_hour',title:'飞行小时量',formatter:function(value,row){return row.Assignment.assignment_hour},width:50},
        {field:'assignment_time',title:'飞行架次',formatter:function(value,row){return row.Assignment.assignment_time},width:50},
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
    url = '/admin/ga/assignments/add/';
    window.location = url;
}

function editItem(){
    var row = $('#dg').datagrid('getSelected');

    url = '/admin/ga/assignments/edit/' + row.Assignment.id;
    window.location = url;
}

function search(value, name){
    $('#dg').datagrid(
        'load',
        {q:value, field:name}
    );
}


</script>
