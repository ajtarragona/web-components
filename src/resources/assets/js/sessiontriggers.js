$.fn.initSessionTriggers = function(){
	this.find("[data-session-setting]").each(function(i){
		var ev="click";
		if($(this).data("session-event")) ev=$(this).data("session-event");
		
		al("initSessionTrigger: " + $(this).data("session-setting"));
			
		$(this).on(ev,function(e){
			var setting=$(this).data("session-setting");
			var value=$(this).data("session-value");
			//al("setSessionSetting("+setting+"="+value+")");

			if($(this).data("session-toggle")) value=((value==1)?0:1);
			
			var url = route('webcomponents.setting.set',{name:setting});
			
			$.ajax({
				url: url,
	            type: 'put',
	            data: { value : value, _token: csrfToken() },
	            dataType: 'json',
	            success: function(data){
	              // al(data);
	            },
	            error: function(xhr){
	              // al(xhr.status);
	            }
	        });
			
		});
	});

}