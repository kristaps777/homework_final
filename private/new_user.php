<?php
    session_start();
    require_once("config.php");
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $connect_DB = mysqli_connect(SERVER, USER, PW, DB);

        if (!$connect_DB) {
            echo "Error: Unable to connect to MySQL." . PHP_EOL;
            echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
            echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
            exit;
        }

        if (isset($_POST['password'])) {
            $pwhash = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $_SESSION['pwhash'] = $pwhash;
        };

        if (isset($_POST['name'])) $myName = mysqli_real_escape_string($connect_DB, $_REQUEST['name']);
        if (isset($_POST['username'])) {
            $myUser = mysqli_real_escape_string($connect_DB, $_REQUEST['username']);
            $_SESSION['username'] = $myUser;
        };
        
        $stmt = $connect_DB->prepare("INSERT INTO users (name, username, pwhash) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $myName, $myUser, $pwhash);

        $stmt->execute();
        $connect_DB->close();
    }
  
header("Location: todo.php");
 ?>
