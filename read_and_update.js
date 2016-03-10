loadJSON();
setInterval(loadJSON, 2000); 
$( ".light" ).draggable({ containment: "#house", scroll: false });
$( ".light" ).draggable( 'disable' );
		
function draggableChange() {
	var elem = document.getElementById("dragButton");
	
	if (elem.value=="Salli valojen liikutus") {
		elem.value = "Estä valojen liikutus";
		$( ".light" ).draggable( 'enable' );
	}
	
    else { 
		elem.value = "Salli valojen liikutus";
		$( ".light" ).draggable( 'disable' );
	}
	}

function updatePosition(object) {
	var position = object.position();
		
		//$( "p:first" ).text( "left: " + position.left + ", top: " + position.top );
		//return position;
	}

function loadJSON(){ // http://www.w3schools.com/ajax/ajax_examples.asp
	var data_file = "data.json";
	var http_request;
	if (window.XMLHttpRequest) {
		// Opera 8.0+, Firefox, Chrome, Safari
		http_request = new XMLHttpRequest();
	} else {
		// Internet Explorer Browsers
		http_request = new ActiveXObject("Microsoft.XMLHTTP");
	}
		  
	http_request.onreadystatechange = function(){
	
		if (http_request.readyState == 4  ){
			// create javascript object
			var dict = JSON.parse(http_request.responseText);
			
			for (var key in dict) {
				//document.getElementById(key).innerHTML = dict[key];
				var value = dict[key];
				var image = document.getElementById(key);
	
				// hard coded source, look comment -> 
				if (value == 1) {
					image.src = "img/bulb_on.png"; // If different types of objects wanted. This must have image position from variables.json  (out of focus ) 
				}
				else {
					image.src = "img/bulb_off.png";
				}
			}
		}
	}


	http_request.open("POST", data_file, true);
	http_request.send();
 }

$(function(){ // http://stackoverflow.com/questions/19392453/jquery-show-hide-sliding-panel-from-left-side
	$('.slider-arrow').click(function(){
		if($(this).hasClass('show')){
		$( ".slider-arrow, .panel" ).animate({
		  right: "+=200"
		  }, 700, function() {
			// Animation complete.
		  });
		  $(this).html('&raquo;').removeClass('show').addClass('hide');
		}
		else {   
		$( ".slider-arrow, .panel" ).animate({
		  right: "-=200"
		  }, 700, function() {
			// Animation complete.
		  });
		  $(this).html('&laquo;').removeClass('hide').addClass('show');    
		}
	});
});
