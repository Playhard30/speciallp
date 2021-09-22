<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "enrollment";

$db = mysqli_connect($servername, $username, $password, $dbname) or die(mysqli_error($db));