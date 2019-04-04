// import bsCustomFileInput from 'bs-custom-file-input';

// initFileInputs = function(){
// 	bsCustomFileInput.init();
// }

/*$.fn.initFileInput = function(){
   return this.each(function(){
      var $input=$(this);
      al("initFileInput");
      var defaults={
        browseClass : 'btn btn-sm btn-light',
        removeClass : 'btn btn-sm btn-light',
        uploadClass : 'btn btn-sm btn-light'
      };  
          

      defaults = $.extend({}, defaults, $input.data()); 

      $input.fileinput(defaults);

      //al("initFileInput");
      if($input.closest('.file-input-container').find('.clear-button').length>0){
        var $btn=$input.closest('.file-input-container').find(".clear-button");

        $btn.initConfirm();
        $btn.on("click",function(){
          //al("CLICK");
          $(this).closest('.preview-container').remove();

          // $(this).closest('.input-wrapper').children('input[type=hidden]').val('');
          // $(this).closest('td').children('input[type=hidden]').val('');
          // $(this).closest('.input-wrapper').find('.file-caption-name').val('');
          // $(this).closest('td').find('.file-caption-name').val('');
          // $(this).parent().remove();
        });
    }

   });
}*/