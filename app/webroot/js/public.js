//
function clearForm(form){
    $(":input", form).each(function(){
        var type = this.type;
        var tag = this.tagName.toLowerCase();

        if(this.id == 'id' || this.id == 'file'){
            this.value = "";
        }

        if (type == 'text' || type == 'textarea'){
            this.value = "";
        }
    });
};

/*EasyUI 删除验证
*
* 删除的是普通的即非combo的方法：
* $("#addValidate2").validatebox('remove');  
* 删除的是combo的及其子对象的使用此方法
* $("#addValidate2").validatebox('remove',true);  
*
*/
$.extend($.fn.validatebox.methods, {  
    remove : function(jq, param) {  
        //console.error("ddd",$.data(jq[0], 'combo').combo);  
        var f = param ? param : false;  
        if (f) {  
            //动态combo  
            var v = $.data(jq[0], 'combo').combo.find('input.combo-text')[0];  
            var opts = $.data(jq[0], 'combo').options;  
            delete (opts.validType);  
            //主体面板  
            var panel = $.data(jq[0], 'combo').panel.find('div.combobox-item');  
            //console.error("items",panel.length);  
            //找到下拉箭头  
            var arrow = $.data(jq[0], 'combo').combo.find('.combo-arrow');  
            //删除所有的监听  
            arrow.unbind('.validatebox');  
        } else {  
            var v = jq[0];  
        }  

        if ($.data(v, 'validatebox')) {  
            //console.error("ddd11111",$.data(v,'validatebox').options);  
            var tip = $.data(v, 'validatebox').tip;  
            if (tip) {  
                tip.remove();  
            }  
            $(v).removeClass('validatebox-invalid');  
            $(v).removeClass('validatebox-text');  
            $(v).unbind('.validatebox');  
            $(v).die('focus');  
            $(v).removeData('validatebox');  
        }  
    }  
});  
