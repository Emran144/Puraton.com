<?php
    session_start();
    $_SESSION['isloggedin']=false;
    echo "<script>location.assign('login.php');</script>";
?>