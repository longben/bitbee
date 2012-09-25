KindEditor.plugin('save', function(K) {
    var editor = this, name = 'save';

    // 点击图标时执行
    editor.clickToolbar(name, function() {
        
        $('#PlatformContent').val(editor.html());
        $('#bbForm').form('submit',{
            url: '/admin/platforms/save_element',
            onSubmit: function(){
                //return $(this).form('validate');
            },

            success: function(result){
                var result = eval('('+result+')');
                if (result.success){
                    alert('保存成功！');
                } else {
                    $.messager.show({
                        title: 'Error',
                        msg: result.msg
                    });
                }
            }
        });


    });
});
