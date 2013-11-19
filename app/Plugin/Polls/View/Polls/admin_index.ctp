<table id="dg" class="easyui-datagrid" style="width:auto;height:auto"
    data-options="url:'/admin/polls/polls/json_data.json',fitColumns:true,singleSelect:true,rownumbers:true,pagination:true,toolbar:'#toolbar',pageSize:20">
    <thead>
        <tr>
            <th data-options="field:'id'">编号</th>
            <th data-options="field:'question'" width="50">名称</th>
            <th data-options="field:'description'" width="50">描述</th>
            <th data-options="field:'created'">生成时间</th>
        </tr>
    </thead>
</table>

<div id="toolbar">
    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-add', plain:true"  onclick="newItem()">新增</a>
    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-edit', plain:true"  onclick="editItem()">编辑</a>
    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-remove', plain:true"  onclick="deleteItem()">删除</a>
    <span style="float:right;white-space:nowrap;clear: none;overflow:hidden; page-break-before: always;page-break-after: always;width:300px">
        <input class="easyui-searchbox" data-options="prompt:'请输入查询条件',menu:'#mm',searcher:function(value,name){search(value, name)}" style="width:300px"></input>
        <div id="mm" style="width:120px">
            <div data-options="name:'name',iconCls:'icon-user'">模块名称</div>
            <div data-options="name:'parent_id',iconCls:'icon-public'">父系编码</div>
        </div>
    </span>
</div>


<div id="dlgPoll" class="easyui-dialog" style="width:400px;height:auto;padding:0px 0px"
    data-options="iconCls:'icon-save',modal:true,closed:true,buttons:'#dlgPoll-buttons'">
    <div id="poll" style="height:520px;"></div>
</div>
<div id="dlgPoll-buttons">
    <a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="savePoll()">保存</a>
    <a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgPoll').dialog('close')">取消</a>
</div>


<div id="dlg" class="easyui-dialog" style="width:400px;height:auto;padding:10px 20px"
    closed="true" buttons="#dlg-buttons">
    <?php
    echo $this->Form->create('Poll', array('action' => 'add', 'id' => 'fm', 'class' => 'formee'));
    echo $this->Form->input('id', array('id' => 'id'));
    echo $this->Form->input('question', array('class' => 'easyui-validatebox' ,'required' => true));
    echo $this->Form->input('description', array('label' => '描述'));
    ?>

    <div class="grid-12-12">
      <label for="id_password">文章分类</label>
      <label><a href="javascript:;" id="add">添加</a> | <a href="#" id="remove">删除</a></label>
      <div class="inputs">
        <?php foreach($menus as $i => $menu):?>
        <div><input type="text" class="field mm" id="menu" name="data[Menu][<?=$i?>][name]" value="<?php echo $menu['Menu']['name']?>"/></div>
        <div><input type="hidden" name="data[Menu][<?=$i?>][id]" value="<?php echo $menu['Menu']['id']?>"/></div>
        <?php endforeach;?>
      </div>
    </div>
    <?php
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
        $('#poll').html('Loading...');
        $('#dlgPoll').dialog('open').dialog('setTitle','新增投票');
        $('#poll').html('<iframe id="poll" scrolling="auto" frameborder="0"  src="/admin/polls/polls/add/" style="width:100%;height:100%;"></iframe>');
    }


    function editItem(){
        var row = $('#dg').datagrid('getSelected');
        if (row){
            $('#poll').html('Loading...');
            $('#dlgPoll').dialog('open').dialog('setTitle','编辑投票');
            $('#poll').html('<iframe id="poll" scrolling="auto" frameborder="0"  src="/polls/polls/edit/' + row.id + '" style="width:100%;height:100%;"></iframe>');
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


    function savePoll(){
        $("#poll").contents().find("#bbForm").form('submit',{
            url: '/admin/polls/polls/add',
            success: function(result){
                var result = eval('('+result+')');
                if (result.success){
                    $('#dlgPoll').dialog('close');		// close the dialog
                    $.messager.alert('信息提示','角色授权成功！','info');
                } else {
                    $.messager.show({
                        title: 'Error',
                        msg: result.msg
                    });
                }
            }
        });
    }
</script>
