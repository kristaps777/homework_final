<?php
require_once('Connect.php');
function getData() {
session_start();
$conn = new Connect();
$sql = "SELECT * FROM todo_list WHERE userID = '$_SESSION[userID]'  ORDER BY task ASC";
$result = $conn->connectDB()->query($sql);
$mydata = $result->fetch_all(MYSQLI_ASSOC);


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

mysqli_close($conn);
};
?>
