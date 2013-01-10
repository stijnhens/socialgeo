

	//RESIZE MAPS
  $(document).ready(function(){
		resizeMaps();
		
		$(window).resize(function() {
			resizeMaps();
		});
		
		
		//MAPS = SQUARE
		function resizeMaps() {
		  var gmapsWidth = $('#mapHome').width();
		  
			//$('.gmaps').css('width', gmapsWidth).css('height', gmapsWidth);
			$('#mapHome').css('width', gmapsWidth).css('height', '500px');
		}
		    
		if($('#mapHome').length){
		    /* Coordinates */
		    var coords1 = new google.maps.LatLng(51.053468,3.73038);
		
		    /* Custom marker */
		    var image = 'http://f.cl.ly/items/1U3f3p1I100K352q143v/marker.png';
		
		
		    /* Map options */
			    
			
			var styles = [
			{
			featureType: 'all',
					elementType: 'all',
					stylers: [
						{ hue: '#dce8f5' },
						{ saturation: 50 },
						{ lightness: 50 }
					]
			}
			];
			
			var StyledMap = new google.maps.StyledMapType(styles, {name: 'Social Geo'});
			
			
			
			    /* Map inits */
			var mapOptions1 = { center: coords1, zoom: 12/* , mapTypeId: google.maps.MapTypeId.ROADMAP */, disableDefaultUI: true, mapTypeControlOptions: {mapTypeIds: [google.maps.MapTypeId.ROADMAP, "map_style"]} };    
			
			var map1 = new google.maps.Map(document.getElementById("mapHome"), mapOptions1);
			
			map1.mapTypes.set('map_style', StyledMap);
			map1.setMapTypeId('map_style');
		}
		
          
          
          
  });
      
               
               