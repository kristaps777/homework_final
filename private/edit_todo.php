<?php
  require_once("../private/config.php");
  if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['ident'])) {
        $connect_DB = mysqli_connect(SERVER, USER, PW, DB);

        if (!$connect_DB) {
            echo "Error: Unable to connect to MySQL." . PHP_EOL;
            echo "Debugging error: " . mysqli_connect_errno() . PHP_EOL;
            echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
            exit;
        }

$id = $_POST['ident'];
$task = $_POST['edit'];
$task = mysqli_real_escape_string($connect_DB, $_REQUEST['edit']);
// $stmt = $connect_DB->prepare("UPDATE todo_list SET task=? WHERE id=?");
// $stmt->bind_param("ss", $task, $id);

// $stmt->execute();

$sql = "UPDATE todo_list SET task='$task' WHERE id=$_POST[ident]"; 
if(mysqli_query($connect_DB, $sql)){ 
    echo "Record was updated successfully."; 
} else { 
    echo "ERROR: Could not able to execute $sql. "  
                            . mysqli_error($link); 
} 

$connect_DB->close();
};
header("Location: ../public/todo.php");