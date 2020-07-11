<?php
session_start();
//destroy $_SESSION after log out
session_unset();
session_destroy();
header('Location: ../index.php');
?>