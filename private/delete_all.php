<?php
  session_start();
  require_once("config.php");
  if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $connect_DB = mysqli_connect(SERVER, USER, PW, DB);

        if (!$connect_DB) {
            echo "Error: Unable to connect to MySQL." . PHP_EOL;
            echo "Debugging error: " . mysqli_connect_errno() . PHP_EOL;
            echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
            exit;
        }
        
$myUserID = mysqli_real_escape_string($connect_DB, $_SESSION['userID']);

$stmt = $connect_DB->prepare("DELETE FROM todo_list WHERE userID = ?");
$stmt->bind_param("s", $myUserID);
$stmt->execute();

//old code = deletes entire table faster, regardless of users, possibly for admin???
// $sql = "TRUNCATE TABLE todo_list;";
// mysqli_query($connect_DB, $sql);

$connect_DB->close();
header("Location: todo.php");
};
