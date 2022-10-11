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
	
	function selectQuery($sql_q, $pattern, $arr_args) {
		$conn = getConnection();
		$arr_resp = array();
		
		$statement = $conn->prepare($sql_q);
		$statement->bind_param($pattern, ...$arr_args);
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
	
	function insertQuery($sql_q, $pattern, $arr_args) {
		$conn = getConnection();
		
		$statement = $conn->prepare($sql_q);
		$statement->bind_param($pattern, ...$arr_args);
	    $statement->execute();
	    $result = $statement->get_result();
	    print_r($result);
	    
// 	    $resp = $result->fetch_assoc();
		
		mysqli_close($conn);
		return $result;
	}
?> 