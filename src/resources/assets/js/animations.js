var ANIMS=[];


animScrollManager = function(){
	//al(ANIMS);
	for(i in ANIMS){
		var anim=ANIMS[i];
		if(anim.settings.scrollwatch){
			// al(anim.settings);
			// al(anim.$element);
			// al(anim.$element.isInViewport());
			if(anim.$element.isInViewport().length >0) anim.$element.addClass('in');//.removeClass('out');
			else anim.$element.removeClass('in');//.addClass('out');
		}else{
			anim.$element.addClass('in');
		}
	}
}	


$.fn.initAnimation = function(options){

   var ret=this.each(function(){
    //  al("initAnimation()");
     this.$element=$(this);
     
     this.settings = {
		scrollwatch : true
	 }	
     if(this.$element.data()) this.settings = $.extend(true, {}, this.settings,  this.$element.data()); 
     if(options) this.settings = $.extend({}, this.settings, options); 
	 //al(this);
     ANIMS.push(this);


	});
	
	animScrollManager();
    return ret;
}

$(window).scroll(animScrollManager);