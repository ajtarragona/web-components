// var MarkerClusterer = require("@google/markerclusterer");
var MarkerClusterer = require("@google/markerclustererplus");
// var OverlappingMarkerSpiderfier = require("overlapping-marker-spiderfier");
// import OverlappingMarkerSpiderfier from 'overlapping-marker-spiderfier';

// var MAPS=[];


var tgnmapdefaults = {
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
  controls : {
    zoom: true,
    mapType: false,
    scale: false,
    streetView: false,
    rotate: false,
    fullscreen: true,

  },
  styles: 
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
    
};

    // {
    //     "elementType": "geometry",
    //     "stylers": [
    //       {
    //         "color": "#f5f5f5"
    //       }
    //     ]
    //   },
    //   {
    //     "elementType": "labels.icon",
    //     "stylers": [
    //       {
    //         "visibility": "off"
    //       }
    //     ]
    //   },
    //   {
    //     "elementType": "labels.text.fill",
    //     "stylers": [
    //       {
    //         "color": "#616161"
    //       }
    //     ]
    //   },
    //   {
    //     "elementType": "labels.text.stroke",
    //     "stylers": [
    //       {
    //         "color": "#f5f5f5"
    //       }
    //     ]
    //   },
    //   {
    //     "featureType": "administrative.land_parcel",
    //     "elementType": "labels.text.fill",
    //     "stylers": [
    //       {
    //         "color": "#bdbdbd"
    //       }
    //     ]
    //   },
    //   {
    //     "featureType": "poi",
    //     "elementType": "geometry",
    //     "stylers": [
    //       {
    //         "color": "#eeeeee"
    //       }
    //     ]
    //   },
    //   {
    //     "featureType": "poi",
    //     "elementType": "labels.text.fill",
    //     "stylers": [
    //       {
    //         "color": "#757575"
    //       }
    //     ]
    //   },
    //   {
    //     "featureType": "poi.park",
    //     "elementType": "geometry",
    //     "stylers": [
    //       {
    //         "color": "#e5e5e5"
    //       }
    //     ]
    //   },
    //   {
    //     "featureType": "poi.park",
    //     "elementType": "labels.text.fill",
    //     "stylers": [
    //       {
    //         "color": "#9e9e9e"
    //       }
    //     ]
    //   },
    //   {
    //     "featureType": "road",
    //     "elementType": "geometry",
    //     "stylers": [
    //       {
    //         "color": "#ffffff"
    //       }
    //     ]
    //   },
    //   {
    //     "featureType": "road.arterial",
    //     "elementType": "labels.text.fill",
    //     "stylers": [
    //       {
    //         "color": "#757575"
    //       }
    //     ]
    //   },
    //   {
    //     "featureType": "road.highway",
    //     "elementType": "geometry",
    //     "stylers": [
    //       {
    //         "color": "#dadada"
    //       }
    //     ]
    //   },
    //   {
    //     "featureType": "road.highway",
    //     "elementType": "labels.text.fill",
    //     "stylers": [
    //       {
    //         "color": "#616161"
    //       }
    //     ]
    //   },
    //   {
    //     "featureType": "road.local",
    //     "elementType": "labels.text.fill",
    //     "stylers": [
    //       {
    //         "color": "#9e9e9e"
    //       }
    //     ]
    //   },
    //   {
    //     "featureType": "transit.line",
    //     "elementType": "geometry",
    //     "stylers": [
    //       {
    //         "color": "#e5e5e5"
    //       }
    //     ]
    //   },
    //   {
    //     "featureType": "transit.station",
    //     "elementType": "geometry",
    //     "stylers": [
    //       {
    //         "color": "#eeeeee"
    //       }
    //     ]
    //   },
    //   {
    //     "featureType": "water",
    //     "elementType": "geometry",
    //     "stylers": [
    //       {
    //         "color": "#c9c9c9"
    //       }
    //     ]
    //   },
    //   {
    //     "featureType": "water",
    //     "elementType": "labels.text.fill",
    //     "stylers": [
    //       {
    //         "color": "#9e9e9e"
    //       }
    //     ]
    //   },



