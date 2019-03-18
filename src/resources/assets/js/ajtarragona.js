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

if(lang=='es'){
	require("bootstrap-select/dist/js/i18n/defaults-es_ES.js");
	require("flatpickr/dist/l10n/es.js").default.es;
}else if(lang=='ca'){
	require("flatpickr/dist/l10n/es.js").default.es;
	//require("bootstrap-select/dist/js/i18n/defaults-ca.js");
	//require("flatpickr/dist/l10n/cat.js").default.cat;
}


require('bootstrap-confirmation2');

//fileinput
require('bootstrap-fileinput');
require('bootstrap-fileinput/themes/fa/theme.js');
//import 'bootstrap-fileinput/js/locales/'+lang+'.js';


//touchspin
require('bootstrap-touchspin');

//iconpicker
require('fontawesome-iconpicker');


//colorpicker
require('bootstrap-colorpicker');


//tribute autocomplete

require('tributejs');

//textarea autoheight
require('autosize');


require('./vendor/typeahead.bundle.min.js');
require('bootstrap-tagsinput');


//require('./vendor/bootstrap3-typeahead.min.js');


require('code-prettify/loader/prettify.js');
require('clipboard');


//rich text editor
require('quill');

require('is-in-viewport') 

require('./forms');
require('./formcontrols');
require('./navs');
require('./flash');
require('./toolbar');
require('./sidebar');
require('./modals');
require('./tables');
require('./autocomplete');
require('./selects');
require('./maps');
require('./sessiontriggers');
require('./prettyprint');
require('./animations');
require('./main');
