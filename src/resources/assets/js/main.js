
$.fn.tgnInitAll = function( ){
  al('tgnInitAll', this);
  
  this.find(".tgn-modal-opener").tgnModal();
  this.find('.tgn-nav').tgnNav()
  this.find(".tgn-form").tgnForm();
  this.find("table.table").tgnTable();
  this.find('.tgn-ajax-table').tgnAjaxTable();
  
  this.find("select").tgnSelectPicker();
  this.find("input[type=date]").initDatePicker();
  this.find("input.dateinput").initDatePicker();
  this.find("input.number").initNumberInput();
  
  this.find('[data-toggle="tooltip"]').tooltip({boundary:'window'});
  this.find('[data-mascara]').initInputMask();
  //this.find('input[type=file]').initFileInput();
  this.find('input[type=icon]').initIconPicker();
  this.find('input.colorinput').initColorPicker();
  this.find('.google-map').tgnMap();
  
  this.find('.automention').initAutomention();
  this.find('.conditional-container').initConditional();
  this.find('.ajax-container').initAjaxContainer();
  this.find('textarea.autoheight').initAutoheight();
  this.find('input.autocomplete:not(.tt-input):not(.tt-hint):not([type=hidden])').tgnAutocomplete();
  this.find('[data-toggleclass]').initToggleClass();
  this.find('a[data-confirm], button[type=button][data-confirm]').initConfirm();
  this.find('pre.prettyprint').initPrettyprint();
  this.find('.text-editor').initTextEditor();
  this.find('.anim').initAnimation();
  this.find('[data-toggle="popover"]').initPopover();
  this.find('.ajax-button').initAjaxButton();

  
  
  this.initSessionTriggers();
  
  bsCustomFileInput.init();

  //initNavs(this);
  return this;
};



onWindowLoad(function() {
  // al("LOADED");
  $('html').stopLoading();
});



onWindowError(function (e) {
  console.error("ERROR Tgn",e);
  //$('body').tgnInitAll();
  $('html').stopLoading();
});




import bsCustomFileInput from 'bs-custom-file-input';

$('html').startLoading();


onDocumentReady(function(){
// $(document).ready(function(){
  // al("READY");

  $('body').tgnInitAll();
  initSidebar();
	initToolbar();
  initFlashMessages();
  // throw "NoDID";
 
  //initFileInputs();

  // al(__('ajtarragona-web-components::strings.confirmation'));
  // al(__('ajtarragona-web-components::auth.throttle',{seconds:2}));

});
