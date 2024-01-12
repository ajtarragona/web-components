// var MarkerClusterer = require("@google/markerclusterer");
var MarkerClusterer = require("@google/markerclustererplus");
// import { MarkerWithLabel } from '@googlemaps/markerwithlabel';
// import { library, icon  } from '@fortawesome/fontawesome-svg-core'
// import { fas } from '@fortawesome/free-solid-svg-icons'
// import { far } from '@fortawesome/free-regular-svg-icons'
// import { fab } from '@fortawesome/free-brands-svg-icons'

// var OverlappingMarkerSpiderfier = require("overlapping-marker-spiderfier");
// import OverlappingMarkerSpiderfier from 'overlapping-marker-spiderfier';

// var MAPS=[];


/** fontawesome icons */
// Define Marker Shapes

var marker_shapes = {
  MAP_PIN_HOLE : 'm-0.06,-44.61c-8.38,0 -15.17,6.79 -15.17,15.17c0,8.55 4.24,10.37 8.93,16.06c5.6,6.81 6.25,13.83 6.25,13.83s0.64,-7.03 6.25,-13.83c4.69,-5.69 8.93,-7.51 8.93,-16.06c0,-8.38 -6.79,-15.17 -15.17,-15.17zm0,20.42c-2.9,0 -5.24,-2.35 -5.24,-5.24s2.35,-5.24 5.24,-5.24c2.9,0 5.24,2.35 5.24,5.24s-2.35,5.24 -5.24,5.24z',
  MAP_PIN : 'm0.17,-45c-8.38,0 -15.17,6.79 -15.17,15.17c0,8.55 4.24,10.37 8.93,16.06c5.6,6.81 6.25,13.83 6.25,13.83s0.64,-7.03 6.25,-13.83c4.69,-5.69 8.93,-7.51 8.93,-16.06c0,-8.38 -6.79,-15.17 -15.17,-15.17l-0.02,0z',
  MAP_PIN_ALT : 'M0-48c-9.8 0-17.7 7.8-17.7 17.4 0 15.5 17.7 30.6 17.7 30.6s17.7-15.4 17.7-30.6c0-9.6-7.9-17.4-17.7-17.4z',
  SHIELD : 'M18.8-31.8c.3-3.4 1.3-6.6 3.2-9.5l-7-6.7c-2.2 1.8-4.8 2.8-7.6 3-2.6.2-5.1-.2-7.5-1.4-2.4 1.1-4.9 1.6-7.5 1.4-2.7-.2-5.1-1.1-7.3-2.7l-7.1 6.7c1.7 2.9 2.7 6 2.9 9.2.1 1.5-.3 3.5-1.3 6.1-.5 1.5-.9 2.7-1.2 3.8-.2 1-.4 1.9-.5 2.5 0 2.8.8 5.3 2.5 7.5 1.3 1.6 3.5 3.4 6.5 5.4 3.3 1.6 5.8 2.6 7.6 3.1.5.2 1 .4 1.5.7l1.5.6c1.2.7 2 1.4 2.4 2.1.5-.8 1.3-1.5 2.4-2.1.7-.3 1.3-.5 1.9-.8.5-.2.9-.4 1.1-.5.4-.1.9-.3 1.5-.6.6-.2 1.3-.5 2.2-.8 1.7-.6 3-1.1 3.8-1.6 2.9-2 5.1-3.8 6.4-5.3 1.7-2.2 2.6-4.8 2.5-7.6-.1-1.3-.7-3.3-1.7-6.1-.9-2.8-1.3-4.9-1.2-6.4z',
  ROUTE : 'M24-28.3c-.2-13.3-7.9-18.5-8.3-18.7l-1.2-.8-1.2.8c-2 1.4-4.1 2-6.1 2-3.4 0-5.8-1.9-5.9-1.9l-1.3-1.1-1.3 1.1c-.1.1-2.5 1.9-5.9 1.9-2.1 0-4.1-.7-6.1-2l-1.2-.8-1.2.8c-.8.6-8 5.9-8.2 18.7-.2 1.1 2.9 22.2 23.9 28.3 22.9-6.7 24.1-26.9 24-28.3z',
  SQUARE_PIN : 'M22-48h-44v43h16l6 5 6-5h16z',
  SQUARE : 'M-24-48h48v48h-48z',
  SQUARE_ROUNDED : 'M24-8c0 4.4-3.6 8-8 8h-32c-4.4 0-8-3.6-8-8v-32c0-4.4 3.6-8 8-8h32c4.4 0 8 3.6 8 8v32z',
  CIRCLE : 'M 24 -24 C 24 -10.745 13.255 0 0 0 C -13.255 0 -24 -10.745 -24 -24 C -24 -37.255 -13.255 -48 0 -48 C 13.255 -48 24 -37.255 24 -24 Z',
  CIRCLE_PIN : 'M -0.438 -0.028 L -4.618 -8.644 C -15.663 -10.797 -24 -20.525 -24 -32.2 C -24 -45.455 -13.255 -56.2 0 -56.2 C 13.255 -56.2 24 -45.455 24 -32.2 C 24 -20.19 15.179 -10.241 3.662 -8.478 L -0.438 -0.028 Z'
}


