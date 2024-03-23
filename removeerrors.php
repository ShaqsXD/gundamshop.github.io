<?php
// Turn off sa error report 
error_reporting(0);

// Report 
error_reporting(E_ERROR | E_WARNING | E_PARSE);

// Report sa gabos na sala 
error_reporting(E_ALL);

// Parehas sa error_reporting(E_ALL);
ini_set("error_reporting", E_ALL);

// Report sa gabos na sala dae ka sale si E_NOTICE
error_reporting(E_ALL & ~E_NOTICE);
?>
