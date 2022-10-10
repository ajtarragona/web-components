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
  MAP_PIN : 'M0-48c-9.8 0-17.7 7.8-17.7 17.4 0 15.5 17.7 30.6 17.7 30.6s17.7-15.4 17.7-30.6c0-9.6-7.9-17.4-17.7-17.4z',
  SQUARE_PIN : 'M22-48h-44v43h16l6 5 6-5h16z',
  SHIELD : 'M18.8-31.8c.3-3.4 1.3-6.6 3.2-9.5l-7-6.7c-2.2 1.8-4.8 2.8-7.6 3-2.6.2-5.1-.2-7.5-1.4-2.4 1.1-4.9 1.6-7.5 1.4-2.7-.2-5.1-1.1-7.3-2.7l-7.1 6.7c1.7 2.9 2.7 6 2.9 9.2.1 1.5-.3 3.5-1.3 6.1-.5 1.5-.9 2.7-1.2 3.8-.2 1-.4 1.9-.5 2.5 0 2.8.8 5.3 2.5 7.5 1.3 1.6 3.5 3.4 6.5 5.4 3.3 1.6 5.8 2.6 7.6 3.1.5.2 1 .4 1.5.7l1.5.6c1.2.7 2 1.4 2.4 2.1.5-.8 1.3-1.5 2.4-2.1.7-.3 1.3-.5 1.9-.8.5-.2.9-.4 1.1-.5.4-.1.9-.3 1.5-.6.6-.2 1.3-.5 2.2-.8 1.7-.6 3-1.1 3.8-1.6 2.9-2 5.1-3.8 6.4-5.3 1.7-2.2 2.6-4.8 2.5-7.6-.1-1.3-.7-3.3-1.7-6.1-.9-2.8-1.3-4.9-1.2-6.4z',
  ROUTE : 'M24-28.3c-.2-13.3-7.9-18.5-8.3-18.7l-1.2-.8-1.2.8c-2 1.4-4.1 2-6.1 2-3.4 0-5.8-1.9-5.9-1.9l-1.3-1.1-1.3 1.1c-.1.1-2.5 1.9-5.9 1.9-2.1 0-4.1-.7-6.1-2l-1.2-.8-1.2.8c-.8.6-8 5.9-8.2 18.7-.2 1.1 2.9 22.2 23.9 28.3 22.9-6.7 24.1-26.9 24-28.3z',
  SQUARE : 'M-24-48h48v48h-48z',
  SQUARE_ROUNDED : 'M24-8c0 4.4-3.6 8-8 8h-32c-4.4 0-8-3.6-8-8v-32c0-4.4 3.6-8 8-8h32c4.4 0 8 3.6 8 8v32z',
  CIRCLE : 'M 24 -24 C 24 -10.745 13.255 0 0 0 C -13.255 0 -24 -10.745 -24 -24 C -24 -37.255 -13.255 -48 0 -48 C 13.255 -48 24 -37.255 24 -24 Z',
  CIRCLE_PIN : 'M -0.438 -0.028 L -4.618 -8.644 C -15.663 -10.797 -24 -20.525 -24 -32.2 C -24 -45.455 -13.255 -56.2 0 -56.2 C 13.255 -56.2 24 -45.455 24 -32.2 C 24 -20.19 15.179 -10.241 3.662 -8.478 L -0.438 -0.028 Z'
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
  gmap: null,

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
  
      this.markers=[];
  
      this.element.addClass('map-init');
  
      this.currentId=0;
      this.initialized=false;
  
      this.id=this.element.attr("id");
      this.options = $.extend({}, this.options, this.element.data()); 
      if(this.options.customicons){
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


      

      this.$addmarkerbtn.on('click',function(){
        o.addMarker(o._getGmap().getCenter());
      });


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

  _initMarkers : function(){
    // al('initMarkers');
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
          if(tmpmarker.location){
            this.addMarker(
              tmpmarker.location, 
              tmpmarker.name?tmpmarker.name:null, 
              tmpmarker.url?tmpmarker.url:(tmpmarker.infobox?tmpmarker.infobox:null),
              tmpmarker.id?tmpmarker.id:null,
              {
                icon : tmpmarker.icon?tmpmarker.icon:null,
                backgroundcolor : tmpmarker.backgroundcolor?tmpmarker.backgroundcolor:null,
                color: tmpmarker.color?tmpmarker.color:null,
                bordercolor: tmpmarker.bordercolor?tmpmarker.bordercolor:null,
                borderwidth: (tmpmarker.borderwidth || tmpmarker.borderwidth==0 ) ? tmpmarker.borderwidth :null,
                label: (tmpmarker.label?tmpmarker.label:null),
                opacity: ((tmpmarker.opacity || tmpmarker.opacity==0 )?tmpmarker.opacity:1) ,
                shape: (tmpmarker.shape?tmpmarker.shape:'MAP_PIN') ,
                labelposition: (tmpmarker.labelposition?tmpmarker.labelposition:'internal') ,
              }
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
            {
              icon : tmpmarker.icon?tmpmarker.icon:null,
              backgroundcolor : tmpmarker.backgroundcolor?tmpmarker.backgroundcolor:null,
              color: tmpmarker.color?tmpmarker.color:null,
              bordercolor: tmpmarker.bordercolor?tmpmarker.bordercolor:null,
              borderwidth: (tmpmarker.borderwidth || tmpmarker.borderwidth==0 )?tmpmarker.borderwidth:null,
              label: (tmpmarker.label?tmpmarker.label:null),
              opacity: ((tmpmarker.opacity || tmpmarker.opacity==0 )?tmpmarker.opacity:1) ,
              shape: (tmpmarker.shape?tmpmarker.shape:'MAP_PIN'),
              labelposition: (tmpmarker.labelposition?tmpmarker.labelposition:'internal') ,
            }
          );
        }
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


  addMarker : function(coords,name,infobox,id, iconsettings){
    var o=this;

    // al("addMarker ", coords);
    // al(coords);
    // al(o.markers);
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
        map: this._getGmap(),
        
      };


      if(this.options.customicons && iconsettings){

        // al('iconsettings',iconsettings);
        // var imgurl = route('webcomponents.markerimage',iconsettings).url();
        // var imgpath='<svg viewBox="0 0 500 500" xmlns="http://www.w3.org/2000/svg">';
        // var pathstyle=''; //style="stroke: '+iconsettings.bordercolor+'; fill: '+iconsettings.backgroundcolor+'; stroke-width: '+iconsettings.borderwidth+';"
        // var imgpath='M 19.001 0 C 22.866 0 26.155 1.295 28.865 3.88 C 31.575 6.466 32.933 9.604 32.933 13.291 C 32.933 15.135 32.453 17.246 31.482 19.624 C 30.516 22.003 29.345 24.233 27.976 26.316 C 26.606 28.397 25.249 30.343 23.909 32.158 C 22.568 33.971 21.431 35.412 20.498 36.484 L 18.999 38 C 18.626 37.582 18.129 37.034 17.502 36.351 C 16.878 35.667 15.76 34.298 14.137 32.247 C 12.514 30.197 11.097 28.204 9.881 26.269 C 8.668 24.336 7.56 22.151 6.564 19.713 C 5.564 17.275 5.066 15.135 5.066 13.291 C 5.066 9.604 6.425 6.466 9.133 3.88 C 11.845 1.295 15.133 0 18.998 0 L 19.001 0 Z';
        // imgpath+='</svg>';
        // console.log('svg',imgpath);
        
        //28x38

        var markershape= iconsettings.shape ? iconsettings.shape.toUpperCase() : 'MAP_PIN';
// al('markershape',markershape);
        var labeltop=-25;
        if($.inArray(markershape, ['SHIELD','ROUTE','SQUARE','CIRCLE','SQUARE_ROUNDED'])>=0){
            labeltop=-22;
        }else if($.inArray(markershape, ['CIRCLE_PIN'])>=0){
          labeltop=-30;
        }
        if(iconsettings.labelposition && iconsettings.labelposition == "external"){
          labeltop=20;
        }

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
          scale: 0.9,
          labelOrigin : new google.maps.Point(0, labeltop)
        };

        markerargs.icon.strokeColor = iconsettings.bordercolor ? iconsettings.bordercolor:'#000000';
        markerargs.icon.fillColor = iconsettings.backgroundcolor ? iconsettings.backgroundcolor:'#bf002c';
        markerargs.icon.fillOpacity = (iconsettings.opacity || iconsettings.opacity === 0) ? iconsettings.opacity:1,
        markerargs.icon.strokeWeight = (iconsettings.borderwidth || iconsettings.borderwidth === 0) ? iconsettings.borderwidth : 1;

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
              fontSize: "16px"
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

        // al('addMARKER',markerargs);


        

      }

      marker = new google.maps.Marker(markerargs);
      // marker= new MarkerWithLabel(markerargs);

      // if(this.options.customicons && iconsettings.icon){
      //   // al("icon",icon);
      //   // al("coords",coords);
      //   // al("icon",icon);
      //   var iconargs={
      //     icon: iconsettings.icon,
      //   };

      //   if(iconsettings.color) iconargs.iconcolor= iconsettings.color;

      //   var iconmarker = new CustomMarker(
      //       coords, 
      //       this._getGmap(),
      //       iconargs
      //     );
      //     marker.customicon=iconmarker;
      //     // al("end");

      // }
     
      
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
        // al("marker clicked");
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
            // al('loaded', data);
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
                    {
                      icon: (marker.icon?marker.icon:null),
                      backgroundcolor: (marker.backgroundcolor?marker.backgroundcolor:null) ,
                      color: (marker.color?marker.color:null) ,
                      bordercolor: (marker.bordercolor?marker.bordercolor:null) ,
                      borderwidth: ((marker.borderwidth || marker.borderwidth==0 ) ?marker.borderwidth:null) ,
                      label: (marker.label?marker.label:null),
                      opacity: ((marker.opacity||marker.opacity==0)?marker.opacity:1) ,
                      shape: (marker.shape?marker.shape:'MAP_PIN') ,
                      labelposition: (marker.labelposition?marker.labelposition:'internal') ,
                    }
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
      o.infoWindow.setPosition(o._getGmap().getCenter());
      o.infoWindow.open(o.map);
     
  }



});
