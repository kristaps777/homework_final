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

 if (isset($_POST['username'])) $myUserName = mysqli_real_escape_string($connect_DB, $_REQUEST['username']);
 if (isset($_POST['password'])) $myPassword = mysqli_real_escape_string($connect_DB, $_REQUEST['password']);

$stmt = $connect_DB->prepare("SELECT id, username, pwhash FROM users WHERE username = ?");
$stmt->bind_param("s", $myUserName);
$stmt->execute();
$result = $stmt->get_result();
$connect_DB->close();

$row = $result->fetch_assoc();

if ($result->num_rows < 1 && (!password_verify ($myPassword , $row['pwhash']))) {
    // $message = "NO SUCH USER!";
    // echo "<script type='text/javascript'>alert('$message');</script>";
    header("Location: ../public/index.html");
} else {
    $_SESSION['username'] = $myUserName;
    $_SESSION['pwhash'] = $row['pwhash'];
    header("Location: ../public/todo.php");
}



// if (!password_verify ($myPassword , $row['pwhash'])) {
//      $message = "NO SUCH USER!";
//      echo "<script type='text/javascript'>alert('$message');</script>";
//      header("Location: ../public/index.html");
// } else {
//      $_SESSION['username'] = $myUserName;
//      $_SESSION['pwhash'] = $row['pwhash'];
//      header("Location: ../public/todo.php");
// }
};
?>
