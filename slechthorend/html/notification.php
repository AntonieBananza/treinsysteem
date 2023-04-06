<?php
require_once "../includes/init.php";

$query = "SELECT * FROM stations";
$result = mysqli_query($db, $query);

$stations = [];
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $stations[] = $row;
    }
} else {
    echo "0 results";
}

// mysqli_close($db);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../scss/stylesheet.css">
    <script type="text/javascript" src="../js/displayTrainDelay.js" defer></script>
    <script type="text/javascript" src="../js/shownotificationlog.js" defer></script>
    <script type="text/javascript" src="../js/generateDelayMessage.js" defer></script>
    <title>Notificatie</title>
</head>

<body>
<nav>
<a href="main.html" id="back_link">
            <div id="back_icon">
                <img id="back_icon_img" src="../scss/img/play-solid.svg" alt="arrow for going back">
            </div>
            <span id="back_span">ga terug</span>
        </a>
</nav>

<?php foreach ($stations as $station) { ?>
    <button class='trainBtn' data-name='<?= $station["station"] ?>'><?= $station["station"] ?></button>
<?php } ?>

<main>
<div id="myModal" class="modal">

    <div class="modal-content">

        <div class="card">
            <span class="close">&times;</span>
            <div class="image-container">
                <img src="../scss/img/treinIcon.png" alt="Popup Image">
            </div>
            <p id="trainInfo"></p>
        </div>
    </div>
</div>
</main>
<button id="popupBtn">Notificaties</button>


<div id="notificationDiv">


</div>








