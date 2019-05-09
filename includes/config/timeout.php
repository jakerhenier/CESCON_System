<?php 
$time = $_SERVER['REQUEST_TIME'];
$time_refresh = 7;

if(isset($_SESSION['refresh']) && $time - $_SESSION['refresh'] > $time_refresh) {
    echo '<script type = "text/javascript">
            document.getElementById("username").disabled = false;
            document.getElementById("password").disabled = false;
            document.getElementById("login-submit").disabled = false;
        </script>
        <p>Fuck this shit</p>';

    $_SESSION['attempts'] = 0;
}
?>