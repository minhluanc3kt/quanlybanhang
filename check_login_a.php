<?php   session_start();  ?>
<?php

    if( (!( isset( $_SESSION['login_status']))) || ($_SESSION['login_status'] != "ready")) {
        session_destroy();
        header("Location: ./login_form.php");
    }
?>
<html>
    <body>
<?php

echo "<p>Page A. Hello ".$_SESSION["name"]."</p>";



?>
<p><a href="check_login_home.php">Home</a></p>
<p><a href="logout.php">Logout</a></p>
    </body>
</html>

