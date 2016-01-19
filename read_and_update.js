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
		  var jsObj = JSON.parse(http_request.responseText);
          // object keys = name, value, info, type
		  // 1: picture=light, value = 0/1
		  // 2: picture=light, value = 0-100
		  // 3: picture=socket, value = 0/1
		  // 4: picture=temperature, value = -255 - 255
		  var name = jsObj.points[0].name;
		  var value = jsObj.points[0].value;
		  var type = jsObj.points[0].type;
		  document.getElementById("point1").innerHTML = name;
		  document.getElementById("state1").innerHTML = value;
		 
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
		  
	   }
	}
	
	http_request.open("POST", data_file, true);
	http_request.send();
 }