var marker_shapes_label_top =  {
  MAP_PIN_HOLE : -30,
  MAP_PIN : -30,
  MAP_PIN_ALT : -30,
  SQUARE_PIN : -27,
  SHIELD : -27,
  ROUTE : -27,
  SQUARE : -25,
  SQUARE_ROUNDED :-25,
  CIRCLE : -25,
  CIRCLE_PIN : -33,
}

// library.add(fas, far, fab);

// const camera = icon({ prefix: 'fas', iconName: 'camera' })
// console.log("CAMERA", camera);

/**map widget */
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
    custommarkers:false,
    showInfobox: false,
    showcoords: false,
    controls : {
      zoom: true,
      mapType: false,
      scale: false,
      streetView: false,
      rotate: false,
      fullscreen: true,

    },
    shapes : ['marker'],
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
    ],
    markerDefaultOptions: {
      borderwidth:0,
      bordercolor:"#bf002c",
      backgroundcolor : "#bf002c",
      opacity:1,
      shape: 'MAP_PIN_HOLE',
      scale:1,
    },
    shapesOptions: {
        borderwidth:3,
        bordercolor:"#bf002c",
        backgroundcolor : "#bf002c",
        opacity:0.5,
    },
      
  },

  // markers : [],
  // shapes : [],
  initialized: false,
  gmap: null,
  drawingManager: null,
  selectedShapeId: null,
  selectedShape: null,
  isActive:false,

  _getGmap: function() {
    if(!this.gmap){
        this.gmap = new google.maps.Map(this.element[0], {
            // center: this.options.center,
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
        // al('gmap',this.gmap);
    }
    return this.gmap;
  },

  _create: function() {
      var o=this;
        
      this.gmap=null;
    
      // if(this.element.is('.map-init')) return;
      this.shapes=[];

      // this.markers=[];
  
      this.element.addClass('map-init');
  
      this.currentId=0;
      this.initialized=false;
  
      this.id=this.element.attr("id");
      this.options = $.extend({}, this.options, this.element.data()); 

      // $.extend(true,this.options, this.element.data());
      // $.extend(true,this.shapes);
      // this.shapes=[];


      // console.log(this.shapes);
      if(this.options.readonly){
        this.options.shapes=null;
      }
      // al(this.options);
      if(this.options.custommarkers){
        //no compatible
        // this.options.animation=false;
        // this.options.cluster=false;
      }
        
  
      if(this.options.url) this.options.fitbounds=false;
  
      if(this.options.url){
       
          google.maps.event.addListener(this._getGmap(), 'idle', function() {
            o._loadAjaxMarkers();
          });
    
          // google.maps.event.addListener(this.gmap, 'zoom_changed', function() {
          //   o.loadAjaxMarkers();
          // });
          
        }
     
      
      // this.initValue();
  
  
  
    
      //al(this.forminput);
     
  
      if(this.element.data("center")){
        var center=this.element.data("center");
      //   al('center',center);
        center=center.split(",");
      //   al(center);
        this.setCenter({lat: parseFloat(center[0]), lng: parseFloat(center[1])});
  
      }  
  
      if(this.options.height) this.element.css('height',this.options.height);
  
  
      this.infoWindow = new google.maps.InfoWindow({
          map: this._getGmap()
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
  
      
            // al(this.options.center);

      
        

       

      

      // this.$addmarkerbtn.on('click',function(){
      //   o.addMarker(o._getGmap().getCenter());
      // });


//   },

//   _init: function() {
//     var o= this;
//     al('_init');
   


  },

  _uniqueId : function() {
    return ++this.currentId;
  },
 

  setCenter :  function(center){
    //al('setCenter');
    this.options.center=center;
    if(this._getGmap()) this._getGmap().setCenter(center);
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

  _createNewShape : function(marker){
    var o=this;
    var shapesoptions= {};

    if(marker.type??'marker' !='marker'){
      shapesoptions.strokeColor = marker.bordercolor ? marker.bordercolor : this.options.shapesOptions.bordercolor;
      shapesoptions.fillColor = marker.backgroundcolor ? marker.backgroundcolor : this.options.shapesOptions.backgroundcolor;
      shapesoptions.fillOpacity = (marker.opacity || marker.opacity === 0) ? marker.opacity : this.options.shapesOptions.opacity,
      shapesoptions.strokeWeight = (marker.borderwidth || marker.borderwidth === 0) ? marker.borderwidth  : this.options.shapesOptions.borderwidth;
    }

    var options={
        ...shapesoptions,
        ...marker,
        zIndex: this.shapes.length+1,
        clickable: true,
        geodesic:false,
        draggable: !this._isReadonly()
    };
    
    // _d('duplicate layer',options);

    switch(marker.type??'marker'){
        case 'rectangle':
            // console.log('add rectangle',options);
            var shape=new google.maps.Rectangle(options);
            shape.setMap(this.gmap);
            var bounds=shape.getBounds();
            o.bounds.extend(bounds.getNorthEast());
            o.bounds.extend(bounds.getSouthWest());
      
            this.addShapeEvents(marker.type, shape);
            
            break;

        case 'circle':
            var shape=new google.maps.Circle(options);
            shape.setMap(this.gmap);
            var bounds=shape.getBounds();
            o.bounds.extend(bounds.getNorthEast());
            o.bounds.extend(bounds.getSouthWest());
      
            this.addShapeEvents(marker.type, shape);
            
            
            break;
        case 'polyline':
            var shape=new google.maps.Polyline(options);
            shape.setMap(this.gmap);
            for(var vertex of shape.getPath().getArray()){
              o.bounds.extend(vertex);
            }
            
            this.addShapeEvents(marker.type, shape);
            
            break;
        case 'polygon':
            var shape=new google.maps.Polygon(options);
            shape.setMap(this.gmap);
            for(var vertex of shape.getPath().getArray()){
              o.bounds.extend(vertex);
            }
            this.addShapeEvents(marker.type, shape);
            
            break;
        case 'marker':
            // if(marker.location){
              var shape= this.addMarker(marker);
              this.addShapeEvents('marker', shape);
            // }
            this._updateValue();
            break;
        default:break;
    }
  },
  /**crea los marcadores o formas por defecto */
  _initMarkersAndShapes : function(){
    // al('initMarkers', this.options.markers);
    var o=this;
 
    o.bounds = new google.maps.LatLngBounds();

    //al(this.options.markers);
    // al()
    if(this.options.cluster){
      this.markerClusterer = new MarkerClusterer(o._getGmap(), [], {
        imagePath: baseUrl()+'/vendor/ajtarragona/img/mapcluster/m'
      });


      this.markerClusterer.setMaxZoom(o.options.clusterMinZoom);

      
     //toggle Clustered 
      google.maps.event.addListener(this.markerClusterer, 'clusteringend', function() {
          o._lookForClusteredMarkers();
      });
    }


    //spider
    this.overlappingmarkers = new OverlappingMarkerSpiderfier(o._getGmap(), {
      markersWontMove: false,
      markersWontHide: false,
      // basicFormatEvents: true,
      keepSpiderfied: true,

    });


    // al(o.markerClusterer);
    if(!this.options.multiple){

        if(this.options.markers.length>0){
          var tmpmarker=this.options.markers[0];
          // if(tmpmarker.location){
            this._createNewShape(tmpmarker);

   

        }
    }else{
      // var markers=[];
      for(var i in this.options.markers){
        var tmpmarker=this.options.markers[i];
        this._createNewShape(tmpmarker);

      }
      
    }

  // al(this.markers);

    if(o.options.fitbounds){
      o._getGmap().fitBounds(o.bounds);
      //aleja un poco si es demasiado cercano
      var listener = google.maps.event.addListener(o._getGmap(), "idle", function() { 
         if (o._getGmap().getZoom() > 16) o._getGmap().setZoom(16); 
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


  addMarker : function(markeroptions){
    // console.log('addMarker',markeroptions);
    var o=this;    
    if(!markeroptions.location) return;

    if(!this.options.multiple){
      // this.deleteMarkers();
      this.deleteShapes();
    }

    var marker = null;

    var markerargs={
      position: new google.maps.LatLng(markeroptions.location.lat, markeroptions.location.lng), 
      draggable: !this._isReadonly(),
      // animation: this.options.animation?google.maps.Animation.DROP:false,
      map: this._getGmap(),
    };


    if(this.options.custommarkers){
        var custommarker=this._makeCustomMarker({
          ...o.options.markerDefaultOptions,
          ...o.options.markeroptions,
          ...markeroptions
        });
        markerargs={
          ...markerargs,
          ...custommarker
        };
    }
    // console.log('markerargs',markerargs);

    marker = new google.maps.Marker(markerargs);
     
    if(markeroptions.infobox){
      marker.infobox=markeroptions.infobox;
      // al('show',o.options);
      if(o.options.showInfobox){
        o._showInfo(marker, marker.infobox);
      }
    }

    o._updateValue();
    return marker;
  },

  _makeCustomMarker : function(iconsettings){
    // console.log('_makeCustomMarker', iconsettings);
    

    var markershape= iconsettings.shape ? iconsettings.shape.toUpperCase() : 'MAP_PIN_HOLE';
  
    if(iconsettings.icon && iconsettings.shape=='MAP_PIN_HOLE') markershape = 'MAP_PIN';

    // console.log('markershape',markershape, marker_shapes_label_top[markershape]);
    var labeltop=(marker_shapes_label_top[markershape] ?? -25) ;

   
    if(iconsettings.labelposition && iconsettings.labelposition == "external"){
      labeltop=20;
    }
    var markerargs={};
    // var labelorigin=new google.maps.Point(0, -25);

    // if (iconsettings.icon) labelorigin=new google.maps.Point(0, -22);
    // else if(iconsettings.labelposition && iconsettings.labelposition == "external") labelorigin=new google.maps.Point(0, 20);
    // console.log('labeltop',labeltop);
    markerargs.icon= {
      // url: imgurl,
      path : marker_shapes[markershape],//imgpath,
      // size: new google.maps.Size(40, 40),
      // origin: new google.maps.Point(19, 38),
      anchor: new google.maps.Point(0,0),
      // scaledSize: new google.maps.Size(28,38),
      // anchor: new google.maps.Point(7.8, 21),
      rotation: 0,
      // scale: 1,
      labelOrigin : new google.maps.Point(0, labeltop)
    };

    markerargs.icon.strokeColor = iconsettings.bordercolor ? iconsettings.bordercolor:'bf002c';
    markerargs.icon.fillColor = iconsettings.backgroundcolor ? iconsettings.backgroundcolor:'#bf002c';
    markerargs.icon.fillOpacity = (iconsettings.opacity || iconsettings.opacity === 0) ? iconsettings.opacity:1,
    markerargs.icon.strokeWeight = (iconsettings.borderwidth || iconsettings.borderwidth === 0) ? iconsettings.borderwidth : 0;
    markerargs.icon.scale = iconsettings.scale ? iconsettings.scale:1;

    // use a Material Icon as font
    if(iconsettings.icon){
      // console.log(iconsettings.icon, iconsettings.icon.startsWith('fa'))

      if(!iconsettings.icon.startsWith('fa')){
        iconsettings.icon='fa fa-'+iconsettings.icon;
      }

      markerargs.label = 
      {
          className : 'markerlabel-icon icon '+iconsettings.icon,
          text: "", 
          fontFamily: "Font Awesome 5 Free",
          color: iconsettings.color ?? '',
          fontSize: ((1.5)*iconsettings.scale)+"em"
                
          // fontSize: "16px"
      };

    }else if(iconsettings.label){
      // markerargs.labelContent = iconsettings.label; // can also be HTMLElement
      // markerargs.labelAnchor: new google.maps.Point(-21, 3),
      // markerargs.labelClass: "labels", // the CSS class for the label
      // markerargs.labelStyle: { opacity: 1.0 },
      markerargs.label = 
      {
          className : 'markerlabel-' + (iconsettings.labelposition ? iconsettings.labelposition : 'internal'),
          text: iconsettings.label, //"\ue530", // codepoint from https://fonts.google.com/icons
          fontFamily: "Montserrat, Arial, sans-serif",
          // fontWeight: "bold",
          color: iconsettings.color ?? '',
          fontSize: (iconsettings.labelposition && iconsettings.labelposition == "external") ? "12px" : "16px",
      };
    }
    // console.log('markerargs',markerargs);
    return markerargs;
  },

  // clearMarkers : function() {
  //   for ( marker of Object.values(this.markers)) {
  //     marker.setMap(null);
  //   }
  //   if(this.options.cluster) this.markerClusterer.clearMarkers();
    
  // },

  // // Deletes all markers in the array by removing references to them.
  // deleteMarker : function(marker) {
  //   marker.setMap(null);
  //   // al("Deletemarker",marker);
  //   if(this.options.cluster)  this.markerClusterer.removeMarker(marker);
    
  //   delete this.markers[marker.uid];
    
  //   this._updateValue();
  // },



  // deleteMarkers : function() {
  //     this.clearMarkers();
     
  //     this.markers = {};
  //     this._updateValue();
  // },
  deleteShapes : function() {
    for (shape of Object.values(this.shapes)) {
      shape.setMap(null);
    }
    this.shapes=[];
    this._updateValue();
    if(this.options.cluster) this.markerClusterer.clearMarkers();
  },

  
  _lookForClusteredMarkers : function(e){
    if(!this.options.custommarkers) return;

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
              // $(marker.customicon.div).hide();
          }
        }else{
            // $(markers[0].customicon.div).show();
        }
      }
    }
  },

  _loadAjaxMarkers : function(e){
    var o=this;
    // al('loadAjaxMarkers');
    var params   =   {
      maxlat : o._getGmap().getBounds().getNorthEast().lat(),
      maxlng  : o._getGmap().getBounds().getNorthEast().lng(),
      minlat  :   o._getGmap().getBounds().getSouthWest().lat(),  
      minlng  :   o._getGmap().getBounds().getSouthWest().lng()
    } 
    // al(bounds);
      // al("Bounds changed", params);

      if(o.options.method!="get"){
        params._token= csrfToken();
      }
      // $target.startLoading();
      //data._token= csrfToken();
      // al(o.markers);
      params.ids= Object.keys(o.shapes);
      
      o.element.closest('.map-container').startLoading();
      // al(o.options.method);
      $.ajax({
          url: o.options.url,
          type: o.options.method,
          data: params,
          dataType: 'json',
          success: function(data){
            o.element.closest('.map-container').stopLoading();
            // al('loaded', data);
            if(data){
              $.each(data,function(key, marker){
          
                  marker.infobox= (marker.url?marker.url:(marker.infobox?marker.infobox:null));
                  o._createNewShape(marker);

               
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
    this.autocomplete.bindTo('bounds', this._getGmap());
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
            
              o._createNewShape({
                name:place.name, 
                infobox:place.name,
                location: {
                  lat:place.geometry.location.lat(),
                  lng:place.geometry.location.lng()
                }
              });
              
              
          }else{
            o._updateValue();
          }

    });
  },


  clearValue : function(settings){
    this.deleteShapes();
  },

  value : function(){
    var val=this.$forminput.val();
    if(val) return JSON.parse(val);
    return null;
  },
  
  _getShapeHtml: function(shapevalue, current){
    var html = '<li class=" '+(current?'selected':'')+'"><small>';
      switch(shapevalue.type){
        case 'circle':
            html+="<h5>CIRCLE</h5> - CENTER: LAT "+shapevalue.center.lat +", LNG "+shapevalue.center.lng +"<br/> - RADIUS: "+shapevalue.radius +" m<br/> - AREA: "+shapevalue.area+" m<sup>2</sup>"
            break;
        case 'rectangle':
            html+="<h5>RECTANGLE</h5> - EAST: "+shapevalue.bounds.east +"<br/> - NORTH: "+shapevalue.bounds.north +"<br/> - SOUTH: "+shapevalue.bounds.south+"<br/> - WEST: "+shapevalue.bounds.west+"<br/> - AREA: "+shapevalue.area+" m<sup>2</sup>"
          
            break;
        case 'polygon':
            html+="<h5>POLYGON</h5>";
            
            for(var vertex of shapevalue.path){
              html+=" - LAT "+vertex.lat +", LNG "+vertex.lng+"<br/>";
            }
            html+=" - AREA: "+shapevalue.area+" m<sup>2</sup>";
           
            break;
        case 'polyline':
            html+="<h5>POLYLINE</h5>";
            
            for(var vertex of shapevalue.path){
              html+=" - LAT "+vertex.lat +", LNG "+vertex.lng+"<br/>";
            }
            html+="- LENGTH: "+shapevalue.length+" m";
            break;
        case 'marker':
            html+="<h5>MARKER</h5> - LAT "+shapevalue.location.lat +", LNG "+shapevalue.location.lng+"";
            break;
        default:break;
      }
      html+="</small></li>";
      // console.log(html);
      return html;
  },
  _getShapeValue : function(shape){
      var value;
      switch(shape.type){
        case 'circle':
            var radius=shape.getRadius();
            value = {
                center: {
                  lat:shape.getCenter().lat(),
                  lng:shape.getCenter().lng()
                },
                radius: radius,//+" m",
                area: radius*radius*Math.PI,//+" m2"
            };
            
            break;
        case 'rectangle':
            value = {
                bounds: shape.getBounds().toJSON(),
                area: google.maps.geometry.spherical.computeArea(shape.getBounds()),//+" m2"
            
            };
            break;
        case 'polygon':
            var path=[];
            for(var vertex of shape.getPath().getArray()){
              path.push({
                lat:vertex.lat(),
                lng:vertex.lng()
              })
            }
            value = {
              path: path,
              area: (shape.getPath().getArray().length>2 ?  google.maps.geometry.spherical.computeArea(shape.getPath()) : "0") ,// +" m2" 
            };
            break;
        case 'polyline':
            var path=[];
            for(var vertex of shape.getPath().getArray()){
              path.push({
                lat:vertex.lat(),
                lng:vertex.lng()
              })
            }
            value = {
              path: path,
              length: google.maps.geometry.spherical.computeLength(shape.getPath()),//+" m"
            };
            break;
        case 'marker':
            value = {
              location: {
                lat:shape.getPosition().lat(),
                lng:shape.getPosition().lng()
              }
            };
            break;
        default:break;
      }
      return value;

  },

  _refreshCoords : function(html){
    var a=this;
    
    // console.log('_refreshCoords',this.options);
    if(this.options.showcoords){
      var value=this.value();
      // console.log('_refreshCoords',value);
      
      if(value && (value.length>0)){
        this.$coordscontainer.addClass('with-value');
      }else{
        this.$coordscontainer.removeClass('with-value');
      }

      if(!html){
        html="";
        html+="<ul class='list-unstyled '>";
        for (shape of Object.values(this.shapes)) {
          var val={
            ... a._getShapeValue(shape),
            type: shape.type,
          };
          html+= this._getShapeHtml(val, shape.uid==this.selectedShapeId);
        }
        html+="</ul>";
      }

      this.$coordscontainer.find('.coords-content').html(html); 
    }

  },
  _updateValue : function(settings){
      var a=this;  
      // al('updateValue', this.shapes);
      // if(this._isReadonly()) return;
      
      var value=[];
      var html="";
      html+="<ul class='list-unstyled'>";
      for (shape of Object.values(this.shapes)) {
        
        var val={
          ... a._getShapeValue(shape),
          type: shape.type,
        };
        value.push(val);
        
        html+= a._getShapeHtml(val, shape.uid==a.selectedShapeId);
      }
      html+="</ul>";
      // al("UPDATE",value, this.markers);
      // al("MARKERS",this.markers);

      
      // console.log('value',value);
      if(value.length==0){
        if(this.$forminput) this.$forminput.val('');
      }else{
        if(this.$forminput)  this.$forminput.val(JSON.stringify(value));
      }


      if(this.initialized){
        // al("CHANGED");
        this.$forminput.trigger('change');

      }
      a._refreshCoords(html);
  },

  
  


  _initAll : function(){
    // al("initAll",this.options);
    var a=this;
    this.$coordscontainer=this.element.closest('.map-container').find('.coords-container');
    if(this.options.showcoords){
        this.$coordscontainer.find('.coords-opener').on('click', function(e){
            $(this).closest('.coords-container').addClass('opened');
        });
        this.$coordscontainer.find('.coords-closer').on('click', function(e){
            $(this).closest('.coords-container').removeClass('opened');
        });
    }

    // console.log(this.$coordscontainer);
    this.$autocompleteinput=$('[type=text][data-map="#'+this.id+'"]');
    if(this.$autocompleteinput.length>0)
      this.autocompleteinput = this.$autocompleteinput[0];
    
    // this.$addmarkerbtn=$('button.add-marker-btn[data-map="#'+this.id+'"]');
    // if(this.$addmarkerbtn.length>0)
    //   this.addmarkerbtn = this.$addmarkerbtn[0];
    
    this.$forminput=$('[data-value][data-map="#'+this.id+'"]');
    if(this.$forminput.length>0){
      // console.log('input',this.$forminput);
      this.forminput = this.$forminput[0];
    }

    this._initTextField();
    // if(this.options.url){ 
    //   this.loadAjaxMarkers();
    // }


    if(this.options.markers){
      this._initMarkersAndShapes();
    }

    this._refreshCoords();

    var custommarker={};


    if(this.options.custommarkers){

      var custommarker=this._makeCustomMarker({
        ...this.options.markerDefaultOptions,
        ...this.options.markeroptions
      });

    }

    
    if(!this._isReadonly()){
      // console.log(this.options.shapes, this.options.shapesOptions);
      
      
      this.drawingManager = new google.maps.drawing.DrawingManager({
          drawingMode: null,
          drawingControl: true,
          drawingControlOptions: {
            position: google.maps.ControlPosition.LEFT_BOTTOM,
            drawingModes: this.options.shapes,
          },
          markerOptions: {
            ...custommarker,
            clickable: true,
            zIndex: 1,
            draggable:true
          },
          circleOptions: {
              fillColor: this.options.shapesOptions.backgroundcolor,
              strokeColor: this.options.shapesOptions.bordercolor,
              fillOpacity: this.options.shapesOptions.opacity,
              strokeWeight: this.options.shapesOptions.borderwidth,
              clickable: true,
              // editable: true,
              zIndex: 1,
              draggable:true,
              geodesic:false
          },
          rectangleOptions: {
              fillColor: this.options.shapesOptions.backgroundcolor,
              strokeColor: this.options.shapesOptions.bordercolor,
              fillOpacity: this.options.shapesOptions.opacity,
              strokeWeight: this.options.shapesOptions.borderwidth,
              clickable: true,
              // editable: true,
              zIndex: 1,
              draggable:true,
              geodesic:false
          },
          polygonOptions: {
              fillColor: this.options.shapesOptions.backgroundcolor,
              strokeColor: this.options.shapesOptions.bordercolor,
              fillOpacity: this.options.shapesOptions.opacity,
              strokeWeight: this.options.shapesOptions.borderwidth,
              clickable: true,
              // editable: true,
              zIndex: 1,
              draggable:true,
              geodesic:false
          },
          polylineOptions: {
              strokeColor: this.options.shapesOptions.bordercolor,
              strokeWeight: this.options.shapesOptions.borderwidth,
              clickable: true,
              // editable: true,
              zIndex: 1,
              draggable:true,
              geodesic:false
          },
      });

      this.drawingManager.setMap(this.gmap);

      google.maps.event.addListener(this.drawingManager, 'overlaycomplete', function(event) {
         
        if(!a.options.multiple){
          // a.deleteMarkers();
          a.deleteShapes();
        }
        a.addShapeEvents(event.type, event.overlay);
        a._updateValue();
        
      });
      
      //
      a._addKeyboardEvents();
      
    }
    a._refreshCoords();

  },
  generateUid(type){
    return type+"_"+Date.now().toString(36) + Math.random().toString(36).substring(2);

  },
  _clearShapeSelection(e){
    // _d('clearShapeSelection');
    if(this.selectedShape){
        if(this.selectedShape.type!='marker'){
            this.selectedShape.setEditable(false);
        }else{
            this.selectedShape.setAnimation(null);
        }
        this.selectedShapeId=null;
    }

  },

  removeSelectedShape() {
    // _d('deleteSelectedShape');
    this.removeShape(this.selectedShapeId);
    
      

  },
  shapeIndex(uid){
      return this.shapes.findIndex((shape) => {
          return(shape.uid==uid);
      } );
  },
  removeShape(id){
      var index=this.shapeIndex(id);
      if(index>=0){
          // console.log('removeShape '+id, index,  this.selectedShape);
          if(this.selectedShape.type=='marker'){
            if(this.options.cluster)  this.markerClusterer.removeMarker(this.selectedShape);
          }

          this.selectedShape.setMap(null);
          this.selectedShape.setVisible(false);
          
          this.shapes.splice(index,1);
      }
      this._clearShapeSelection();
      this._updateValue();
      if(this.shapes.length==0){
        //amago el codi
          this.$coordscontainer.removeClass('opened');
      }
  },
  selectShape(shape){
      // console.log('selectShape',shape.uid,this.selectedLayerId);
      if(!this.selectedShapeId || shape.uid!=this.selectedShapeId){
          this._clearShapeSelection();
          this.selectedShape=shape;
          
          if(shape.type!='marker'){
            shape.setEditable(true);
              
          }else{
            if(this.options.multiple){
              // shape.setAnimation(google.maps.Animation.BOUNCE);
            }
          }
          // shape.setEditable(true);
          this.selectedShapeId=shape.uid;
      }else{
          // this._clearShapeSelection();

      }
      
      
  },
  addShapeEvents: function (type, shape){
    var a =this;
    // console.log('addShapeEvents',type,shape);
    shape.uid=a.generateUid(type);
    shape.type=type;
    // google.maps.event.addListener(shape, 'rightclick', function(event2) {
    //   // console.log(event2.domEvent, shape);
    //   event2.domEvent.preventDefault();
    //   event2.domEvent.stopPropagation();
      
    //   // if(shape.uid==a.selectedShapeId){
    //     a.selectShape(shape);
    //     a.removeShape(shape.uid);
    //   // }else{
    //   //   a.selectShape(shape);

    //   // }

    // });
    google.maps.event.addListener(shape, 'click', function(event2) {
      if (event2.vertex !== undefined) {
        // console.log('removing vertex', event2);
          event2.domEvent.preventDefault();
          event2.domEvent.stopPropagation();
          if (shape.type === google.maps.drawing.OverlayType.POLYGON) {
              var path = shape.getPaths().getAt(event2.path);
              path.removeAt(event2.vertex);
              if (path.length < 2) {
                a.removeShape(shape.uid);
              }
          }
          if (shape.type === google.maps.drawing.OverlayType.POLYLINE) {
              var path = shape.getPath();
              path.removeAt(event2.vertex);
              if (path.length < 2) {
                a.removeShape(shape.uid);
              }
          }
      }else{
          a.selectShape(shape);
          a._refreshCoords();
      }
  });
  
  google.maps.event.addListener(shape, 'dragstart', function (e) {
      // e.domEvent.stopPropagation();
      a.selectedLayerId=null;
      a.selectShape(shape);
      a._refreshCoords();
  });
  
  

  if( type === google.maps.drawing.OverlayType.MARKER ){
      google.maps.event.addListener(shape, 'dragend', function (e) {
          a._updateValue();
      });

   
      // marker.addListener('click', function() {
      shape.addListener('spider_click', function() {
          // al("marker clicked");
          // al(this);
          if(this.infobox){
            a._showInfo(this,this.infobox);
          }
          
      });
      

      
      // al("position",marker.getPosition());
      a.bounds.extend(shape.getPosition());
      
      a.overlappingmarkers.addMarker(shape); 

      
      // console.log('a.options.cluster',a.options.cluster,shape);

      if(a.options.cluster){
         a.markerClusterer.addMarker(shape);
      }

      // al(marker);
      //añado al array de markers
      // o.markers[id] = marker; 
      
      // o.markers.push(marker);
      // al("markers  ",o.markers);

      // if(a.options.fitbounds) a.setCenter(shape.getPosition());
  }

  if( type === google.maps.drawing.OverlayType.RECTANGLE || type === google.maps.drawing.OverlayType.CIRCLE ){
      google.maps.event.addListener(shape, "bounds_changed", (e) => {
          a._updateValue();

      });

  }

  if( type === google.maps.drawing.OverlayType.POLYGON || type === google.maps.drawing.OverlayType.POLYLINE ){
      google.maps.event.addListener(shape.getPath(), 'insert_at', (e) => {
          // _d('We inserted a point');
          a._updateValue();
      });
  
      google.maps.event.addListener(shape.getPath(), 'remove_at', (e) => {
          // _d('We removed a point');
          a._updateValue();
      });
  
      google.maps.event.addListener(shape.getPath(), 'set_at', (e) => {
          // _d('We set a point');
          a._updateValue();
      });
 
    }

    a.shapes.push(shape);
    a.selectShape(shape);
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
      o.infoWindow.setPosition(o._getGmap().getCenter());
      o.infoWindow.open(o.map);
     
  },

  _addKeyboardEvents : function(e){
    var a=this;

    document.addEventListener("click", function(e){
      // console.log('click doc', $(e.target).closest('.map-container').is(a.element.closest('.map-container')));

       if($(e.target).closest('.map-container').is(a.element.closest('.map-container'))){
        a.isActive=true;
      }else{
         a.isActive=false;
         a._clearShapeSelection();
         a.drawingManager.setDrawingMode(null);

       }

      //  console.log($(e.target).is('.coords-container') , $(e.target).closest('.coords-container').length);

       if(!a.isActive || $(e.target).is('.coords-container') ){
        a.$coordscontainer.removeClass('opened');
       }
    });

    document.addEventListener("keydown", function(e){
      // console.log('keypress', e.key);
      // console.log(  a.element.closest('.map-container').is(':focus-within') ) ;
      let isInput = /^(?:input|select|textarea)$/i.test(e.target.nodeName);
      if(isInput) return;
      if(!a.isActive) return;

      // console.log(e.target.nodeName );
      switch(e.key){
          case "Delete":
          case "Backspace":
              a.removeSelectedShape();
              // if(!a.options.multiple) a.deleteMarkers();
              break;
          case "g":
              a.drawingManager.setDrawingMode(null);
              a._clearShapeSelection();
              break;
          case "c":
              a.drawingManager.setDrawingMode(google.maps.drawing.OverlayType.CIRCLE);
              a._clearShapeSelection();
              break;
          case "r":
              a.drawingManager.setDrawingMode(google.maps.drawing.OverlayType.RECTANGLE);
              a._clearShapeSelection();
              break;
          case "p":
              a.drawingManager.setDrawingMode(google.maps.drawing.OverlayType.POLYGON);
              a._clearShapeSelection();
              break;
          case "l":
              a.drawingManager.setDrawingMode(google.maps.drawing.OverlayType.POLYLINE);
              a._clearShapeSelection();
              break;
          case "m":
              a.drawingManager.setDrawingMode(google.maps.drawing.OverlayType.MARKER);
              a._clearShapeSelection();
              break;
          // case "d":
          //     if(this.selectedShape){
          //         this.duplicateShape();
          //     }
          //     break;
          default:break;
      }
    });


    // if(isInput) return;

    // console.log('_addKeyboardEvents', e.which,e.key);
    
  },

});
