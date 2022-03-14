<?php

session_start();
unset($_SESSION['user']);
unset($_SESSION['log']);
unset($_SESSION['name']);
unset($_SESSION['login']);
unset($_SESSION['email']);
session_destroy();

// setcookie(id, time() - 3600);
// setcookie(id, "", time() - 3600);
header("location: ../index"); 

 ?>