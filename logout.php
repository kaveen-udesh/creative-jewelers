<?php
session_start();

unset($_SESSION["email"]);  // Destroy email sessions
header("location: index.php");

?>