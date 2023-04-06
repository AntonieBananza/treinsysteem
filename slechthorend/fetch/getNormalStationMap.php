<?php 

 require_once "../includes/init.php";

$station_name= $_GET['stationName'];

$query = "SELECT * FROM stations WHERE 'station' = $station_name";

$result = mysqli_query($db, $query)
    or die('error: '.mysqli_error($db).' with query '.$query);

$stations = [];

while($row = mysqli_fetch_assoc($result)){
    $stations[] = $row;
}

$img_src = $stations[0]["image"];