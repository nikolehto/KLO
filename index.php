<!DOCTYPE html>
<html>
   <head>	
      <title>KLO project</title>
   </head>
	
   <body>
      <h1>THIS IS TEH HEADIN </h1>
		
      <table class = "src">
         <tr><td><div id = "point1">no data</div></td>
         <td><div id = "state1">no data</div></td></tr>
      </table>
	  
	 <style>
	h1 {
		color: orange;
		text-align: center;
	}
	img {
		border-radius: 8px;
		max-width: 100%;
		margin: auto;
	}
	canvas {
		border:1px solid #d3d3d3;
		background-color: #f1f1f1;
	}
	</style>
	  
	  <img src="img/house.png" alt="ground plan">
	  <img id="Object1" src="img/light_off.png" alt="light_state">
	  
	  
      <div class = "central">
         <butt	on type = "button" onclick = "loadJSON()">Update Details </button>
      </div>
	  
	  <canvas id="myCanvas" width="200" height="100" style="border:1px solid #000000">
	  </canvas>
	  
	<?php  
	$string = file_get_contents("new_data.json");
	$data_json = json_decode($string, true);

	foreach ($data_json as $device_name => $device_value) {
		echo $device_value;
	}
	
	  //$servername = "localhost";
	  //$username = "root";
	  //$password = "secret";
	  
	  //$conn = new mysqli($servername, $username, $password);
	  
	  //if($conn->connect_error) {
	//	  die("Connection failed: " . $conn->connect_error);
	//	}
	  //echo "Connected succesfully"
	//  $sql = "CREATE DATABASE testDB";
	  
	 // if ($conn->query($))
		 // weschool
	  
	  //$conn->close();
	  
	  ?>
	  
      <script src = "read_and_update.js"></script>
   </body>
		
</html>
