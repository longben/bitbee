<script charset="utf-8" src="/js/kindeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="/js/kindeditor/lang/zh_CN.js"></script>

<table id="dg" class="easyui-datagrid" style="width:auto;height:auto"
    data-options="url:'/admin/posts/json_data.json?c=<?=BLOG_MODULE?>&u=<?=$this->Session->read('Auth.User.User.id')?>',fitColumns:true,singleSelect:true,rownumbers:true,pagination:true,toolbar:'#toolbar',pageSize:20">
    <thead>  
        <tr>
            <th data-options="field:'id'">编号</th>  
            <th data-options="field:'post_title'" width="100">标题</th>  
            <th data-options="field:'post_date'" width="50">发布时间</th>  
        </tr>  
    </thead>  
</table>  

<div id="toolbar">  
    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-add', plain:true"  onclick="newItem()">新增</a>
    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-edit', plain:true"  onclick="editItem()">编辑</a>
    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-tip', plain:true"  onclick="guestbook()">留言管理</a>
    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-remove', plain:true"  onclick="deleteItem()">删除</a>
    <span style="float:right;white-space:nowrap;clear: none;overflow:hidden; page-break-before: always;page-break-after: always;width:300px">
        <input class="easyui-searchbox" data-options="prompt:'请输入查询条件',menu:'#mm',searcher:function(value,name){search(value, name)}" style="width:300px"></input>
        <div id="mm" style="width:120px">
            <div data-options="name:'post_title',iconCls:'icon-user'">标题</div>
        </div>
    </span>
</div> 

<div id="dlg" class="easyui-dialog" style="width:800px;height:auto;padding:0px 0px"
    data-options="closed:true,buttons:'#dlg-buttons'">
    <?php 
    echo $this->Form->create('Post', array('inputDefaults' => array('label' => false), 'action' => 'add/', 'name' => 'fm', 'id' => 'fm'));
    echo $this->Form->input('id');

    $attributes = array('legend' => false, 'value' => false, 'data-options' => 'required: true');
    echo "所属栏目：".$this->Form->radio('Meta.tag', $tags, $attributes);

    echo $this->Form->input('post_title', array('type' => 'text', 'class' => 'required easyui-validatebox','style' => 'width:730px', 'data-options' => "required: true, missingMessage:'请输入文章标题'"));

    echo $this->Form->input('post_content', array('style' => 'width:730px;height:300px;'));

    //$attributes = array('legend' => false, 'value' => 'publish', 'data-options' => 'required: true');
    //$status = array('publish' => '上网发布', 'draft' => '草稿');
    //echo "发布状态：".$this->Form->radio('Post.post_status', $status, $attributes);

    echo $this->Form->hidden('Module', array('value' => BLOG_MODULE));
    echo $this->Form->hidden('post_type', array('value' => 'post'));
    echo $this->Form->end();
    ?>
</div>
<div id="dlg-buttons">
    <a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveItem()">保存</a>
    <a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">取消</a>
</div>

<div id="win" class="easyui-window" title="My Window" style="width:600px;height:400px" data-options="iconCls:'icon-save',modal:true,closed:true,buttons:'#dlg-buttons'"> </div>


<div id="dlgGuestbook" class="easyui-dialog" style="width:700px;height:auto;padding:0px 0px"
    data-options="iconCls:'icon-save',modal:true,closed:true">
    <div id="guestbook" style="height:500px"></div>
</div>



<script type="text/javascript">
    var url;
    var editor = KindEditor.create('textarea[id="PostPostContent"]', {uploadJson: '/platforms/upload.json?u=<?=$this->Session->read('Auth.User.User.id')?>',allowFileManager : false});

    function newItem(){
        editor.remove();
        $('#dlg').dialog('open').dialog('setTitle','新增');
        $('#fm').form('clear');
        url = '/admin/posts/add/<?=BLOG_MODULE?>';

        editor.create();
        $('#dlg').center();

    }

    function editItem(){

        editor.remove();
        var row = $('#dg').datagrid('getSelected');

        /**
        * 生成通用JSON格式
        *
        */ 
        var _row = '';
        for(var key in row){
            _row = _row + "'data[Post][" + key + "]':row." + key + ",";
        }


        var jqxhr = $.getJSON("/admin/posts/read/" + row.id,
            function(result){
                //_row = _row + "'data[Post][post_content]':'" + result.Post.post_content + "',";
                $("#PostPostContent").val(result.Post.post_content);
                _row = _row + "'data[Meta][tag]':'" + result.Meta.tag + "',";
            }).success(function() { 
                _row = '{' + _row + "t:1}";
                var json = eval("("+ _row +")");

                if (row){
                    $('#dlg').dialog('open').dialog('setTitle','编辑');
                    $('#fm').form('load', json);
                    url = '/admin/posts/edit';
                }
                editor.create();
            });

    }

    function saveItem(){
        $('#PostPostContent').val(editor.html());

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
                    $.post('/admin/posts/delete',{id:row.id},function(result){
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


    function guestbook(){
        var row = $('#dg').datagrid('getSelected');

        if(row){
            $('#guestbook').html('Loading...');
            $('#dlgGuestbook').dialog('open').dialog('setTitle','留言审核');
            $('#guestbook').html('<iframe id="auth" scrolling="auto" frameborder="0"  src="/admin/guestbooks/blog/'+ row.id +'" style="width:100%;height:100%;"></iframe>');
        }
    }
</script>
