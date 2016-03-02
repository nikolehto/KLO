<!DOCTYPE html>
<html>
   <head>
      <title>KLO project</title>
   </head>
	
   <body>
      <h1>HEADIN </h1>
		
      <table class = "src">
         <tr><td><div id = "light100">no data</div></td>
         <td><div id = "socket100">data</div></td></tr>
      </table>
	  
	 <style>
	h1 {
		color: orange;
		text-align: center;
	}
	
	canvas {
		border:1px solid #d3d3d3;
		background-color: #f1f1f1;
	}
	
	img {
		border-radius: 8px;
		max-width: 100%;
		margin: auto;
	}
	}
	</style>
	  
	  <img src="img/house.png" alt="ground plan">
	  <img id="Object1" src="img/light_off.png" alt="light_state" style="position: absolute">
	  
	  
      <div class = "central">
         <button type = "button" onclick = "loadJSON()">Update Details </button>
      </div>
	  
	  <canvas id="myCanvas" width="200" height="100" style="border:1px solid #000000">
	  </canvas>
	  
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
	
	// http://stackoverflow.com/questions/834303/startswith-and-endswith-functions-in-php
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
		$coordinate = ["x"=>"0", "y"=>"0"];
		$fillarray = ["name"=>"", "value"=>"0", "info"=>"", "type"=> "", "coordinate"=>$coordinate, "image"=>$image];
		
		$newvariables = [];
		$keys = array_keys($data_json);
		foreach($keys as $key) {
			$fillarray["name"] = $key;
			if (startsWith($key, "light")) {
				$fillarray["type"] = "light";
				$fillarray["image"]["on"] = "img/light_on.png";
				$fillarray["image"]["off"] = "img/light_off.png";
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
			
			$newvariables[$key] = $fillarray;
			//echo $fillarray["coordinate"]["x"];
			$fillarray["coordinate"]["x"] = strval(intval($fillarray["coordinate"]["x"]) + 25);

		}
		
	}
	$fp = fopen('debug.json', 'w');
	fwrite($fp, json_encode($newvariables));
	fclose($fp);
	  
	  ?>
	  
   <script src = "read_and_update.js"></script>
   
   </body>
		
</html>
