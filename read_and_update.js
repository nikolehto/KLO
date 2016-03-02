loadJSON();
setInterval(loadJSON, 2000); 


function loadJSON(){
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
				//if (dict.hasOwnProperty(key)) {
					//alert("Key is " + key + ", value is" + dict[key]);
					document.getElementById(key).innerHTML = dict[key]; // if element found, if not do somtin
				//}
			}

			var image = document.getElementById('Object1');
			
			//if (value == 1) {
				image.src = "img/light_on.png"
			//}
			//else {
			//	image.src = "img/light_off.png"
			//}
			/*
			switch(type) {
				case "1": 
					if (value === "1") {
						var c = document.getElementById("myCanvas");
						var ctx = c.getContext("2d");
						ctx.fillStyle = "#FF0000";
						ctx.fillRect(0,0,150,75);
					}
					break;
				default:
					break;
			}
			*/

		}
	//	else {
	//		getElementById("a").innerHTML = "Vailed"
		
	//	}
	}

	//function changeImage(object, state) {
	//var image = document.getElementById('Object1');
	//if () {
	//	image.src = "pic_bulboff.gif";
	//} else {
	//	image.src = "pic_bulbon.gif";
	//}

	http_request.open("POST", data_file, true);
	http_request.send();
 }

