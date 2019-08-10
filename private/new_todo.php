<?php
    require_once("config.php");
    if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['task_name'])) {
        $connect_DB = mysqli_connect(SERVER, USER, PW, DB);

        if (!$connect_DB) {
            echo "Error: Unable to connect to MySQL." . PHP_EOL;
            echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
            echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
            exit;
        }
        $mytitle = "";
        $mytitle = mysqli_real_escape_string($connect_DB, $_REQUEST['task_name']);
        // if (isset($_POST["task_name"])) $mytitle = $_POST["task_name"];
        $stmt = $connect_DB->prepare("INSERT INTO todo_list (task) VALUES (?)");
        $stmt->bind_param("s", $mytitle); // "sss" means the values are 3 strings (another type is "d" or "f")

        // set parameters and execute

        $stmt->execute();
        $connect_DB->close();
    }


require_once('db.php');
 $qry = "SELECT * FROM todo_list ORDER BY task ASC";
 getData($qry);
require_once('edit.php');
