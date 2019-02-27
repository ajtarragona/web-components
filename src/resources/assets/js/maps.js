var MAPS=[];



var tgnmapdefaults = {
  center : {lat:0, lng:0},
  zoom: 15,
  geolocate: true,
  multiple:false,
  readonly:false,
  animation:false,
  cluster:true,
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


  al("init() tgnMap");
  //al(obj);
  this.$element=obj;
  this.id=obj.attr("id");
 
  this.$autocompleteinput=false;
  this.autocompleteinput=false;

  this.$forminput=false;
  this.forminput=false;

  this.$coordsdisplay=false;
  this.gmap=false;
  this.infoWindow=false;

  this.autocomplete=false;
  this.geoposition=false;

  this.markers=[];
  
  this.value=false;


  this.settings=tgnmapdefaults;
  if(options) this.settings = $.extend(true, {}, this.settings, options); 
  

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
    al('initMarkers');
    var o=this;

    var bounds = new google.maps.LatLngBounds();

    //al(this.settings.markers);

    for(var i in this.settings.markers){
      var marker=this.addMarker(this.settings.markers[i].location);
      if(this.settings.markers[i].infobox) marker.infobox=this.settings.markers[i].infobox;
      bounds.extend(marker.position);
    }

    o.gmap.fitBounds(bounds);

    if(this.settings.cluster){
      var markerCluster = new MarkerClusterer(o.gmap, o.markers,
            {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
    }

    //al(bounds);

  }

  this.addMarker = function(coords){
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
   
    marker.addListener('dragend', function() {
      //al("marker drooped");
      //al(this);

      o.setValue({location: {lat:this.position.lat(), lng: this.position.lng()}});

    });

    //al(marker);
    
      // marker.addListener('mouseout', function() {
      //     o.hideInfo();
      // });
      

      marker.addListener('click', function() {
        //al("marker clicked");
        //al(this);
        if(this.infobox){
          o.showInfo(this,this.infobox);
        }
      });
  
    this.markers.push(marker);

    this.setCenter(coords);
    return marker;
  }



  this.clearMarkers = function() {
    for (var i = 0; i < this.markers.length; i++) {
      this.markers[i].setMap(null);
    }
  }

  // Deletes all markers in the array by removing references to them.
  this. deleteMarkers= function() {
      this.clearMarkers();
      this.markers = [];
  }

  this.init = function(){
    //al("initMap");
    var o=this;

    this.$coordsdisplay=this.$element.closest('.map-container').find('.coords-display');

    this.$autocompleteinput=$('[type=text][data-map="#'+this.id+'"]');
    if(this.$autocompleteinput.length>0)
      this.autocompleteinput = this.$autocompleteinput[0];
    
    this.$forminput=$('[type=hidden][data-map="#'+this.id+'"]');
    if(this.$forminput.length>0)
      this.forminput = this.$forminput[0];
    
    this.initValue();



    //al(this.forminput);
   

    if(this.$element.data("center")){
      var center=this.$element.data("center");
      center=center.split(",");
      this.setCenter({lat: parseFloat(center[0]), lng: parseFloat(center[1])});

    }  


    this.gmap = new google.maps.Map(this.$element[0], {
        center: this.settings.center,
        zoom: this.settings.zoom,
        //mapTypeId: 'satellite',
        zoomControl: this.settings.controls.zoom,
        mapTypeControl: this.settings.controls.mapType,
        scaleControl: this.settings.controls.scale,
        streetViewControl: this.settings.controls.streetView,
        rotateControl: this.settings.controls.rotate,
        fullscreenControl: this.settings.controls.fullscreen,
        styles: this.settings.styles
    });



    this.infoWindow = new google.maps.InfoWindow({
        map: this.gmap
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
          //al(place);

          if(place.address_components){
            var loc={lat:place.geometry.location.lat(),lng:place.geometry.location.lng()};

              o.setValue({
                name:place.name,
                location : loc
              });
              
              o.addMarker(loc);
              
          }else{
            o.setValue({name:place.name})

          }

    });
  }


  this.clearValue = function(settings){
    this.value={name:'',location:{lat:'',lng:''}};
    this.$forminput.val(JSON.stringify(this.value));
    this.displayCoords();
    

  }

  this.setValue = function(settings){
        
      this.value = $.extend(true, {}, this.value, settings); 

      this.$forminput.val(JSON.stringify(this.value));
      this.displayCoords();
      
  }

  this.initValue = function(){
      var val = this.$forminput.val();
      try{
         this.value=JSON.parse(val);
      }catch(e){
         this.value ={name:'',location:{lat:'',lng:''}};
      }
      if(this.value && this.value.hasOwnProperty("name")){
        this.$autocompleteinput.val(this.value.name);
        this.displayCoords();
      }
  }
  this.displayCoords= function(){
    if(this.value.location){
      this.$coordsdisplay.html("LAT:"+this.value.location.lat+", LNG:"+this.value.location.lng);  
    }
  }
  this.initAll= function(){
    // 
    //al("initAll");
    //this.addMarker(this.settings.center);
    this.initTextField();
    //al(this.value.location);
    
    if(this.value && this.value.location && this.value.location.lng && this.value.location.lat){
      this.addMarker(this.value.location);
    }

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

