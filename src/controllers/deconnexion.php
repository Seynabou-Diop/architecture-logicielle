<?php
    session_start();
    unset($_SESSION['admin_authenticated']);
    session_destroy();
    header('Location: /mglsi/archi/index.php');
    exit();
?>
