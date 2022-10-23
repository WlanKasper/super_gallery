<?php
	require_once('../db/connection.php');
	require('session_manager.php');
	
	if (count($_POST) > 0) {
		$username 	= strtolower($_POST['_login']);
		$psw_hash   = $_POST['md5_psw'];
		$id_user;
		
		$sql_q = "SELECT * FROM `user_credential` WHERE `userName` = ?;";
		$arr_resp = selectQuery($sql_q, 's', [$username]);
		
		for ($i = 0; $i < sizeof($arr_resp); $i++) {
			if ($arr_resp[$i]['password'] == $psw_hash) {
				$id_user = $arr_resp[$i]['id_user'];
			}
		}
		
		if (isset($id_user)) {
				// log user credencials and status
			openSession();
			$_SESSION['user_id'] = $id_user;
					
			header("Location: ../../pages/main.php");
		} else {
				// log user credencials and error
			header("Location: ../../pages/login.php?err=invalid_user");
		}
	}
?>