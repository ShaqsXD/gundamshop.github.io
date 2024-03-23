<?php
session_start();
$expire = time ()-86400;
setcookie('db_gunpla', $_SESSION['name'], $expire);
session_destroy();
header("Refresh:1; url=index.html");
?>