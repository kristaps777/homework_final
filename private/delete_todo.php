<?php
  require_once("config.php");
  if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['ident'])) {
        $connect_DB = mysqli_connect(SERVER, USER, PW, DB);

        if (!$connect_DB) {
            echo "Error: Unable to connect to MySQL." . PHP_EOL;
            echo "Debugging error: " . mysqli_connect_errno() . PHP_EOL;
            echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
            exit;
        }
        
// $sql = "DELETE FROM todo_list WHERE id=$_POST[ident]";

$stmt = $connect_DB->prepare("DELETE FROM todo_list WHERE id = ?");
$stmt->bind_param("s", $_POST['ident']);


// mysqli_query($connect_DB, $sql);
$stmt->execute();
$connect_DB->close();
header("Location: ../public/todo.php");
};
