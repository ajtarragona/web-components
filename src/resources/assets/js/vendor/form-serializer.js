buildFormData = function (formData, data, parentKey) {
    if (data && typeof data === 'object' && !(data instanceof Date) && !(data instanceof File)) {
      Object.keys(data).forEach(key => {
        buildFormData(formData, data[key], parentKey ? `${parentKey}[${key}]` : key);
      });
    } else {
      const value = data == null ? '' : data;
  
      formData.append(parentKey, value);
    }
}

  
jsonToFormData = function (data, formData) {
    if(!formData)
        formData = new FormData();
    
    buildFormData(formData, data);
    
    return formData;
}

$.fn.serializeObject = function() {
    var data = {};
  
    function buildInputObject(arr, val) {
        if (arr.length < 1) {
            return val;  
        }
        var objkey = arr[0];
        if (objkey.slice(-1) == "]") {
            objkey = objkey.slice(0,-1);
        }  
        var result = {};
        if (arr.length == 1){
            result[objkey] = val;
        } else {
            arr.shift();
            var nestedVal = buildInputObject(arr,val);
            result[objkey] = nestedVal;
        }
        return result;
    }
  
    function gatherMultipleValues( that ) {
        var final_array = [];
        $.each(that.serializeArray(), function( key, field ) {
            // Copy normal fields to final array without changes
            if( field.name.indexOf('[]') < 0 ){
                final_array.push( field );
                return true; // That's it, jump to next iteration
            }
  
            // Remove "[]" from the field name
            var field_name = field.name.split('[]')[0];
  
            // Add the field value in its array of values
            var has_value = false;
            $.each( final_array, function( final_key, final_field ){
                if( final_field.name === field_name ) {
                    has_value = true;
                    final_array[ final_key ][ 'value' ].push( field.value );
                }
            });
            // If it doesn't exist yet, create the field's array of values
            if( ! has_value ) {
                final_array.push( { 'name': field_name, 'value': [ field.value ] } );
            }
        });
        return final_array;
    }
  
    // Manage fields allowing multiple values first (they contain "[]" in their name)
    var final_array = gatherMultipleValues( this );
  
    // Then, create the object
    $.each(final_array, function() {
        var val = this.value;
        var c = this.name.split('[');
        var a = buildInputObject(c, val);
        $.extend(true, data, a);
    });
  
    return data;
  };
  
  