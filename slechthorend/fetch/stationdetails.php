<?php
require_once "../includes/init.php";

header('Content-type: application/json; charset=utf-8');
$jsonName = file_get_contents('php://input');

$stringId = json_decode($jsonName, true)['id'];

$query = "SELECT * FROM icons JOIN icon_types ON icons.type_id = icon_types.id WHERE icons.station_id = $stringId AND icons.amount IS NOT NULL";

$result = mysqli_query($db, $query)
    or die('error: '.mysqli_error($db).' with query '.$query);

$station = [];

while($row = mysqli_fetch_assoc($result)){
    $station[] = $row;
}
echo(json_encode($station));

?>