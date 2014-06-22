<table id="dg"></table>

<div id="toolbar">
    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-add', plain:true"  onclick="newItem()">新增</a>
    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-edit', plain:true"  onclick="editItem()">编辑</a>
    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-remove',disabled:true, plain:true"  onclick="deleteItem()">删除</a>
    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-search', plain:true"  onclick="searchDialog()">查询</a>
    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-tip', plain:true" onclick="exp()">导出</a>

    <span style="float:right;white-space:nowrap;clear:none;overflow:hidden; page-break-before: always;page-break-after: always;width:300px">
        <input class="easyui-searchbox" data-options="prompt:'请输入查询条件',menu:'#mm',searcher:function(value,name){search(value, name)}" style="width:300px"></input>
        <div id="mm" style="width:120px">
            <div data-options="name:'Airport.name',iconCls:'icon-user'">机场名称</div>
        </div>
    </span>
</div>

<div id="dlg" class="easyui-dialog" title="查询"
    data-options="iconCls:'icon-search',closed:'true'" style="width:780px;height:200px;padding:10px" buttons="#dlg-buttons">
        <?php echo $this->Form->create('Airport', array(
            'id' => 'fm',
            'inputDefaults' => array( 'div' => false, 'label' => false)
        ));
        ?>
        <table width="100%">
            <tr>
                <td algin="right">所属地区:</td>
                <td><?=$this->Form->input('area_id', array('options' => $areas))?></td>
                <td>机场等级:</td>
                <td><?=$this->Form->input('grade')?></td>
                <td>机场类型:</td>
                <td><?=$this->Form->input('types')?></td>
            </tr>
            <tr>
                <td>启用时间(起):</td>
                <td><?=$this->Form->input('start_date', array('class' => 'easyui-datebox'))?></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>启用时间(止):</td>
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

$('#dg').datagrid({
    url:'/admin/ga/airports/json_data.json',
    fitColumns:true,
    singleSelect:true,
    rownumbers:true,
    pagination:true,
    striped:true,
    toolbar:'#toolbar',
    pageSize:15,
    pageList:[15,30,45,60],
    onDblClickCell:editItem,
    columns:[[
        {field:'id',title:'序号',formatter:function(value,row){return row.Airport.id},width:50},
        {field:'name',title:'机场名称',formatter:function(value,row){return row.Airport.name},width:50},
        {field:'area',title:'所属地区',formatter:function(value,row){return row.Area.name},width:50},
        {field:'active_time',title:'启用时间',formatter:function(value,row){return row.Airport.active_time},width:50},
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
    url = '/admin/ga/airports/add/';
    window.location = url;
}

function editItem(){
    var row = $('#dg').datagrid('getSelected');

    url = '/admin/ga/airports/edit/' + row.Airport.id;
    window.location = url;
}

function search(value, name){
    $('#dg').datagrid(
        'load',
        {q:value, field:name}
    );
}

function searchDialog(){
    $('#dlg').dialog('open').dialog('setTitle','通用航空机场信息查询');
}

function complex_query(){
    $('#dg').datagrid(
        'load',
        {
            area_id:$('#AirportAreaId').val(),
            grade:$('#AirportGrade').val(),
            type:$('#AirportType').val(),
            start_date:$('#AirportStartDate').datebox('getValue'),
            end_date:$('#AirportEndDate').datebox('getValue'),
            keyword:$('#AirportKeyword').val()
        }
    );
    $('#dlg').dialog('close');		// close the dialog
}

function exp(){
    var _url = '/admin/ga/airports/export.xls';
    var _json = $('#dg').datagrid('options').queryParams; //得到datagrid格式为JSON的参数

    var _form = $("<form>");   //定义一个form表单
    _form.attr('style','display:none');   //在form表单中添加查询参数
    _form.attr('target','');
    _form.attr('method','post');
    _form.attr('action', _url);

    var keys = Object.keys(_json);
    keys.forEach(function(key){
        var _input = $('<input>');
        _input.attr('type','hidden');
        _input.attr('name', key);
        _input.attr('value', _json[key]);
        _form.append(_input);   //将查询参数控件提交到表单上
    });

    $('body').append(_form);  //将表单放置在web中
    _form.submit();   //表单提交
}

</script>

