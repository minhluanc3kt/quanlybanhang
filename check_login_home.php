<?php   session_start();  ?>
<html>
    <body>
<?php

    if( (!( isset( $_SESSION['login_status']))) || ($_SESSION['login_status'] != "ready")) {
        echo "<h1>Hello unknown users!</h1>";
    }
    else{
        echo "<li>Hello ".$_SESSION["name"]." !</li>";
    }
?>   
    <p>Go to <a href="check_login_a.php">A page.</a></p>
    </body>
<?php

    if( (!( isset( $_SESSION['login_status']))) || ($_SESSION['login_status'] != "ready")) {
        echo '<p><a href="login_form.php">Login</a></p>';
    }
    else{
        echo '<p><a href="logout.php">Logout</a></p>';
    }
?>   

</html>

