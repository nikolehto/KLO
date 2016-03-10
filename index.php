<!DOCTYPE html>
<html>
   <head>   
		<title>Valo-ohjaus Demo</title>
		<link rel="stylesheet" href="style.css">
		<script src="jquery-2.2.1.min.js"></script>
		<script src="jquery-ui.js"></script>
   </head>
	
	<body>
		<div class="panel">
				
				<input id="dragButton" type="button" onclick="draggableChange()" value="Salli valojen liikutus"> </button>
				
				
		</div>
  	<a href="javascript:void(0);" class="slider-arrow show">&laquo;</a>    

   
   
    <h1>Valo-ohjaus Demo</h1>
	
	<div id="house"> 

	<?php  
	function array_key_match($array1, $array2) { 
		// return 1 if keys of the array are same, else 0
		if (is_array($array1) && is_array($array2)) {
			$array = array_diff_key($array1, $array2) + array_diff_key($array2, $array1); 
			if(empty($array)){
				return 1;
			}
			else {
				return 0;
			}
		}
		else if (is_array($array1)) return 0; 
		else if (is_array($array2)) return 0; 
		else return 1; 
	}
	
	// startsWith function from http://stackoverflow.com/questions/834303/startswith-and-endswith-functions-in-php
	function startsWith($haystack, $needle) {
		// search backwards starting from haystack length characters from the end
		return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== false;
	}
	
	// compare data- and variable- keys
	$string = file_get_contents("data.json");
	$data_json = json_decode($string, true);
	$string = file_get_contents("variables.json");
	$variables_json = json_decode($string, true);
	
	$id_ok = array_key_match($data_json, $variables_json);
	
	// if variable_keys doesn't match with data_keys, create new variables_json 
	if ($id_ok == 0)
	{
		// parameters not found do you want generate new parameter file? All parameters will be initialized with default values
		$image = ["on"=>"", "off"=>""];
		$coordinate = ["x"=>"20", "y"=>"120"];
		$fillarray = ["name"=>"", "value"=>"0", "info"=>"", "type"=> "", "coordinate"=>$coordinate, "image"=>$image];
		
		$variables_json = [];
		$keys = array_keys($data_json);
		foreach($keys as $key) {
			$fillarray["name"] = $key;
			if (startsWith($key, "light")) {
				$fillarray["type"] = "light";
				$fillarray["image"]["on"] = "img/bulb_on.png";
				$fillarray["image"]["off"] = "img/bulb_off.png";
			}
			elseif(startsWith($key, "socket")) {
				$fillarray["type"] = "socket";
				$fillarray["image"]["on"] = "img/socket_on.png";
				$fillarray["image"]["off"] = "img/socket_off.png";
			}
			else {
				$fillarray["type"] = "";
				$fillarray["image"]["on"] = "img/default_on.png";
				$fillarray["image"]["off"] = "img/default_off.png";
			}
			
			$variables_json[$key] = $fillarray;
			//echo $fillarray["coordinate"]["x"];
			$fillarray["coordinate"]["x"] = strval(intval($fillarray["coordinate"]["x"]) + 25);

		}
		$fp = fopen('variables.json', 'w');
		fwrite($fp, json_encode($variables_json));
		fclose($fp);
	}
	
	// Create bulb-images 
	$keys = array_keys($variables_json);
	foreach($keys as $key) {
		// Create image: id = key, class = type, top = x, left = y;
		echo 
		'<div class="'.$variables_json[$key]["type"].'"
		style="top:'.$variables_json[$key]["coordinate"]["y"].'px;left:'.$variables_json[$key]["coordinate"]["x"].'px;">
	
			<img id="'.$key.'" 
			src="'.$variables_json[$key]["image"]["off"].'">
			<p>'.$key.'</p>
		</div>';
	}

	?>

   <script src = "read_and_update.js"></script>
   
   </div>
   </body>
		
</html>
