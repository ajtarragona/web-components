if (typeof google !== 'undefined') {
	
	CustomMarker = function(latlng, map, args) {
		// this.latlng = latlng;
		// al(latlng instanceof google.maps.LatLng);

		if(latlng instanceof google.maps.LatLng){
			this.latlng= latlng;
		}else{
			this.latlng= new google.maps.LatLng(latlng.lat, latlng.lng);
		}

		this.args = args;
		// al(this);	
		this.setMap(map);	
	}

	CustomMarker.prototype = new google.maps.OverlayView();

	CustomMarker.prototype.draw = function() {
		
		var self = this;
		
		var div = this.div;
		
		if (!div) {
		
			div = this.div = document.createElement('div');
			google.maps.OverlayView.preventMapHitsFrom(div);


			div.className = 'map-custom-marker';
			
			div.style.position = 'absolute';
			div.style.cursor = 'pointer';
			// div.style.width = '30px';
			// div.style.height = '30px';
			// var bgcolor= this.args.color?this.args.color:"#e1524e";

			// div.style.background = bgcolor;

			// div.innerHTML='<div class="after" style="border-top-color:'+bgcolor+'"></div>';
			if(this.args.icon){
				div.innerHTML +=_icon(this.args.icon, (this.args.iconcolor?"color:"+this.args.iconcolor:"") );
			}
			if (typeof(self.args.marker_id) !== 'undefined') {
				div.dataset.marker_id = self.args.marker_id;
			}
			
			google.maps.event.addDomListener(div, "click", function(event) {			
				google.maps.event.trigger(self, "click");
			});
			
			var panes = this.getPanes();
			panes.overlayImage.appendChild(div);
		}
		
		this.setPosition(this.latlng);
		
	};

	CustomMarker.prototype.remove = function() {
		al("custom marker remove", this.div);
		if (this.div) {
			this.div.parentNode.removeChild(this.div);
			this.div = null;
		}	
	};

	CustomMarker.prototype.getPosition = function() {
		return this.latlng;	
	};

	CustomMarker.prototype.setPosition = function(latlng) {
		if(latlng instanceof google.maps.LatLng){
			this.latlng= latlng;
		}else{
			this.latlng= new google.maps.LatLng(latlng.lat, latlng.lng);
		}
		var point = this.getProjection().fromLatLngToDivPixel(this.latlng);
		
		if (point) {
			this.div.style.left = (point.x ) + 'px';
			this.div.style.top = (point.y ) + 'px';
		}
	};

}