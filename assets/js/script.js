$(document).ready(function(e) {
    $('.geocomplete').geocomplete();
	
	
	$('#search_class_form').on('submit', function(){
		$self = $(this);
		
		window.location.href = base_url + 'landing/search?' + $self.serialize();
		return false;
	});
	
	
	
	setTimeout(function(){
		//trigger location to display map onload
		$('.request_quote_location').trigger("geocode");
	}, 2);
	
	
	//maps and autocomplete address
	$(".request_quote_location").geocomplete()
	.bind("geocode:result", function(event, result){
		//if(window.location.hash == false){
		//}
		$('.panel-map').css('margin-top','0px');
		$('.tasks_holder').html('');	



		var the_loc = $(".request_quote_location").val();
		
		
		var stateObj = {};

		window.history.pushState(stateObj, '', 'search?'+$('#request_form').serialize());
		
		//console.log(result.address_components[2].short_name);
		console.log(result.geometry.location);
		var location_lat = result.geometry.location.A;
		var location_long = result.geometry.location.F;
		$(".request_quote_location").siblings('[name="lat"]').val(location_lat);
		$(".request_quote_location").siblings('[name="long"]').val(location_long);
		//working maps sample
		var geocoder;
		var map;
		var places;
		var markers = [];
		

		var infowindow =  new google.maps.InfoWindow({
			content: '',
			maxWidth: 400,
			minWidth: 300
		});
		// fetch Places JSON from /data/places
		// loop through and populate the map with markers
		var fetchPlaces = function() {
			
			var the_data = {
//				"the_loc": the_loc,
				"location_lat": location_lat,
				"location_long": location_long
			};
			
			the_data = $('#request_form').serialize() + "&" + $.param(the_data); 
			console.log(the_data);
			var result_table = $('.space_datatable').DataTable();
			
			$('.space_datatable').hide().closest('#DataTables_Table_0_wrapper').hide();
			$('.space_results').show().html('<p class="lead text-muted text-center" style="padding-top: 150px;"><i class="fa fa-spinner fa-spin"></i><br />Loading...</p>');
			
			$.ajax({
				type: "POST",
				url : base_url+'landing/search_list',
				dataType : 'json',
				data: the_data,
				success : function(response) {
					console.log(response);
					if (response.status == 'OK') {
	
						places = response.places;
						var space_html = '';
						
										
						
						// loop through places and add markers
						for (p in places) {
							
							var btn_data = 'data-id="'+places[p].id+'" data-name="'+places[p].name+'" data-seeker="'+places[p].seeker_name+'" data-geo_name="'+places[p].geo_name+'" data-distance="'+places[p].distance+'" data-access="'+places[p].access+'" data-security="'+places[p].security+'" data-size="'+places[p].size+'" data-price="'+places[p].price+'" data-image="'+places[p].image+'" data-services="'+places[p].services+'" data-seekerimg="'+places[p].seeker_img+'" data-btntext="'+places[p].button_text+'" data-btnclass="'+places[p].button_class+'" data-seekerid="'+places[p].seeker_id+'"';
							
							space_html += '<tr '+btn_data+' class="req_book_btn">';
							space_html += '<td class="hidden">';
							space_html += places[p].distance;
							space_html += '</td>';
							
							space_html += '<td>';
							space_html += '<div class="row">';
							space_html += '  <div class="col-sm-5">';
							
						
							space_html += '<div class="fb-profile img-thumbnail">';
							space_html += '    <img align="left" class="fb-image-lg" src="'+places[p].image+'" alt="Profile image example"/>';
							space_html += '    <img align="left" class="fb-image-profile img-circle" src="'+places[p].seeker_img+'" alt="Profile image example"/>';
							space_html += '    <div class="fb-profile-text">';
							space_html += '       <h1>'+places[p].name+'</h1>';
							space_html += '        <p>'+places[p].seeker_name+'</p>';
							space_html += '    </div>';
							space_html += '</div>';
						
							
							
//							space_html += '    <a href="#" class="thumbnail req_book_btn" '+btn_data+'>';
//							space_html += '      <img src="'+places[p].image+'" alt="Space Image" class="img-responsive">';
//							space_html += '    </a>';						
							space_html += '  </div>';
							space_html += '  <div class="col-sm-7">';
							space_html += '      <div class="caption req_details">';
							space_html += '        <h3>Details</h3>'; //'+places[p].name + " by " + places[p].seeker_name+'</h3>';
							space_html += '        <p>Location: '+places[p].geo_name+'</p>';
							space_html += '        <p>Distance: '+places[p].distance+' km.</p>';
							space_html += '        <p>Access: '+places[p].access+'</p>';
							space_html += '        <p>Security: '+places[p].security+'</p>';
							space_html += '        <p>Trader Services: '+places[p].services+'</p>';
							space_html += '        <p>Size: '+places[p].size+'</p>';
							space_html += '        <p>Price: $'+places[p].price+'</p>';
							
							
						//	space_html += '        <p><a href="#" class="btn btn-orange2 req_book_btn btn-sm '+places[p].button_class+'" '+btn_data+' role="button"><i class="fa fa-search"></i> View Details</a></p>'; //'+places[p].button_text+'

							
							space_html += '      </div>';
							space_html += '  </div>';						
							space_html += '</div>';
							
							space_html += '</td>';
							space_html += '</tr>';
							
	
							//create gmap latlng obj
							tmpLatLng = new google.maps.LatLng( places[p].geo[0], places[p].geo[1]);
	
							// make and place map maker.
							var marker = new google.maps.Marker({
								map: map,
								position: tmpLatLng,
								title : places[p].name + " by " + places[p].seeker_name,
								//icon: base_url + 'assets/img/google-maps-marker.png'
							});
	
							bindInfoWindow(marker, map, infowindow, '<div id="content" style="text-align: center;"><img src="'+places[p].image+'" alt="Space Image" class="img-thumbnail req_book_btn" '+btn_data+' style="width: 150px; margin: 0 auto;"><p><b>'+places[p].name + ' by ' + places[p].seeker_name+'</b><br>Price: $' + places[p].price +'<br><button class="btn btn-xs btn-orange2 req_book_btn" '+btn_data+' style="margin-top: 5px;">View Details</button></p></div>'); //' + places[p].geo_name +'<br>
	
							// not currently used but good to keep track of markers
							markers.push(marker);
	
						}
						
						//append html
						if(space_html != ''){
							
							result_table.destroy();

					 		$('.space_results').hide();
					 		$('.space_datatable').show().closest('#DataTables_Table_0_wrapper').show();
							$('.space_datatable').find('tbody').html(space_html);
							result_table = $('.space_datatable').DataTable({
								"bLengthChange": false,
								"searching": false
							});							
							
						}
						else{
					 		$('.space_datatable').hide().closest('#DataTables_Table_0_wrapper').hide();
							$('.space_results').show().html('<p class="lead text-muted text-center" style="padding-top: 150px;">No match found.</p>');
						}

	
					}
				},
				error: function(err){
					console.log(err);
				}
			})
	
	
		};
	
		// binds a map marker and infoWindow together on click
		var bindInfoWindow = function(marker, map, infowindow, html) {
			google.maps.event.addListener(marker, 'click', function() {
				infowindow.setContent(html);
				infowindow.open(map, marker);
			});
	
		} 
		

	
		var initialize = function () {
			
			// create the geocoder
			geocoder = new google.maps.Geocoder();
			
			// set some default map details, initial center point, zoom and style
			var mapOptions = {
				center: new google.maps.LatLng(location_lat,location_long),
				zoom: 7,
				mapTypeId: google.maps.MapTypeId.ROADMAP,
				scrollwheel: false
			};
			
			// create the map and reference the div#map-canvas container
			map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
			
			// fetch the existing places (ajax) 
			// and put them on the map
			fetchPlaces();
			
			// Limit the zoom level
			google.maps.event.addListener(map, 'zoom_changed', function() {
			if (map.getZoom() < 5) map.setZoom(5);
			});		
			
			google.maps.event.addListener(map, "click", function(event) {
				infowindow.close();
			});
			
			google.maps.event.addListener(infowindow, 'domready', function(){
				//$(".gm-style-iw").next("div").hide();
				$(".gm-style-iw").css("left", function() {
					return ($(this).parent().width() - $(this).width());
				}).next("div").remove();			
			});			
			
		}
		
		
		// when page is ready, initialize the map!
		//google.maps.event.addDomListener(window, 'load', initialize);
		initialize();

	
	});//end of geocomplete search
	
	
	
	
	
	
	
	
});//document.ready