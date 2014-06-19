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


/**
 * 一般用于Select联动
 * proId: 第一级被选中的SELECT值，一般是父亲ID
 * targetSel: 第二级需要被修改的SELECT，一般是儿子的id。#id_name
 * http: 取联动数据的URL，一般是XML
 */
function showChildren(proId,targetSel,http){
    var sendData = "data[parent_id] = " + proId;
    targetSelect = $(targetSel);

    $.ajax({
        type: "POST",
        url: http,
        data: sendData,
        dataType: "xml",
        success: function(xml){
            targetSelect.find('option').remove();
            property = $(xml).find("children");
            if(property.length >0){
                for (var i=0,x=1;i<property.length;i++,x++){
                    name = $("name",property[i]).text();
                    value = $("id",property[i]).text();
                    targetSelect.append('<option value="'+ value +'">'+ name +'</option>');
                }
            }
        }
    });
}

//阿拉伯数字转中文大写
function Arab2Chinese(n) { //金额大写转换函数
    if (!/^(0|[1-9]\d*)(\.\d+)?$/.test(n)){
        //alert("数据非法");
    }else{
        var unit = "千百拾亿千百拾万千百拾元角分";
        var str = "";
        n += "00";
        var p = n.indexOf('.');
        if (p >= 0)
            n = n.substring(0, p) + n.substr(p + 1, 2);
        unit = unit.substr(unit.length - n.length);
        for (var i = 0; i < n.length; i++)
        str += '零壹贰叁肆伍陆柒捌玖'.charAt(n.charAt(i)) + unit.charAt(i);
        return str.replace(/零(千|百|拾|角)/g, "零").replace(/(零)+/g, "零").replace(/零(万|亿|元)/g, "$1").replace(/(亿)万|壹(拾)/g, "$1$2").replace(/^元零?|零分/g, "").replace(/元$/g, "元整");
    }
}


function ConvertFormToJSON(form){
			var array = $(form).serializeArray();
			var json = {};

			jQuery.each(array, function() {
				json[this.name] = this.value || '';
			});

			return json;
}

$.fn.serializeObject = function()
{
    var o = {};
    var a = this.serializeArray();
    $.each(a, function() {
        if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};

//将数字转为货币格式
function toMoeny(price, chars) {
    chars = chars ? chars.toString() : '￥';
    if(price > 0) {
        var priceString = price.toString();
        var priceInt = parseInt(price);
        var len = priceInt.toString().length;
        var num = len / 3;
        var remainder = len % 3;
        var priceStr = '';
        for(var i = 1; i <= len; i++) {
            priceStr += priceString.charAt(i-1);
            if(i == (remainder) && len > remainder) priceStr += ',';
            if((i - remainder) % 3 == 0 && i < len && i > remainder) priceStr += ',';
        }
        if(priceString.indexOf('.') < 0) {
            //priceStr = priceStr + '.00';
            priceStr = priceStr;
        } else {
            priceStr += priceString.substr(priceString.indexOf('.'));
            if(priceString.length - priceString.indexOf('.') - 1  < 2) {
                priceStr = priceStr + '0';
            }
        }
        return chars + priceStr;
    }
    else{
        return chars + price;
    }
}

//将JSON转换成数组
function json2array(json){
    var result = [];
    var keys = Object.keys(json);
    keys.forEach(function(key){
        result.push(json[key]);
    });
    return result;
}

