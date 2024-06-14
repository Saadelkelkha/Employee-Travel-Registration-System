<?php
    session_start();
    $_SESSION['conn'] = false;
    header('Location: connEmp.php');
?>
