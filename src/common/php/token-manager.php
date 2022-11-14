<?php
class TokenManager
{
    function __construct()
    {
        @session_start();

        if (!TokenManager::isLogged()) {
            $_SESSION['session_id'] = @session_id();
            setcookie('session_id', @session_id(), (time() + (60*60*24)), '/');
        }
    }
    static function logout()
    {
        TokenManager::unauthenticate();
        unset($_SESSION['session_id']);
        setcookie("session_id", "", time() - (60*60*24), '/');
        header("Location: ../../../index.php");
        exit;
    }

    static function authenticate($user_id)
    {
        setcookie('user_id', $user_id, time() + (60*10), '/');
    }

    static function unauthenticate()
    {
        setcookie("user_id", "", time() - (60*10), '/');
    }

    static function isAuthenticated()
    {
        return isset($_COOKIE['user_id']);
    }
    static function isLogged()
    {
        // if (isset($_SESSION['session_id']) && !isset($_COOKIE['session_id'])) {
        //     $_COOKIE['session_id'] = $_SESSION['session_id'];
        // }
        return isset($_COOKIE['session_id']);
    }
}
?>
