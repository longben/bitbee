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
        <?php echo $this->Form->create('Aircraft', array(
            'id' => 'fm',
            'inputDefaults' => array( 'div' => false, 'label' => false)
        ));
        ?>
        <table width="100%">
            <tr>
                <td algin="right">所属地区:</td>
                <td><?=$this->Form->input('area_id', array('options' => $areas))?></td>
                <td>航空器类别:</td>
                <td><?=$this->Form->input('type')?></td>
                <td>使用状态:</td>
                <td><?=$this->Form->input('status', array('options' => $status))?></td>
            </tr>
            <tr>
                <td>登记时间(起):</td>
                <td><?=$this->Form->input('r_start_date', array('class' => 'easyui-datebox'))?></td>
                <td>获得时间(起):</td>
                <td><?=$this->Form->input('p_start_date', array('class' => 'easyui-datebox'))?></td>
                <td>获得时间(止):</td>
                <td><?=$this->Form->input('p_end_date', array('class' => 'easyui-datebox'))?></td>
            </tr>
            <tr>
                <td>登记时间(止):</td>
                <td><?=$this->Form->input('r_end_date', array('class' => 'easyui-datebox'))?></td>
                <td>获得方式:</td>
                <td><?=$this->Form->input('procure_method', array('options' => $procure_methods))?></td>
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

function newItem2(){
    url = '/admin/ga/aircrafts/add/';
    window.location = url;
}

function newItem(){
    $('#dd').dialog({
        closed: false,
        cache: false,
        href: '/admin/ga/aircrafts/add',
        modal: true
    });
    $('#dd').dialog('open').dialog('setTitle','通用航空企业基础信息');
    $('#dd').dialog('maximize');
}

function editItem(){
    var row = $('#dg').datagrid('getSelected');

    url = '/admin/ga/aircrafts/edit/' + row.CorpAircraft.aircraft_id;
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
            area_id:$('#AircraftAreaId').val(),
            type:$('#AircraftType').val(),
            r_start_date:$('#AircraftRStartDate').datebox('getValue'),
            r_end_date:$('#AircraftREndDate').datebox('getValue'),
            p_start_date:$('#AircraftPStartDate').datebox('getValue'),
            p_end_date:$('#AircraftPEndDate').datebox('getValue'),
            procure_method:$('#AircraftProcureMethod').val(),
            status:$('#AircraftStatus').val(),
            keyword:$('#AircraftKeyword').val()
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
