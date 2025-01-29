<?php
// logout.php - User logout
session_start();
session_unset();
session_destroy();
header("Location: login.php");
exit();
?>
