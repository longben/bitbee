//
function clearForm(form){
	$(":input", form).each(function(){
		var type = this.type;
		var tag = this.tagName.toLowerCase();

        if(this.id == 'id' || this.id == 'file'){
            this.value = "";
        }

		if (type == 'text'){
			this.value = "";
		}
	});
};
