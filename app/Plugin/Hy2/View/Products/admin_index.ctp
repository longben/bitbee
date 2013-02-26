<?php $this->Html->script(array('kindeditor/kindeditor-min', 'kindeditor/lang/zh_CN'), array('inline' => false));?>



<table id="dg" class="easyui-datagrid" style="width:auto;height:auto"
    data-options="url:'/admin/hy2/products/json_data.json',fitColumns:true,singleSelect:true,rownumbers:true,pagination:true,toolbar:'#toolbar',pageSize:20">
    <thead>  
        <tr>
            <th data-options="field:'name'" width="50">名称</th>  
            <th data-options="field:'code_id'" width="50">备注</th>  
            <th data-options="field:'icon'" width="50">备注</th>  
            <th data-options="field:'locale'" width="50">编码</th>  
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
            <div data-options="name:'name',iconCls:'icon-user'">名称</div>
        </div>
    </span>
</div> 

<div id="dlg" class="easyui-dialog" style="width:800px;height:auto;padding:10px 20px"
    data-options="closed:true,buttons:'#dlg-buttons'">
    <?php 
    echo $this->Form->create('Product', array('action' => 'add', 'id' => 'fm', 'class' => 'formee', 'type' => 'file'));
    echo $this->Form->input('id', array('id' => 'id'));
    echo $this->Form->input('name');
    echo $this->Form->input('code_id');
    echo $this->Form->input('file', array('id' => 'file', 'label'=> '微缩图', 'type'=> 'file'));
    echo $this->Form->input('description', array('id' => 'editor' ,'style' => 'width:670px;height:auto'));
    echo $this->Form->end();
    ?>
</div>
<div id="dlg-buttons">
    <a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveItem()">保存</a>
    <a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">取消</a>
</div>



<script type="text/javascript">
    var url;
    //var editor = KindEditor.create('textarea[id="ProductDescription"]', {uploadJson: '/platforms/upload.json?u=<?=$this->Session->read('Auth.User.User.id')?>',allowFileManager : false});

    var editor;
    KindEditor.ready(function(K) {
        var options = {
            uploadJson : '/platforms/upload.json?u=<?=$this->Session->read('Auth.User.User.id')?>',
            allowFileManager : false
        };
        editor = K.create('textarea[id="editor"]', options);
    });


    function newItem(){
        $('#dlg').dialog('open').dialog('setTitle','新增');
        clearForm('#fm');
        url = '/admin/hy2/products/add/';
    }

    function editItem(){
        var row = $('#dg').datagrid('getSelected');

        clearForm('#fm');

        /**
        * 生成通用JSON格式
        *
        */ 
        var _row = '';
        for(var key in row){
            _row = _row + "'data[Product][" + key + "]':row." + key + ",";
        }
        _row = '{' + _row + 't:1}';

        var json = eval("("+ _row +")");

        if (row){
            $('#dlg').dialog('open').dialog('setTitle','编辑');
            $('#fm').form('load', json);
            url = '/admin/hy2/products/edit';

            editor.html(row.description);
            editor.sync();
        }

    }

    function saveItem(){
        editor.sync();
        $('#fm').form('submit',{
            url: url,
            onSubmit: function(){
                return $(this).form('validate');
            },
            success: function(result){
                var result = eval('('+result+')');
                if (result.success){
                    $('#dlg').dialog('close');		// close the dialog
                    $('#dg').datagrid('reload');
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

