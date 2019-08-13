<?php
    session_start();
    require_once("config.php");
    if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['task_name'])) {
        $connect_DB = mysqli_connect(SERVER, USER, PW, DB);

        if (!$connect_DB) {
            echo "Error: Unable to connect to MySQL." . PHP_EOL;
            echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
            echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
            exit;
        }
        $mytitle = mysqli_real_escape_string($connect_DB, $_REQUEST['task_name']);
        $myUserID = mysqli_real_escape_string($connect_DB, $_SESSION['userID']);
        $stmt = $connect_DB->prepare("INSERT INTO todo_list (task, userID) VALUES (?, ?)");
        $stmt->bind_param("ss", $mytitle, $myUserID);

        $stmt->execute();
        $connect_DB->close();
    }
header("Location: ../public/todo.php");
 ?>
