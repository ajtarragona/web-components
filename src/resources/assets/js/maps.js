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
  animation:false,
  cluster:true,
  fitbounds:false,
  clusterMinZoom: 15,
  mapType: 'roadmap',
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
  
  this.showInfo = function(marker,content){
    var o=this;
    o.infoWindow.setContent(content);
    o.infoWindow.open(o.map,marker);
      
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

    }


    //spider
    this.overlappingmarkers = new OverlappingMarkerSpiderfier(o.gmap, {
      // markersWontMove: true,
      // markersWontHide: true,
      // basicFormatEvents: true,
      keepSpiderfied: true,

    });


    // al(o.markerClusterer);
    if(!this.settings.multiple){
        if(this.settings.markers.length>0){
          this.addMarker(this.settings.markers[0].location, this.settings.markers[0].name, this.settings.markers[0].infobox);
        }
    }else{
      // var markers=[];
      for(var i in this.settings.markers){
        this.addMarker(this.settings.markers[i].location,this.settings.markers[i].name,  this.settings.markers[i].infobox);
      }
      
    }
    if(o.settings.fitbounds) o.gmap.fitBounds(o.bounds);
    
    // al("markers",this.markers);
    // o.gmap.fitBounds(bounds);

   

    //al(bounds);

  }

 

  this.addMarker = function(coords,name,infobox){
    var o=this;

    //al("addMarker ");
   // al(coords);

    if(!this.settings.multiple) this.deleteMarkers();

    var marker = new google.maps.Marker({
      position: coords, 
      draggable: !this.settings.readonly,
      animation: this.settings.animation?google.maps.Animation.DROP:false,
      map: this.gmap
    });
    //al(marker);
    marker.name=name;

    marker.addListener('dragend', function() {
      //al("marker drooped");
      //al(this);
      o.displayCoords(this);
      o.updateValue();

    });


    
    marker.addListener('rightclick', function(point) {
      
      o.deleteMarker(this);

    });

    //al(marker);
    
      // marker.addListener('mouseout', function() {
      //     o.hideInfo();
      // });
      

    // marker.addListener('click', function() {
    marker.addListener('spider_click', function() {
        //al("marker clicked");
        //al(this);
        if(this.infobox){
          o.showInfo(this,this.infobox);
        }
        o.displayCoords(this);
    });
    
    
    
    if(infobox) marker.infobox=infobox;
    
    o.bounds.extend(marker.position);
    
    o.overlappingmarkers.addMarker(marker); 

    if(o.settings.cluster)  o.markerClusterer.addMarker(marker);



    // al(marker);
    var id = o.uniqueId();
    marker.uid=id
    o.markers[id] = marker; 
    // o.markers.push(marker);

    o.setCenter(coords);
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
        
   
      var value=[];
      
      for (marker of Object.values(this.markers)) {

        var val={
          name: marker.name,
          infobox: marker.name,
          location: {
            lat:marker.position.lat(),
            lng:marker.position.lng()
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

