<?php


defined("DB_HOST") ? NULL : define("DB_HOST","localhost");
defined("DB_USER") ? NULL : define("DB_USER","*****");
defined("DB_PASS") ? NULL : define("DB_PASS","*****");
defined("DB_NAME") ? NULL : define("DB_NAME","*****");

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($connection == mysqli_connect_error()) {
    die("MYSQLI CONNECT ERROR - " . mysqli_connect_error());
}
require_once "function.php";
defined("SITE") ? NULL : define("SITE","index.php");
defined("PANEL") ? NULL : define("PANEL","set.php");
defined("USERS") ? NULL : define("USERS","users.php");
?>