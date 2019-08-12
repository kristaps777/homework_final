<?php
  require_once("config.php");
  if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $connect_DB = mysqli_connect(SERVER, USER, PW, DB);

        if (!$connect_DB) {
            echo "Error: Unable to connect to MySQL." . PHP_EOL;
            echo "Debugging error: " . mysqli_connect_errno() . PHP_EOL;
            echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
            exit;
        }
// $sql = "TRUNCATE TABLE todo_list";
$sql = "TRUNCATE TABLE todo_list;";

mysqli_query($connect_DB, $sql);
$connect_DB->close();
header("Location: ../public/todo.php");
};
