<?php
require_once "../includes/init.php";

header('Content-type: application/json; charset=utf-8');
$jsonName = file_get_contents('php://input');

$stringName = json_decode($jsonName, true)['station_name'];
$sql = "SELECT delay FROM stations WHERE station = '$stringName'";
$result = mysqli_query($db, $sql);

// output data of each row this info needs to be in the pop up
$row = mysqli_fetch_assoc($result);
echo(json_encode($row));
