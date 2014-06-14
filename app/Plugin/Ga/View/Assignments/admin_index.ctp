<table id="dg"></table>

<div id="toolbar">
    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-add', plain:true"  onclick="newItem()">新增</a>
    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-edit', plain:true"  onclick="editItem()">编辑</a>
    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-tip', plain:true"  onclick="deleteItem()">删除</a>
    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-search', plain:true"  onclick="searchDialog()">查询</a>

    <span style="float:right;white-space:nowrap;clear:none;overflow:hidden; page-break-before: always;page-break-after: always;width:300px">
        <input class="easyui-searchbox" data-options="prompt:'请输入查询条件',menu:'#mm',searcher:function(value,name){search(value, name)}" style="width:300px"></input>
        <div id="mm" style="width:120px">
            <div data-options="name:'Department.name',iconCls:'icon-user'">企业名称</div>
        </div>
    </span>
</div>

<div id="dlg" class="easyui-dialog" title="查询"
    data-options="iconCls:'icon-search',closed:'true',draggable:'false'" style="width:790px;height:200px;padding:10px" buttons="#dlg-buttons">
        <?php echo $this->Form->create('Assignment', array(
            'id' => 'fm',
            'inputDefaults' => array( 'div' => false, 'label' => false)
        ));
        ?>
        <table width="100%">
            <tr>
                <td algin="right">所属地区:</td>
                <td><?=$this->Form->input('area_id', array('options' => $areas))?></td>
                <td>航空器类别:</td>
                <td><?=$this->Form->input('aircraft_type', array('options' => $types))?></td>
                <td>作业类型:</td>
                <td><?=$this->Form->input('scope', array('options' => $scopes))?></td>
            </tr>
            <tr>
                <td>作业时间(起):</td>
                <td><?=$this->Form->input('start_date', array('class' => 'easyui-datebox'))?></td>
                <td>起飞全重:</td>
                <td><?=$this->Form->input('netweight')?></td>
                <td</td>
                <td></td>
            </tr>
            <tr>
                <td>作业时间(止):</td>
                <td><?=$this->Form->input('end_date', array('class' => 'easyui-datebox'))?></td>
                <td></td>
                <td></td>
                <td>关键字:</td>
                <td><?=$this->Form->input('keyword')?></td>
            </tr>
        </table>
        <?php echo $this->Form->end();?>
</div>
<div id="dlg-buttons">
    <a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="complex_query()">查询</a>
    <a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">取消</a>
</div>

<script type="text/javascript">

var myview = $.extend({},$.fn.datagrid.defaults.view,{
    onAfterRender:function(target){
        $.fn.datagrid.defaults.view.onAfterRender.call(this,target);
        var opts = $(target).datagrid('options');
        var vc = $(target).datagrid('getPanel').children('div.datagrid-view');
        vc.children('div.datagrid-empty').remove();
        if (!$(target).datagrid('getRows').length){
            var d = $('<div class="datagrid-empty" style="height:40px"></div>').html(opts.emptyMsg || 'no records').appendTo(vc);
            d.css({
                left:0,
                top:50,
                width:'100%',
                textAlign:'center'
            });
        }
    }
});

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

function searchDialog(){
    $('#dlg').dialog('open').dialog('setTitle','通用航空器信息查询');
}

function search(value, name){
    $('#dg').datagrid(
        'load',
        {q:value, field:name}
    );
}

function complex_query(){
    $('#dg').datagrid(
        'load',
        {
            area_id:$('#AssignmentAreaId').val(),
            aircraft_type:$('#AssignmentAircraftType').val(),
            start_date:$('#AssignmentStartDate').datebox('getValue'),
            end_date:$('#AssignmentEndDate').datebox('getValue'),
            scope:$('#AssignmentScope').val(),
            netweight:$('#AssignmentNetweight').val(),
            keyword:$('#AssignmentKeyword').val()
        }
    );
    $('#dlg').dialog('close');		// close the dialog
    gridDisplay();
}

function gridDisplay(){
    var list=[];//数据列表为空
    $('#dg').datagrid({
        data: list,
        view: myview,
        emptyMsg: 'no records found'
    });
}

</script>

