<?php
function getDB_status() {
    session_start();
    require_once("config.php");
    $connect_DB = mysqli_connect(SERVER, USER, PW, DB);

    if (!$connect_DB) {
    echo $dbStatusNok;
} else {
    echo $dbStatusOk;
    echo "<div>Hello, " . $_SESSION['username'] . "!</div>";

// get userID by username and password
$sql = "SELECT id FROM users WHERE username = '$_SESSION[username]' AND pwhash = '$_SESSION[pwhash]'";
$result = $connect_DB->query($sql);
$mydata = $result->fetch_all(MYSQLI_ASSOC);
// try with fetch!!!
foreach ($mydata as $key => $row) {
$_SESSION['userID'] = $row['id'];
// something to think about!!!
// unset($_SESSION['username']);
// unset($_SESSION['pwhash']);
}
}
};

function getDB() {
    require_once("config.php");
    $connect_DB = mysqli_connect(SERVER, USER, PW, DB);

    if (!$connect_DB) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
};

function getData() {
session_start();
require_once("config.php");
$connect_DB = mysqli_connect(SERVER, USER, PW, DB);
$sql = "SELECT * FROM todo_list WHERE userID = '$_SESSION[userID]'  ORDER BY task ASC";
$result = $connect_DB->query($sql);
$mydata = $result->fetch_all(MYSQLI_ASSOC);


// echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
// echo "Host information: " . mysqli_get_host_info($connect_DB) . PHP_EOL;


foreach ($mydata as $key => $row) {
        echo "<li class='todo_list_item'>";
        
        echo "<form id='edit' class='task_area' action='../private/edit_todo.php' method='post'>";
        echo "<input type='hidden' name='ident' value={$row[id]}>";
        echo "<input class='td_entry_edit' name='edit' type='text' maxlength='60' spellcheck='false' value='";
        echo $row['task'];
        echo "'>";
        echo "<button type='submit'>";
        echo "<span><i class='fas fa-edit'></i></span>";
        echo "</button>";
        echo "</form>";

        echo "<div class='buttons'>";

        echo "<form class='delete_button' action='../private/delete_todo.php' method='post'>";
        echo "<input type='hidden' name='ident' value={$row[id]}>";
        echo "<button type='submit'>";
        echo "<span><i class='fas fa-trash-alt'></i></span>";
        echo "</button>";
        echo "</form>";

        echo "</div>";

        echo "</li>";
  
}

mysqli_close($connect_DB);
};
?>
