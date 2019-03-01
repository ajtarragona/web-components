require('./bootstrap');

require('./functions');

//import 'select2/dist/js/select2.js';

var lang='es';//currentLanguage();

require("bootstrap-select");

require("jquery-mask-plugin");

import 'jquery-ui/ui/widgets/draggable.js';
import 'jquery-ui/ui/widgets/sortable.js';
import 'jquery-ui/ui/widgets/droppable.js';
//import 'jquery-ui/ui/widgets/autocomplete.js';


require("flatpickr");
//require("flatpickr/dist/themes/material_green.css");


if(lang=='es'){
	require("bootstrap-select/dist/js/i18n/defaults-es_ES.js");
	require("flatpickr/dist/l10n/es.js").default.es;
}else if(lang=='ca'){
	require("flatpickr/dist/l10n/es.js").default.es;
	//require("bootstrap-select/dist/js/i18n/defaults-ca.js");
	//require("flatpickr/dist/l10n/cat.js").default.cat;
}


require('bootstrap-confirmation2/dist/bootstrap-confirmation.js');

//fileinput
require('bootstrap-fileinput/js/fileinput.js');
require('bootstrap-fileinput/themes/fa/theme.js');
//import 'bootstrap-fileinput/js/locales/'+lang+'.js';


//touchspin
require('bootstrap-touchspin/src/jquery.bootstrap-touchspin.js');

//iconpicker
require('fontawesome-iconpicker/dist/js/fontawesome-iconpicker.min.js');


//colorpicker
require('bootstrap-colorpicker/dist/js/bootstrap-colorpicker.js');


//tribute autocomplete

require('tributejs/dist/tribute.js');

//textarea autoheight
require('autosize/dist/autosize.js');


require('./vendor/typeahead.bundle.min.js');
require('bootstrap-tagsinput/dist/bootstrap-tagsinput.js');


//require('./vendor/bootstrap3-typeahead.min.js');


require('code-prettify/loader/prettify.js');
require('clipboard/dist/clipboard.js');




require('./forms');
require('./formcontrols');
require('./navs');
require('./flash');
require('./toolbar');
require('./sidebar');
require('./modals');
require('./tables');
require('./selects');
require('./maps');
require('./sessiontriggers');
require('./prettyprint');
require('./main');
