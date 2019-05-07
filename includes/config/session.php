<?php 

$time = $_SERVER['REQUEST_TIME'];

$timeout_duration = 900; 

// after 30 min has passed of inactivity, session will be destroyed and start a new one

if (isset($_SESSION['LAST_ACTIVITY']) && 
   ($time - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
    session_unset();
    session_destroy();
    session_start();
}

// And lastly, update LAST_ACTIVITY para ang timeout kay base sa time and dili atong 
// time nga nag login ang user.
$_SESSION['LAST_ACTIVITY'] = $time;
?>
