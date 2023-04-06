<?php
require_once "../includes/init.php";

header('Content-type: application/json; charset=utf-8');
$jsonIconInfo = file_get_contents('php://input');

$station_id = json_decode($jsonIconInfo, true)['id'];
$icon = json_decode($jsonIconInfo, true)['icon'];

$query = "SELECT icon_types.name, map_url FROM stations JOIN icons ON stations.id=icons.station_id JOIN icon_types ON icons.type_id = icon_types.id WHERE stations.id = '$station_id' AND icon_types.name = '$icon'";

$result = mysqli_query($db, $query)
    or die('error: '.mysqli_error($db).' with query '.$query);

$stations = [];

while($row = mysqli_fetch_assoc($result)){
    $stations[] = $row;
}

echo(json_encode($stations));