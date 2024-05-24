<?php

$name = $_POST['name'];
$dept = $_POST['dept'];


define("HOSTNAME", "localhost");
define("USERNAME", "root");
define("PASSWORD", "NULL");
define("DATABASE_NAME", "online_quiz");
$db_connect = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE_NAME);

$insert_query = "INSERT INTO student(name, dept) VALUES ('$name','$dept');";
mysqli_query($db_connect, $insert_query);



header("location: index.php");
?>