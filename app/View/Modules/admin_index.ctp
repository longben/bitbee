<table id="dg" class="easyui-datagrid" style="width:auto;height:auto"
    data-options="url:'/admin/modules/json_data.json',fitColumns:true,singleSelect:true,rownumbers:true,pagination:true,toolbar:'#toolbar',pageSize:20">
    <thead>  
        <tr>
            <th data-options="field:'id'">编号</th>  
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
    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-add', plain:true"  onclick="newItem()">新增模块</a>
    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-edit', plain:true"  onclick="editItem()">编辑模块</a>
    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-remove', plain:true"  onclick="deleteItem()">删除模块</a>
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
    <?php 
    echo $this->Form->create('Module', array('action' => 'add', 'id' => 'fm'));
    echo $this->Form->input('id');
    echo $this->Form->input('name', array('class' => 'easyui-validatebox' ,'required' => true));
    echo $this->Form->input('type');
    echo $this->Form->input('parent_id');
    echo $this->Form->input('module_image');
    echo $this->Form->input('url');
    echo $this->Form->end();
    ?>
</div>
<div id="dlg-buttons">
    <a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveItem()">保存</a>
    <a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">取消</a>
</div>



<script type="text/javascript">
    var url;

    function newItem(){
        $('#dlg').dialog('open').dialog('setTitle','新增模块');
        $('#fm').form('clear');
        url = '/admin/modules/add/';
    }

    function editItem(){
        var row = $('#dg').datagrid('getSelected');

        /**
        * 生成通用JSON格式
        *
        */ 
        var _row = '';
        for(var key in row){
            _row = _row + "'data[Module][" + key + "]':row." + key + ",";
        }
        _row = '{' + _row + 't:1}';

        var json = eval("("+ _row +")");

        if (row){
            $('#dlg').dialog('open').dialog('setTitle','编辑模块');
            $('#fm').form('load', json);
            url = '/admin/modules/edit/'+row.id;
        }
    }

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

    function deleteItem(){
        var row = $('#dg').datagrid('getSelected');
        if (row){
            $.messager.confirm('请确认','你是否要删除这条数据？',function(r){
                if (r){
                    $.post('<?=$this->Html->url('delete')?>',{id:row.id},function(result){
                        if (result.success){
                            $('#dg').datagrid('reload');	// reload the user data
                        } else {
                            $.messager.show({	// show error message
                                title: 'Error',
                                msg: result.msg
                            });
                        }
                    },'json');
                }
            });
        }
    }


    function search(value, name){
        $('#dg').datagrid(
            'load',
            {q:value, field:name}
        );
    }
</script>

