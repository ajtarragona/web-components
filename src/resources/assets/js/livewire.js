
$.fn.livewireCall = function(callback, ...args ){
    // console.log('callback:' + callback, args);
    var id=$(this).attr('wire:id');
    if(id){
        // console.log(id);
        var component=window.livewire.find(id);
        // console.log(component);
        if(component) component.call(callback, ...args);
    }
    return this;
    //initNavs(this);
  };

  
document.addEventListener("livewire:load", function(event) {

  Livewire.hook('message.received', (message, component) => {

    // Add your custom JavaScript here.
    // console.log('beforeDomUpdate');
    // var element = $('[wire\\:id='+ component.id +']');
    // element.startLoading();
  });
  Livewire.hook('message.processed', (message, component) => {
        // console.log('afterDomUpdate', component.id);
      // al($('[wire:id="'+component.id+'"]'));
      var element = $('[wire\\:id='+ component.id +']');
      // al(element);
      element.tgnInitAll();
      $('body > .bs-container.dropdown.bootstrap-select').remove();
      $('body > .colorpicker-bs-popover').remove();
    });
    
    // window.livewire.hook('beforeDomUpdate', (component) => {
    //   });
     
    //   window.livewire.hook('afterDomUpdate', (component) => {

    //     // console.log('afterDomUpdate', component.id);
    //     // al($('[wire:id="'+component.id+'"]'));
    //     var element = $('[wire\\:id='+ component.id +']');
    //     // al(element);
    //     element.tgnInitAll();
    //     $('body > .bs-container.dropdown.bootstrap-select').remove();
    //     $('body > .colorpicker-bs-popover').remove();
    // });
  });