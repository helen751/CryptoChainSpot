<?php

define('HOST', 'localhost');
define('USER', 'crypdvww_cryptochain');
define('PASSWORD', 'cryptochain911');
define('DBNAME', 'crypdvww_cryptochainspot');

$link = mysqli_connect(HOST, USER, PASSWORD, DBNAME);

// if ($link) {
//   echo "Connected";
// } else {
//   echo "Not connected";
// }