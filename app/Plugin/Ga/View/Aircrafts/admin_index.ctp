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
    url:'/admin/ga/corp_aircrafts/json_data.json',
    fitColumns:true,
    singleSelect:true,
    rownumbers:true,
    pagination:true,
    toolbar:'#toolbar',
    pageSize:15,
    pageList:[15,30,45,60],
    onDblClickCell:editItem,
    columns:[[
        {field:'id',title:'序号',formatter:function(value,row){return row.CorpAircraft.aircraft_id},width:50},
        {field:'region',title:'所属地区',formatter:function(value,row){return row.Area.name},width:50},
        {field:'department_id',title:'企业名称',formatter:function(value,row){return row.Department.name},width:50},
        {field:'registration_no',title:'国籍登记证',formatter:function(value,row){return row.CorpAircraft.registration_no},width:50},
        {field:'registration_flag',title:'国籍和登记标志',formatter:function(value,row){return row.CorpAircraft.registration_flag},width:50},
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
    url = '/admin/ga/aircrafts/add/';
    window.location = url;
}

function editItem(){
    var row = $('#dg').datagrid('getSelected');

    url = '/admin/ga/aircrafts/edit/' + row.CorpAircraft.aircraft_id;
    window.location = url;
}

function search(value, name){
    $('#dg').datagrid(
        'load',
        {q:value, field:name}
    );
}


</script>

