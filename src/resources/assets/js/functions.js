al = function (msg, params){
  if(params)
	   console.log(msg,params);
  else
     console.log(msg);
}

__ = function( text, params ){
  if(Lang){
    return Lang.get(text,params)
  }else{
    return text;
  }
}

___ = function( text, params ){
  if(Lang){
    return Lang.get('ajtarragona-web-components::'+text,params)
  }else{
    return text;
  }
}
_icon = function( text , style){
  return "<i class='fa fa-"+text+"' "+ (style?('style="'+style+'"'):'') +"></i>";
}

currentLanguage = function( ){
  return $('html').attr('lang');
}


baseUrl = function( ){
 return $('meta[name="base-url"]').attr('content');
 
}


_UUID = function (prefix){
    var randLetter = String.fromCharCode(65 + Math.floor(Math.random() * 26));
    var uniqid = randLetter + Date.now();
    return uniqid;
}




htmlspecialchars = function(str) {
 if (typeof(str) == "string") {
  str = str.replace(/&/g, "&amp;"); /* must do &amp; first */
  str = str.replace(/"/g, "&quot;");
  str = str.replace(/'/g, "&#039;");
  str = str.replace(/</g, "&lt;");
  str = str.replace(/>/g, "&gt;");
  }
 return str;
}
rhtmlspecialchars = function(str) {
 if (typeof(str) == "string") {
  str = str.replace(/&gt;/ig, ">");
  str = str.replace(/&lt;/ig, "<");
  str = str.replace(/&#039;/g, "'");
  str = str.replace(/&quot;/ig, '"');
  str = str.replace(/&amp;/ig, '&'); /* must do &amp; last */
  }
 return str;
}

// route = function( name, params ){
//   al(Ziggy);
//   //return laroute.route(name,params);
// }

csrfToken = function( ){
 return $('meta[name="csrf-token"]').attr('content');
}

getBool = function( val ){
 return !!JSON.parse(String(val).toLowerCase());
}


$new = function(tag,target,args){
  var o=$('<'+tag+'>');
  if(args){
    if(args.classname) o.attr('class',args.classname);
    if(args.id) o.attr('id',args.id);
  }
  if(target.length>0) target.append(o);
  return o;
}


String.prototype.replaceAll = String.prototype.replaceAll || function(str1, str2,ignore) {
  return this.replace(new RegExp(str1.replace(/([\/\,\!\\\^\$\{\}\[\]\(\)\.\*\+\?\|\<\>\-\&])/g,"\\$&"),(ignore?"gi":"g")),(typeof(str2)=="string")?str2.replace(/\$/g,"$$$$"):str2);
};


executeFunctionByName = function(functionName, context , args) {
  //al("executeFunctionByName: "+functionName);
  var args = Array.prototype.slice.call(arguments, 2);
  //al("executeFunctionByName");
 // al(args);
  var namespaces = functionName.split(".");
  var func = namespaces.pop();
  //al(func);

  for (var i = 0; i < namespaces.length; i++) {
    context = context[namespaces[i]];
  }
  //al(context);
  if(context[func]){
    return context[func].apply(context, args);
  }
}


executeCallback = function(func , params ){
  
  if (func){
    if(typeof func == "function") {
      func(params);
    }else{
      executeFunctionByName(func,window,params);
    }
  }
}


 $.fn.scrollToElement = function($element) {
  var top= $element.offset().top;
  if($('#maintoolbar').length>0) top-=$('#maintoolbar').height();

  return this.animate({
      scrollTop: (top)
  },300);
};



 $.fn.disableSelection = function() {
    return this
             .attr('unselectable', 'on')
             .css('user-select', 'none')
             .on('selectstart', false);
};

$.fn.serializeControls = function() {
  var data = {};

  function buildInputObject(data, arr, val) {
    if(!data) data={};
        
    if (arr.length < 1)
      return val;  
    var objkey = arr[0];
    if (objkey.slice(-1) == "]") {
      objkey = objkey.slice(0,-1);
    }  
    var result = {};
    if (arr.length == 1){
      result[objkey] = val;
    } else {
      arr.shift();
      if(arr[0]=="]"){
        if(!data.hasOwnProperty(objkey)) data[objkey]=[];
        data[objkey].push(val);
      }else{
        var nestedVal = buildInputObject(data[objkey],arr,val);
        result[objkey] = nestedVal;
      }
    }
    return result;
  }
  var fields=this.serializeArray();
  // al("serializeControls");
  //al(fields);
  $.each(fields, function() {
    var val = this.value;
    try{ 
      if(typeof $.parseJSON(val)  =='object') val=$.parseJSON(val);
    }catch(e){
      
    }
    
    var c = this.name.split("[");
    var a = buildInputObject(data, c, val);
    $.extend(true, data, a);
  });
  //al(data);
  return data;
}



$.fn.selectText = function() {
    this.find('input').each(function() {
        if($(this).prev().length == 0 || !$(this).prev().hasClass('p_copy')) { 
            $('<p class="p_copy" style="position: absolute; z-index: -1;"></p>').insertBefore($(this));
        }
        $(this).prev().html($(this).val());
    });
    var doc = document;
    var element = this[0];
    //console.log(this, element);
    if (doc.body.createTextRange) {
        var range = document.body.createTextRange();
        range.moveToElementText(element);
        range.select();
    } else if (window.getSelection) {
        var selection = window.getSelection();        
        var range = document.createRange();
        range.selectNodeContents(element);
        selection.removeAllRanges();
        selection.addRange(range);
    }
    return this;
}





$.fn.startLoading = function( ){
  this.addClass('loading');
  return this;
  //initNavs(this);
};

$.fn.stopLoading = function( ){
  this.removeClass('loading').addClass("loaded");
  return this;
  //initNavs(this);
};


function getMonthIndex(name) {
    name = name.toLowerCase();
    if (name == "jan" || name == "january") {
        return 0;
    } else if (name == "feb" || name == "february") {
        return 1;
    } else if (name == "mar" || name == "march") {
        return 2;
    } else if (name == "apr" || name == "april") {
        return 3;
    } else if (name == "may" || name == "may") {
        return 4;
    } else if (name == "jun" || name == "june") {
        return 5;
    } else if (name == "jul" || name == "july") {
        return 6;
    } else if (name == "aug" || name == "august") {
        return 7;
    } else if (name == "sep" || name == "september") {
        return 8;
    } else if (name == "oct" || name == "october") {
        return 9;
    } else if (name == "nov" || name == "november") {
        return 10;
    } else if (name == "dec" || name == "december") {
        return 11;
    }
}

String.prototype.strToDate = String.prototype.strToDate || function(format, delimiter) {
    var date = this;
    var formatedDate = null;
    var formatLowerCase = format.toLowerCase();
    var formatItems = formatLowerCase.split(delimiter);
    var dateItems = date.split(delimiter);
    var monthIndex = formatItems.indexOf("mm");
    var monthNameIndex = formatItems.indexOf("mmm");
    var dayIndex = formatItems.indexOf("dd");
    var yearIndex = formatItems.indexOf("yyyy");
    var d = dateItems[dayIndex];
    if (d < 10) {
      d = "0"+ d;
    }
    if (monthIndex > -1) {
        var month = parseInt(dateItems[monthIndex]);
        month -= 1;
        if (month < 10) {
            month = "0" + month;
        }
        formatedDate = new Date(dateItems[yearIndex], month, d);
    } else if (monthNameIndex > -1) {
        var monthName = dateItems[monthNameIndex];
        month = getMonthIndex(monthName);
        if (month < 10) {
            month = "0" + month;
        }
        formatedDate = new Date(dateItems[yearIndex], month, d);
    }
    return formatedDate;

}



buildUrl = function (url,params){
  
  var ret=url;
  if(params && Object.getOwnPropertyNames(params).length>0){
    var esc = encodeURIComponent;
  
    var query = Object.keys(params)
      .map(k => esc(k) + '=' + esc(params[k]))
      .join('&');

    var glue="?";
    
    if(url.includes("?")) glue="&";
    
    ret = ret + glue + query;
  }

  return ret;
}

is_float = function(mixedVar) { 
  return +mixedVar === mixedVar && (!isFinite(mixedVar) || !!(mixedVar % 1))
}

is_int = function(mixedVar) { 
 return mixedVar === +mixedVar && isFinite(mixedVar) && !(mixedVar % 1) 
}


onWindowLoad = function(callback){
  if(window.addEventListener){
      window.addEventListener('load',callback,false);
  }else{
      window.attachEvent('onload',callback);
  }
}

onWindowError = function(callback){
  if(window.addEventListener){
      window.addEventListener('error',callback,false);
  }else{
      window.attachEvent('onerror',callback);
  }
}

onDocumentReady = function (callback){
  document.addEventListener('DOMContentLoaded', callback );
}
