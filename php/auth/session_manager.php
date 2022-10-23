<?php
	function openSession() {
		$old_session = openOldSession();
		
		if (isset($old_session)) {
			session_id($old_session);
		}
		
		session_start();
		setcookie('access_token', session_id(), time() + (900), "/");
		setcookie('update_access_token', '', time() + (900 * 3), "/");
	}
	
	// https://stackoverflow.com/questions/520237/how-do-i-expire-a-php-session-after-30-minutes
	function closeSession() {
		$old_session = openOldSession();
		
		if (isset($old_session)){
			session_id($old_session);
		}
		
		session_start();
		setcookie('access_token', session_id(), time() - 1, "/");
		setcookie('update_access_token', '', time() - 1, "/");
		session_destroy();
		
	}
	
	function openOldSession() {
		if (session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
			return session_id();
		}
	}
	
	function updateKeys() {
		setcookie('access_token', session_id(), time() + (900), "/");
		setcookie('update_access_token', '', time() + (900 * 3), "/");
	}
?>