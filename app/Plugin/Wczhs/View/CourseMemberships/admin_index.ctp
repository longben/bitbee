<table id="dg" class="easyui-datagrid" style="width:auto;height:auto"
    data-options="url:'/admin/wczhs/course_memberships/json_data.json',fitColumns:true,singleSelect:true,rownumbers:true,pagination:true,toolbar:'#toolbar',pageSize:20">
    <thead>  
        <tr>
            <th data-options="field:'user_nicename',formatter:function(value,row){return row.User.user_nicename;}">宝宝</th>  
            <th data-options="field:'course_name',formatter:function(value,row){return row.Course.name;}">课程</th>  
            <th data-options="field:'patriarch',formatter:function(value,row){return row.CourseMembership.patriarch;}" width="50">家长</th>  
            <th data-options="field:'date_of_filing',formatter:function(value,row){return row.CourseMembership.date_of_filing;}" width="50">填表时间</th>
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

<div id="dlg" class="easyui-dialog" style="width:400px;height:auto;padding:10px 20px"
    closed="true" buttons="#dlg-buttons">
    <?php 
    echo $this->Form->create('CourseMembership', array('action' => 'add', 'id' => 'fm'));
    echo $this->Form->input('id', array('id' => 'id'));
    echo $this->Form->input('date_of_filing', array('type' => 'text', 'class' => 'easyui-datebox', 'required' => true));
    echo $this->Form->input('user_id');
    echo $this->Form->input('course_id');
    echo $this->Form->input('patriarch');
    echo $this->Form->input('interest');
    echo $this->Form->input('different');
    echo $this->Form->input('impression');
    echo $this->Form->input('extend');
    echo $this->Form->input('suggest');
    echo $this->Form->input('expression',array('lable' => '表现'));
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
        clearForm('#fm');
        url = '/admin/wczhs/course_memberships/add/';
    }

    function editItem(){
        var row = $('#dg').datagrid('getSelected');

        clearForm('#fm');
        /**
        * 生成通用JSON格式
        *
        */ 
        var _row = '';
        for(var key in row.CourseMembership){
            _row = _row + "'data[CourseMembership][" + key + "]':row.CourseMembership." + key + ",";
        }
        _row = '{' + _row + 't:1}';

        var json = eval("("+ _row +")");

        if (row){
            $('#dlg').dialog('open').dialog('setTitle','编辑模块');
            $('#fm').form('load', json);
            url = '/admin/wczhs/course_memberships/edit/'+row.id;
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

