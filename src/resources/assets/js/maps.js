// var MarkerClusterer = require("@google/markerclusterer");
var MarkerClusterer = require("@google/markerclustererplus");
// var OverlappingMarkerSpiderfier = require("overlapping-marker-spiderfier");
// import OverlappingMarkerSpiderfier from 'overlapping-marker-spiderfier';

// var MAPS=[];

$.widget( "ajtarragona.tgnMap", {

  options : {
    center : {lat:0, lng:0},
    zoom: 15,
    geolocate: true,
    multiple:false,
    readonly:false,
    disabled:false,
    animation:false,
    cluster:true,
    fitbounds:false,
    clusterMinZoom: 15,
    mapType: 'roadmap',
    method:'get',
    url:false,
    customicons:false,
    showInfobox: false,
    controls : {
      zoom: true,
      mapType: false,
      scale: false,
      streetView: false,
      rotate: false,
      fullscreen: true,

    },
    theme: 
      [
    
        {
          featureType: "poi",
          stylers: [
            {
              visibility: "off"
            }
          ]
        },
        {
          featureType: "transit",
          stylers: [
            {
              visibility: "off"
            }
          ]
        }
    ]
      
  },

  markers : [],
  initialized: false,
  
  _init: function() {
    var o=this;
    al("init() tgnMap");
    
    this.options = $.extend({}, this.options, this.element.data()); 
    // al(obj);
    this.currentId=0;
    this.initialized=false;

    this.id=this.element.attr("id");
   

    // if(options) this.options = $.extend(true, {}, this.options, options); 
  
    if(this.options.url) this.options.fitbounds=false;


    // al("initMap");


    this.$coordsdisplay=this.element.closest('.map-container').find('.coords-display');

    this.$autocompleteinput=$('[type=text][data-map="#'+this.id+'"]');
    if(this.$autocompleteinput.length>0)
      this.autocompleteinput = this.$autocompleteinput[0];
    
    this.$addmarkerbtn=$('button.add-marker-btn[data-map="#'+this.id+'"]');
    if(this.$addmarkerbtn.length>0)
      this.addmarkerbtn = this.$addmarkerbtn[0];
    
    this.$forminput=$('[data-value][data-map="#'+this.id+'"]');
    if(this.$forminput.length>0)
      this.forminput = this.$forminput[0];
    
    // this.initValue();



  
    //al(this.forminput);
   

    if(this.element.data("center")){
      var center=this.element.data("center");
      center=center.split(",");
      this.setCenter({lat: parseFloat(center[0]), lng: parseFloat(center[1])});

    }  
  

    this.gmap = new google.maps.Map(this.element[0], {
        center: this.options.center,
        zoom: this.options.zoom,
        mapTypeId: this.options.mapType,
        zoomControl: this.options.controls.zoom,
        mapTypeControl: this.options.controls.mapType,
        mapTypeControlOptions: {
          // style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
          position: google.maps.ControlPosition.LEFT_BOTTOM,
          mapTypeIds: ['roadmap', 'satellite','hybrid','terrain']
        },
        scaleControl: this.options.controls.scale,
        streetViewControl: this.options.controls.streetView,
        rotateControl: this.options.controls.rotate,
        fullscreenControl: this.options.controls.fullscreen,
        styles: this.options.theme
    });

    if(this.options.height) this.element.css('height',this.options.height);


    this.infoWindow = new google.maps.InfoWindow({
        map: this.gmap
    });

    this.$addmarkerbtn.on('click',function(){
      o.addMarker(o.gmap.getCenter());
    });
    

    if(this.options.geolocate){
      this._geoLocate(function(){
        o._initAll();
        if(!o.options.url) o.initialized=true;
        
      });
    }else{
        o._initAll();
        if(!o.options.url) o.initialized=true;
    }

    if(this.options.url){
     
      google.maps.event.addListener(this.gmap, 'idle', function() {
        o._loadAjaxMarkers();
      });

      // google.maps.event.addListener(this.gmap, 'zoom_changed', function() {
      //   o.loadAjaxMarkers();
      // });
      
    }


  },

  _uniqueId : function() {
    return ++this.currentId;
  },
 

  setCenter :  function(center){
    //al('setCenter');
    this.options.center=center;
    if(this.gmap) this.gmap.setCenter(center);
  },


  _hideInfo : function(){
    var o=this;
    o.infoWindow.close();
  },
  
  _isURL : function(str) {
    var pattern = new RegExp('^(https?:\\/\\/)?'+ // protocol
    '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.?)+[a-z]{2,}|'+ // domain name
    '((\\d{1,3}\\.){3}\\d{1,3}))'+ // OR ip (v4) address
    '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*'+ // port and path
    '(\\?[;&a-z\\d%_.~+=-]*)?'+ // query string
    '(\\#[-a-z\\d_]*)?$','i'); // fragment locator
    return pattern.test(str);
  },

  
  _loadInfobox : function(url,marker){
    var o=this;
    o.infoWindow.open(o.map,marker);

    o.infoWindow.setContent('<div class="loading px-4 py-2">'+___("strings.loading")+'...</div>');
    $.ajax({
      url: url,
      type: 'get',
      // data: params,
      dataType: 'html',
      success: function(data){
        
        var content='<div id="infobox-content-'+marker.uid+'" class="infobox-content">'+data+'</div>';
        o.infoWindow.setContent(content);
        $('#infobox-content-'+marker.uid).tgnInitAll();
        o.infoWindow.open(o.map,marker);
        
      },
      error: function(xhr){
        o.infoWindow.setContent('<div class="alert alert-danger mb-0">'+___("strings.loaderror")+'</div>');
      }
    });
  },


  _showInfo : function(marker,content){
    var o=this;
    // al('showInfo',content);
    if(o._isURL(content)){
        o._loadInfobox(content,marker);
        
    }else{
      o.infoWindow.setContent(content);
      o.infoWindow.open(o.map,marker);
    }
      
  },

  _initMarkers : function(){
    // al('initMarkers');
    var o=this;
 
    o.bounds = new google.maps.LatLngBounds();

    //al(this.options.markers);
    // al()
    if(this.options.cluster){
      this.markerClusterer = new MarkerClusterer(o.gmap, [], {
        imagePath: baseUrl()+'/vendor/ajtarragona/img/mapcluster/m'
      });


      this.markerClusterer.setMaxZoom(o.options.clusterMinZoom);

      
     //toggle Clustered 
      google.maps.event.addListener(this.markerClusterer, 'clusteringend', function() {
          o._lookForClusteredMarkers();
      });
    }


    //spider
    this.overlappingmarkers = new OverlappingMarkerSpiderfier(o.gmap, {
      markersWontMove: false,
      markersWontHide: false,
      // basicFormatEvents: true,
      keepSpiderfied: true,

    });


    // al(o.markerClusterer);
    if(!this.options.multiple){
        if(this.options.markers.length>0){
          var tmpmarker=this.options.markers[0];
          if(tmpmarker.location){
            this.addMarker(
              tmpmarker.location, 
              tmpmarker.name?tmpmarker.name:null, 
              tmpmarker.url?tmpmarker.url:(tmpmarker.infobox?tmpmarker.infobox:null),
              tmpmarker.id?tmpmarker.id:null,
              tmpmarker.color?tmpmarker.color:null,
              tmpmarker.icon?tmpmarker.icon:null,
              tmpmarker.iconcolor?tmpmarker.iconcolor:null 
            );
          }

        }
    }else{
      // var markers=[];
      for(var i in this.options.markers){
        var tmpmarker=this.options.markers[i];
        if(tmpmarker.location){
          this.addMarker(
            tmpmarker.location, 
            tmpmarker.name?tmpmarker.name:null, 
            tmpmarker.url?tmpmarker.url:(tmpmarker.infobox?tmpmarker.infobox:null),
            tmpmarker.id?tmpmarker.id:null,
            tmpmarker.color?tmpmarker.color:null,
            tmpmarker.icon?tmpmarker.icon:null,
            tmpmarker.iconcolor?tmpmarker.iconcolor:null
          );
        }
      }
      
    }

  // al(this.markers);

    if(o.options.fitbounds){
      o.gmap.fitBounds(o.bounds);
      //aleja un poco si es demasiado cercano
      var listener = google.maps.event.addListener(o.gmap, "idle", function() { 
         if (o.gmap.getZoom() > 16) o.gmap.setZoom(16); 
         google.maps.event.removeListener(listener); 

         
      });
    }
    
    // al("markers",this.markers);
    // o.gmap.fitBounds(bounds);

   

    //al(bounds);

  },

 

  _isReadonly : function(){
    return this.options.readonly || this.options.disabled;
  },


  addMarker : function(coords,name,infobox,id,color,icon,iconcolor){
    var o=this;

    // al("addMarker ");
    // al(coords);
    // al(marker);
    var id = id ? id : o._uniqueId();
    if(o.markers[id]) return;
    // al("addMarker " + id);
    // al("markers",o.markers);

    

    if(!this.options.multiple) this.deleteMarkers();


    var marker = null;
    
    // if(color || icon ){
    //   al("CUSTOM",coords);
    //   marker = new CustomMarker(
    //     coords, 
    //     this.gmap,
    //     {
    //       color: color,
    //       draggable: !this._isReadonly(),
    //       animation: this.options.animation?google.maps.Animation.DROP:false,
    //       icon: icon,
    //     }
    //   );

    // }else{

      // var image = route('webcomponents.markerimage');//'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';
      // al("markerurl",imgurl);
      var markerargs={
        position: coords, 
        draggable: !this._isReadonly(),
        animation: this.options.animation?google.maps.Animation.DROP:false,
        map: this.gmap,
        
      };

      if(this.options.customicons){
        var imgurl = route('webcomponents.markerimage',{'bgcolor':color}).url();
      
        markerargs.icon= {
          url: imgurl,
          size: new google.maps.Size(36, 36),
          // origin: new google.maps.Point(0, 0),
          // anchor: new google.maps.Point(17, 34),
          scaledSize: new google.maps.Size(36, 36)
        };

        

      }

      marker = new google.maps.Marker(markerargs);

      if(this.options.customicons && icon){
        // al("icon",icon);
        // al("coords",coords);
        // al("icon",icon);
        var iconargs={
          icon: icon,
        };

        if(iconcolor) iconargs.iconcolor= iconcolor;

        var iconmarker = new CustomMarker(
            coords, 
            this.gmap,
            iconargs
          );
          marker.customicon=iconmarker;
          // al("end");

      }
     
      
    // }
    //al(marker);
    marker.name=name;
    marker.uid=id;
    
    
    marker.addListener('drag', function() {
      // al("DRAG");
      if(this.customicon){
        this.customicon.setPosition(this.position);
      }
    });

    marker.addListener('dragend', function() {
      //al("marker drooped");
      //al(this);
      o._displayCoords(this);
      o._updateValue();

    });


    
    marker.addListener('rightclick', function(point) {
      if(!o._isReadonly()){
       if(this.customicon){
          // al(this.customicon);
          this.customicon.remove();
       }
        o.deleteMarker(this);
      }

    });

    //al(marker);
    
      // marker.addListener('mouseout', function() {
      //     o.hideInfo();
      // });
      

    // marker.addListener('click', function() {
    marker.addListener('spider_click', function() {
        al("marker clicked");
        // al(this);
        if(this.infobox){
          o._showInfo(this,this.infobox);
        }
        o._displayCoords(this);
    });
    
    
    
    if(infobox){
      marker.infobox=infobox;
      // al('show',o.options);
      if(o.options.showInfobox){
        o._showInfo(marker, infobox);
      }
    }

    
    // al("position",marker.getPosition());
    o.bounds.extend(marker.getPosition());
    
    o.overlappingmarkers.addMarker(marker); 

    if(o.options.cluster)  o.markerClusterer.addMarker(marker);

    // al(marker);
    //añado al array de markers
    o.markers[id] = marker; 
    
    // o.markers.push(marker);
    // al("markers  ",o.markers);

    if(o.options.fitbounds) o.setCenter(coords);
    o._updateValue();
    return marker;
  },



  clearMarkers : function() {
    for ( marker of Object.values(this.markers)) {
      marker.setMap(null);
    }
    if(this.options.cluster) this.markerClusterer.clearMarkers();
    
  },

  // Deletes all markers in the array by removing references to them.
  deleteMarker : function(marker) {
    marker.setMap(null);
    // al("Deletemarker",marker);
    if(this.options.cluster)  this.markerClusterer.removeMarker(marker);
    
    delete this.markers[marker.uid];
    
    this._updateValue();
  },



  deleteMarkers : function() {
      this.clearMarkers();
     
      this.markers = {};
      this._updateValue();
  },

  
  _lookForClusteredMarkers : function(e){
    if(!this.options.customicons) return;

    // al('lookForClusteredMarkers');
    // al(this.markerClusterer);
    var clusters = this.markerClusterer.getClusters(); // use the get clusters method which returns an array of objects
    // al(clusters);
    // al("CLUSTERS:" +clusters.length);
    for( var i=0; i < clusters.length; i++ ){
      var markers=clusters[i].getMarkers();
      if(markers && markers.length>0){
        if(markers.length>1){
          for( var j=0; j< markers.length; j++ ){
              marker = markers[j]; // <-- Here's your clustered marker
              $(marker.customicon.div).hide();
          }
        }else{
            $(markers[0].customicon.div).show();
        }
      }
    }
  },

  _loadAjaxMarkers : function(e){
    var o=this;
    // al('loadAjaxMarkers');
    var params   =   {
      maxlat : o.gmap.getBounds().getNorthEast().lat(),
      maxlng  : o.gmap.getBounds().getNorthEast().lng(),
      minlat  :   o.gmap.getBounds().getSouthWest().lat(),  
      minlng  :   o.gmap.getBounds().getSouthWest().lng()
    } 
    // al(bounds);
      // al("Bounds changed", params);

      if(o.options.method!="get"){
        params._token= csrfToken();
      }
      // $target.startLoading();
      //data._token= csrfToken();
      // al(o.markers);
      params.ids= Object.keys(o.markers);
      
      o.element.closest('.map-container').startLoading();
      // al(o.options.method);
      $.ajax({
          url: o.options.url,
          type: o.options.method,
          data: params,
          dataType: 'json',
          success: function(data){
            o.element.closest('.map-container').stopLoading();
            // al('end loadAjaxMarkers');
            if(data){
              $.each(data,function(key, marker){
                // al(marker);
                // al(key);
                if(marker.location){
                  var location= new google.maps.LatLng(marker.location.lat, marker.location.lng);
                  var infobox= (marker.url?marker.url:(marker.infobox?marker.infobox:null));

                  o.addMarker(
                    location,
                    (marker.name?marker.name:null),
                    infobox,
                    (marker.id?marker.id:null) ,
                    (marker.color?marker.color:null) ,
                    (marker.icon?marker.icon:null),
                    (marker.iconcolor?marker.iconcolor:null) 
                  );
                }
              });
            }
            o.initialized=true;
          },
          error: function(xhr){
            o.element.closest('.map-container').stopLoading();
            o.initialized=true;
          
          }
      });
      
      /**"select lat, lng 
      from your_table 
      where lat >= $minLat 
      AND lat <= $maxLat
      AND lng <= $maxLng
      AND lng >= $minLng"; */

  },


  _initTextField : function(){
    var o=this;
    
    if(!this.autocompleteinput) return;

    //inicializo el campo de texto
    var defaultBounds = new google.maps.LatLngBounds(
      new google.maps.LatLng(-33.8902, 151.1759),
      new google.maps.LatLng(-33.8474, 151.2631)
    );


    this.autocomplete = new google.maps.places.Autocomplete(this.autocompleteinput, {
      bounds: defaultBounds,
      types: ['address']
    });
    
    var accuracy=3143;
    if(this.geoposition){
      accuracy= this.geoposition.coords.accuracy;

    }

    var circle = new google.maps.Circle({
      center: this.options.center,
      radius: 3143
    });
  

    this.autocomplete.setBounds(circle.getBounds());
    this.autocomplete.bindTo('bounds', this.gmap);
    this.autocomplete.setOptions({strictBounds: true})
    this.autocomplete.setFields(['address_components', 'geometry', 'name']);


    this.$autocompleteinput.on('keyup', function (e) {
        if (e.which == 8 || e.which==46){ //delete or supr
            if(!$(this).val()) o.clearValue();
        }
    });
    this.$autocompleteinput.on('keypress', function (e) {
        // prevent form submission on pressing Enter as there could be more inputs to fill out
        //al(e.which);
        if (e.which == 13) {
            e.preventDefault();
        }
    });

    this.autocomplete.addListener('place_changed', function() {
        // al("place changed");
        // Get the place details from the autocomplete object.
          var place = o.autocomplete.getPlace();

          if(place.address_components){
            var loc={lat:place.geometry.location.lat(),lng:place.geometry.location.lng()};
              o.addMarker(loc,place.name,place.name);
              o._updateValue();
          }else{
            o._updateValue();
          }

    });
  },


  clearValue : function(settings){
    this.markers={};
    this._updateValue();
    
  },

  value : function(){
    return this.$forminput.val();
  },
  _updateValue : function(settings){
      //  al('updateValue');
      if(this._isReadonly()) return;
      
      var value=[];
      
      for (marker of Object.values(this.markers)) {

        var val={
          name: marker.name,
          infobox: marker.name,
          location: {
            lat:marker.getPosition().lat(),
            lng:marker.getPosition().lng()
          }
        };
        value.push(val);
        
      }


      // al("UPDATE",value, this.markers);
      // al("MARKERS",this.markers);

      if(!this.options.multiple){
        // al("length:", Object.keys(this.markers).length);
        if(Object.keys(this.markers).length>0){
          this.$addmarkerbtn.prop('disabled',true).addClass('disabled');
        }else{
          this.$addmarkerbtn.prop('disabled',false).removeClass('disabled');
        }
      }
      this.$forminput.val(JSON.stringify(value));
      if(this.initialized){
        // al("CHANGED");
        this.$forminput.trigger('change');

      }
      
  },

  
  _displayCoords : function(marker){
    if(marker){
      this.$coordsdisplay.html("LAT:"+marker.position.lat()+", LNG:"+marker.position.lng());  
    }
  },


  _initAll : function(){
    // al("initAll",this.options);
   
    this._initTextField();
    // if(this.options.url){ 
    //   this.loadAjaxMarkers();
    // }
    if(this.options.markers){
      this._initMarkers();
    }

  },


  _geoLocate : function(callback){
    var o = this;
    //al("Geolocating");
    // Try HTML5 geolocation.
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function(position) {
        o.geoposition=position;
        var pos = {
          lat: position.coords.latitude,
          lng: position.coords.longitude
        };

        o.setCenter(pos);
        executeCallback(callback);  

      }, function() {
        o._handleLocationError(true);
      });
    } else {
      // Browser doesn't support Geolocation
      o._handleLocationError(false);
    }

  },





  _handleLocationError : function(browserHasGeolocation) {
      var o = this;
      o.infoWindow.setContent(browserHasGeolocation ?
          'Error: The Geolocation service failed.' :
          'Error: Your browser doesn\'t support geolocation.');
      o.infoWindow.setPosition(o.gmap.getCenter());
      o.infoWindow.open(o.map);
     
  }



});
