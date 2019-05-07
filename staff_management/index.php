<?php 
session_start();
require_once('../includes/config/session.php');

if (!isset($_SESSION['user_session'])) {
    header('location: navigation/events-manage.php');
}

?>