<?php
  session_start();
  require_once("config.php");
  if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['ident'])) {
        $connect_DB = mysqli_connect(SERVER, USER, PW, DB);

        if (!$connect_DB) {
            echo "Error: Unable to connect to MySQL." . PHP_EOL;
            echo "Debugging error: " . mysqli_connect_errno() . PHP_EOL;
            echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
            exit;
        }

$id = mysqli_real_escape_string($connect_DB, $_REQUEST['ident']);
$myUserID = mysqli_real_escape_string($connect_DB, $_SESSION['userID']);


$stmt = $connect_DB->prepare("DELETE FROM todo_list WHERE id = ? AND userID = ?");
$stmt->bind_param("ss", $id, $myUserID);


$stmt->execute();
$connect_DB->close();
header("Location: ../public/todo.php");
};
