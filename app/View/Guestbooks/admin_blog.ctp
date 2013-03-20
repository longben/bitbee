<table id="dg" class="easyui-datagrid" style="width:auto;height:auto"
    data-options="url:'/admin/guestbooks/json_blog.json?object_id=<?=$object_id?>',fitColumns:true,singleSelect:true,rownumbers:true,pagination:true,toolbar:'#toolbar',pageSize:20">
    <thead>  
        <tr>
            <th data-options="field:'username'">留言者</th>  
            <th data-options="field:'telephone'" width="50">联系电话</th>  
            <th data-options="field:'email'" width="50">电子邮箱</th>  
            <th data-options="field:'flag'" width="50">是否回复</th>  
            <th data-options="field:'created'">留言时间</th>
        </tr>  
    </thead>  
</table>  

<div id="toolbar">  
    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-edit', plain:true"  onclick="editItem()">审核</a>
    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-remove', plain:true"  onclick="deleteItem()">删除</a>
</div> 

<div id="dlg" class="easyui-dialog" style="width:600px;height:auto;padding:10px 20px"
    closed="true" buttons="#dlg-buttons">
    <?php 
    echo $this->Form->create('Guestbook', array('action' => 'add', 'id' => 'fm', 'class' => 'formee'));
    echo $this->Form->input('id', array('id' => 'id'));
    echo $this->Form->input('content', array('type' => 'textarea', 'div' => array('class' => 'grid-12-12'), 'label' => '留言内容', 'style' => 'height:8em') );
    echo $this->Form->input('reply_content', array('type' => 'textarea', 'div' => array('class' => 'grid-12-12'), 'label' => '管理员回复内容'));
    echo $this->Form->end();
    ?>
</div>
<div id="dlg-buttons">
    <a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveItem()">保存</a>
    <a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">取消</a>
</div>



<script type="text/javascript">
    var url;

    function editItem(){

        clearForm('#fm');
        var row = $('#dg').datagrid('getSelected');

        /**
        * 生成通用JSON格式
        *
        */ 
        var _row = '';
        for(var key in row){
            _row = _row + "'data[Guestbook][" + key + "]':row." + key + ",";
        }
        _row = '{' + _row + 't:1}';

        var json = eval("("+ _row +")");

        if (row){
            $('#dlg').dialog('open').dialog('setTitle','编辑');
            $('#fm').form('load', json);
            url = '/admin/guestbooks/edit/'+row.id;
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

</script>