TgnMapClass = function(obj,options){

  this.currentId = 0;

  this.uniqueId = function() {
    return ++this.currentId;
  }
 
  //al(obj);
  this.$element=obj;
  this.id=obj.attr("id");
 
  this.$autocompleteinput=false;
  this.autocompleteinput=false;

  this.$addmarkerbtn=false;
  this.addmarkerbtn=false;
  
  this.$forminput=false;
  this.forminput=false;

  this.$coordsdisplay=false;
  this.gmap=false;
  this.infoWindow=false;

  this.autocomplete=false;
  this.geoposition=false;

  this.markers={};
  
  // this.value=false;
  this.markerClusterer=null;
  this.bounds=null;
  
  

  this.settings=tgnmapdefaults;
  if(options) this.settings = $.extend(true, {}, this.settings, options); 

  if(this.settings.url) this.settings.fitbounds=false;

  al("init() tgnMap");
  // al(this.settings);
 

  this.setCenter = function(center){
    //al('setCenter');
    this.settings.center=center;
    if(this.gmap) this.gmap.setCenter(center);
  }


  this.hideInfo = function(){
    var o=this;
    o.infoWindow.close();
  }
  
  this.isURL = function(str) {
    var pattern = new RegExp('^(https?:\\/\\/)?'+ // protocol
    '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.?)+[a-z]{2,}|'+ // domain name
    '((\\d{1,3}\\.){3}\\d{1,3}))'+ // OR ip (v4) address
    '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*'+ // port and path
    '(\\?[;&a-z\\d%_.~+=-]*)?'+ // query string
    '(\\#[-a-z\\d_]*)?$','i'); // fragment locator
    return pattern.test(str);
  }

  
  this.loadInfobox = function(url,marker){
    var o=this;
    o.infoWindow.open(o.map,marker);
    o.infoWindow.setContent('<div class="loading px-4 py-2">'+___("strings.loading")+'...</div>');
    $.ajax({
      url: url,
      type: 'get',
      // data: params,
      dataType: 'html',
      success: function(data){
        o.infoWindow.setContent(data);
        // o.$element.closest('.map-container').stopLoading();
        o.infoWindow.open(o.map,marker);
        
      },
      error: function(xhr){
        o.infoWindow.setContent('<div class="alert alert-danger mb-0">'+___("strings.loaderror")+'</div>');
      }
    });
  }

  this.showInfo = function(marker,content){
    var o=this;
    // al('showInfo',content);
    if(o.isURL(content)){
        o.loadInfobox(content,marker);
        
    }else{
      o.infoWindow.setContent(content);
      o.infoWindow.open(o.map,marker);
    }
      
  }

  this.initMarkers = function(){
    // al('initMarkers');
    var o=this;
 
    o.bounds = new google.maps.LatLngBounds();

    //al(this.settings.markers);
    // al()
    if(this.settings.cluster){
      this.markerClusterer = new MarkerClusterer(o.gmap, [], {
        imagePath: baseUrl()+'/vendor/ajtarragona/img/mapcluster/m'
      });


      this.markerClusterer.setMaxZoom(o.settings.clusterMinZoom);

      
     //toggle Clustered 
      google.maps.event.addListener(this.markerClusterer, 'clusteringend', function() {
          o.lookForClusteredMarkers();
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
    if(!this.settings.multiple){
        if(this.settings.markers.length>0){
          var tmpmarker=this.settings.markers[0];
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
      for(var i in this.settings.markers){
        var tmpmarker=this.settings.markers[i];
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

    if(o.settings.fitbounds){
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

  }

 

  this.isReadonly = function(){
    return this.settings.readonly || this.settings.disabled;
  }


  this.addMarker = function(coords,name,infobox,id,color,icon,iconcolor){
    var o=this;

    al("addMarker ");
    // al(coords);
    // al(marker);
    var id = id ? id : o.uniqueId();
    if(o.markers[id]) return;
    // al("addMarker " + id);
    // al("markers",o.markers);

    

    if(!this.settings.multiple) this.deleteMarkers();


    var marker = null;
    
    // if(color || icon ){
    //   al("CUSTOM",coords);
    //   marker = new CustomMarker(
    //     coords, 
    //     this.gmap,
    //     {
    //       color: color,
    //       draggable: !this.isReadonly(),
    //       animation: this.settings.animation?google.maps.Animation.DROP:false,
    //       icon: icon,
    //     }
    //   );

    // }else{

      // var image = route('webcomponents.markerimage');//'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';
      // al("markerurl",imgurl);
      var markerargs={
        position: coords, 
        draggable: !this.isReadonly(),
        animation: this.settings.animation?google.maps.Animation.DROP:false,
        map: this.gmap,
        
      };

      if(this.settings.customicons){
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

      if(this.settings.customicons && icon){
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
      al("DRAG");
      if(this.customicon){
        this.customicon.setPosition(this.position);
      }
    });

    marker.addListener('dragend', function() {
      //al("marker drooped");
      //al(this);
      o.displayCoords(this);
      o.updateValue();

    });


    
    marker.addListener('rightclick', function(point) {
      if(!o.isReadonly()){
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
        al(this);
        if(this.infobox){
          o.showInfo(this,this.infobox);
        }
        o.displayCoords(this);
    });
    
    
    
    if(infobox) marker.infobox=infobox;
    
    // al("position",marker.getPosition());
    o.bounds.extend(marker.getPosition());
    
    o.overlappingmarkers.addMarker(marker); 

    if(o.settings.cluster)  o.markerClusterer.addMarker(marker);

    // al(marker);
    //añado al array de markers
    o.markers[id] = marker; 
    
    // o.markers.push(marker);
    // al("markers  ",o.markers);

    if(o.settings.fitbounds) o.setCenter(coords);
    o.updateValue();
    return marker;
  }



  this.clearMarkers = function() {
    for ( marker of Object.values(this.markers)) {
      marker.setMap(null);
    }
    if(this.settings.cluster) this.markerClusterer.clearMarkers();
    
  }

  // Deletes all markers in the array by removing references to them.
  this.deleteMarker = function(marker) {
    marker.setMap(null);
    // al("Deletemarker",marker);
    if(this.settings.cluster)  this.markerClusterer.removeMarker(marker);
    
    delete this.markers[marker.uid];
    
    this.updateValue();
  }



  this.deleteMarkers= function() {
      this.clearMarkers();
     
      this.markers = {};
      this.updateValue();
  }

  this.init = function(){
    //al("initMap");
    var o=this;

    this.$coordsdisplay=this.$element.closest('.map-container').find('.coords-display');

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
   

    if(this.$element.data("center")){
      var center=this.$element.data("center");
      center=center.split(",");
      this.setCenter({lat: parseFloat(center[0]), lng: parseFloat(center[1])});

    }  


    this.gmap = new google.maps.Map(this.$element[0], {
        center: this.settings.center,
        zoom: this.settings.zoom,
        mapTypeId: this.settings.mapType,
        zoomControl: this.settings.controls.zoom,
        mapTypeControl: this.settings.controls.mapType,
        mapTypeControlOptions: {
          // style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
          position: google.maps.ControlPosition.LEFT_BOTTOM,
          mapTypeIds: ['roadmap', 'satellite','hybrid','terrain']
        },
        scaleControl: this.settings.controls.scale,
        streetViewControl: this.settings.controls.streetView,
        rotateControl: this.settings.controls.rotate,
        fullscreenControl: this.settings.controls.fullscreen,
        styles: this.settings.styles
    });

    if(this.settings.height) this.$element.css('height',this.settings.height);


    this.infoWindow = new google.maps.InfoWindow({
        map: this.gmap
    });

    this.$addmarkerbtn.on('click',function(){
      o.addMarker(o.gmap.getCenter());
    });
    

    if(this.settings.geolocate){
      this.geoLocate(function(){
        o.initAll();
      });
    }else{
        o.initAll();
    }

    if(this.settings.url){
     
      google.maps.event.addListener(this.gmap, 'idle', function() {
        o.loadAjaxMarkers();
      });

      // google.maps.event.addListener(this.gmap, 'zoom_changed', function() {
      //   o.loadAjaxMarkers();
      // });
      
    }



    

  }

  
  this.lookForClusteredMarkers= function(e){
    if(!this.settings.customicons) return;

    al('lookForClusteredMarkers');
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
  }

  this.loadAjaxMarkers= function(e){
    var o=this;

    var params   =   {
      maxlat : o.gmap.getBounds().getNorthEast().lat(),
      maxlng  : o.gmap.getBounds().getNorthEast().lng(),
      minlat  :   o.gmap.getBounds().getSouthWest().lat(),  
      minlng  :   o.gmap.getBounds().getSouthWest().lng()
    } 
    // al(bounds);
      // al("Bounds changed", params);

      if(o.settings.method!="get"){
        params._token= csrfToken();
      }
      // $target.startLoading();
      //data._token= csrfToken();
      // al(o.markers);
      params.ids= Object.keys(o.markers);
      
      o.$element.closest('.map-container').startLoading();
      // al(o.settings.method);
      $.ajax({
          url: o.settings.url,
          type: o.settings.method,
          data: params,
          dataType: 'json',
          success: function(data){
            o.$element.closest('.map-container').stopLoading();

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
          },
          error: function(xhr){
            o.$element.closest('.map-container').stopLoading();
          
          }
      });
      
      /**"select lat, lng 
      from your_table 
      where lat >= $minLat 
      AND lat <= $maxLat
      AND lng <= $maxLng
      AND lng >= $minLng"; */

  }


  this.initTextField= function(){
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
      center: this.settings.center,
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
              o.updateValue();
          }else{
            o.updateValue();
          }

    });
  }


  this.clearValue = function(settings){
    this.markers={};
    this.updateValue();
    
  }

  this.updateValue = function(settings){
        
      if(this.isReadonly()) return;
      
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

      if(!this.settings.multiple){
        // al("length:", Object.keys(this.markers).length);
        if(Object.keys(this.markers).length>0){
          this.$addmarkerbtn.prop('disabled',true).addClass('disabled');
        }else{
          this.$addmarkerbtn.prop('disabled',false).removeClass('disabled');
        }
      }
      this.$forminput.val(JSON.stringify(value));
     
      
  }

  
  this.displayCoords= function(marker){
    if(marker){
      this.$coordsdisplay.html("LAT:"+marker.position.lat()+", LNG:"+marker.position.lng());  
    }
  }


  this.initAll= function(){
    // al("initAll",this.settings);
   
    this.initTextField();
    // if(this.settings.url){ 
    //   this.loadAjaxMarkers();
    // }
    if(this.settings.markers){
      this.initMarkers();
    }

  }


  this.geoLocate = function(callback){
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
        o.handleLocationError(true);
      });
    } else {
      // Browser doesn't support Geolocation
      o.handleLocationError(false);
    }

  }





  this.handleLocationError = function(browserHasGeolocation) {
      var o = this;
      o.infoWindow.setContent(browserHasGeolocation ?
          'Error: The Geolocation service failed.' :
          'Error: Your browser doesn\'t support geolocation.');
      o.infoWindow.setPosition(o.gmap.getCenter());
      o.infoWindow.open(o.map);
     
  }



}

 
$.fn.tgnMap = function( options ){
  
  return this.each(function(){
    var obj=$(this);
    obj.settings={};
    if(obj.data()) obj.settings = $.extend(true, {}, obj.settings, obj.data()); 
    var map=new TgnMapClass(obj, obj.settings);
    map.init();

  });
};

