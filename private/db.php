<?php
function getDB_status() {
    require_once("config.php");
    $connect_DB = mysqli_connect(SERVER, USER, PW, DB);

    if (!$connect_DB) {
    // echo "Error: Unable to connect to MySQL." . PHP_EOL;
    // echo "Debugging error: " . mysqli_connect_errno() . PHP_EOL;
    // echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    echo $dbStatusNok;
    // exit;
} else {
    echo $dbStatusOk;
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
require_once("config.php");
$connect_DB = mysqli_connect(SERVER, USER, PW, DB);
$sql = "SELECT * FROM todo_list ORDER BY task ASC";
$result = $connect_DB->query($sql);
$mydata = $result->fetch_all(MYSQLI_ASSOC);


// echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
// echo "Host information: " . mysqli_get_host_info($connect_DB) . PHP_EOL;


foreach ($mydata as $key => $row) {
        echo "<li class='todo_list_item'>";

        // echo "<form class='task_area' action='todo.php' method='post'>";
        // echo "<input type='hidden' name='ident' value={$row[id]}>";
        // echo "<textarea class='td_entry_edit' name='edit' type='text' maxlength='60' spellcheck='false'>";
        // echo $row['task'];
        // echo "</textarea>";
        // echo "</form>";

        
        echo "<form id='edit' class='task_area' action='../private/edit_todo.php' method='post'>";
        echo "<input type='hidden' name='ident' value={$row[id]}>";
        echo "<input class='td_entry_edit' name='edit' type='text' maxlength='60' value='";
        echo $row['task'];
        echo "'>";
        echo "<button type='submit'>";
        echo "<span><i class='fas fa-edit'></i></span>";
        echo "</button>";
        echo "</form>";

        echo "<div class='buttons'>";

        // echo "<form class='edit_button' action='../private/edit_todo.php' method='post'>";
        // echo "<input type='hidden' name='ident' value={$row[id]}>";
        // echo "<button type='submit' form='edit'>";
        // echo "<span><i class='fas fa-edit'></i></span>";
        // echo "</button>";
        // echo "</form>";

        echo "<form class='delete_button' action='../private/delete_todo.php' method='post'>";
        echo "<input type='hidden' name='ident' value={$row[id]}>";
        echo "<button type='submit'>";
        echo "<span><i class='fas fa-trash-alt'></i></span>";
        echo "</button>";
        echo "</form>";

        echo "</div>";

        echo "</li>";


        // echo "<input type='text' style='display: none' name='ident' value={$row[id]}>";
        // echo "<a class='edit_button' href='../private/modal.php?id=";
        // echo $row['id'];
        // echo "'>";
        // echo "<span><i class='fas fa-edit'></i></span>";
        // echo "</a>";
        // echo "<button type='submit'>";
        // echo "<span><i class='fas fa-trash-alt'></i></span>";
        // echo "</button></form></li>";
  
}

mysqli_close($connect_DB);
};
?>
