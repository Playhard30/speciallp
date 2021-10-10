<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "enrollmentlp";

$db = mysqli_connect($servername, $username, $password, $dbname) or die(mysqli_error($db));