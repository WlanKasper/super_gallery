<?php
	function getConnection() {
		define('credential', [
			'localhost',                // host
			'laryyokkk',				// username
			'ulSmirnov2003',			// psw
			'super_gallery'				// db
		]);
	      
	    $conn = mysqli_connect(credential[0], credential[1], credential[2], credential[3]);  
	    
	    if(mysqli_connect_errno()) {
		    // err in logs --> mysqli_connect_error()
		    return null;
	    } else {
		    return $conn;
	    }
	}
	
	function selectQuery($sql_q, $arr_args) {
		$conn = getConnection();
		$arr_resp = array();
		
		$statement = $conn->prepare($sql_q);
		for ($i = 0; $i < sizeof($arr_args); $i++) {
			$statement->bind_param('s', $arr_args[$i]);
		}
	    $statement->execute();
	    $result = $statement->get_result();
	    
	    while ($row = $result->fetch_assoc()) {
	        if (!empty($row)) {
		        array_push($arr_resp, $row);
	        }
	    }
		
		mysqli_close($conn);
		return $arr_resp;
	}
?> 