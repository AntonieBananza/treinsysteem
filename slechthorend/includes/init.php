<?php
use Prg3\Databases\Database;
require_once 'classes/phpClasses/Database.php';

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'stationmaps';

$db = mysqli_connect($host, $username, $password, $database)
    or die('error: ' .mysqli_connect_error());




try {
    $meukDb = new Database($host, $username, $password, $database);
    $connection = $meukDb->getConnection();
} catch (Exception $e) {
    //Set error variable for template
    $error = 'Oops, try to fix your error please: ' .
        $e->getMessage() . ' on line ' . $e->getLine() . ' of ' .
        $e->getFile();
}

?>