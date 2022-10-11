<?php
	require('../db/connection.php');
	
	if (count($_POST) > 0) {
		$username 	= strtolower($_POST['_login']);
		$psw_hash   = $_POST['md5_psw'];
		$isSuccess 	= false;
		
		$sql_q = "SELECT * FROM `user_credential` WHERE `userName` = ?;";
		$arr_resp = selectQuery($sql_q, [$username]);
		
		for ($i = 0; $i < sizeof($arr_resp); $i++) {
			if ($arr_resp[$i]['password'] == $psw_hash) {
				$isSuccess = true;
			}
		}
		
		if ($isSuccess) {
			echo "welcome";
		} else {
			echo "fuck you";
		}
	}
?>