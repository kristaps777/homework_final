<?php
require_once("config.php");

function getData() {
$connect_DB = mysqli_connect(SERVER, USER, PW, DB);
$sql = "SELECT * FROM tracks";
$result = $connect_DB->query($sql);
$mydata = $result->fetch_all(MYSQLI_ASSOC);

if (!$connect_DB) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

// echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
// echo "Host information: " . mysqli_get_host_info($connect_DB) . PHP_EOL;


foreach ($mydata as $key => $row) {
        echo "<br>";
        echo $row['name'];
  
}

mysqli_close($connect_DB);
}


?>
