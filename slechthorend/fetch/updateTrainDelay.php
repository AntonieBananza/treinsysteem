<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'treindata';

$conn = mysqli_connect($host, $username, $password, $database)
or die('error: ' .mysqli_connect_error());

// Function to update a random train delay at a random time
function updateRandomTrainDelay() {
    global $conn;
    $sql = "SELECT * FROM stations";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Select a random train
        $randomIndex = rand(0, mysqli_num_rows($result) - 1);
        mysqli_data_seek($result, $randomIndex);
        $row = mysqli_fetch_assoc($result);

        // Generate a random delay between 0 and 10 minutes
        $randomDelay = rand(0, 10);

        // Update the train delay in the database
        $sql = "UPDATE stations SET delay=" . $randomDelay . " WHERE id=" . $row["id"];
        mysqli_query($conn, $sql);
    }
}

// Call the updateRandomTrainDelay function at a random time between 30 and 60 seconds
$randomTime = rand(30000, 60000);
echo "<script>setTimeout(function() {";
echo "  fetch('updateTrainDelay.php');";
echo "  setTimeout(arguments.callee, " . $randomTime . ");";
echo "}, " . $randomTime . ");</script>";

mysqli_close($conn);
?>
