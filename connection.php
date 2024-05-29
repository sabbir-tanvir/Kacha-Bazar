<?php

define("HOSTNAME", "localhost");
define("USERNAME", "root");
define("PASSWORD", "5sabbirSaba");
define("DATABASE_NAME", "kacha_bazar");
$db_connect = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE_NAME);

if (!$db_connect) {
    die("Connection failed: " . mysqli_connect_error());
}
?>