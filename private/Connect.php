<?php
require_once('config.php');

// class Connect handles DB connection, DB status and retreives DB data
class Connect
{
    public $conn_DB;
    public $sql_request;
    public $send_sql;
    public $sql_response;

    public function connectDB() {
        $this->conn_DB = mysqli_connect(SERVER, USER, PW, DB);
        if ($this->conn_DB) {
            return $this->conn_DB;
        } else {
            echo "Error: Unable to connect to MySQL." . PHP_EOL;
            echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
            echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
            exit;
        }
    }

    public function getStatus() {
        global $dbStatusNok;
        global $dbStatusOk;
        session_start();
        if (!$this->connectDB()) {
            echo $dbStatusNok;
        } else {
            echo $dbStatusOk;
            echo "<div>Hello, " . $_SESSION['username'] . "!</div>";

            $this->sql_request = "SELECT id FROM users WHERE username = '$_SESSION[username]' AND pwhash = '$_SESSION[pwhash]'";
            $this->send_sql = $this->connectDB()->query($this->sql_request);
            $this->sql_response = $this->send_sql->fetch_all(MYSQLI_ASSOC);
            foreach ($this->sql_response as $key => $row) {
            $_SESSION['userID'] = $row['id'];
            }
            mysqli_close($this->connectDB());
        }
    }

    public function checkEmpty() {
        session_start();
        if (empty($_SESSION['username'])) {
        header("Location: index.html");
        }
    }

    public function getData() {
        session_start();
        $this->sql_request = "SELECT * FROM todo_list WHERE userID = '$_SESSION[userID]'  ORDER BY task ASC";
        $this->send_sql = $this->connectDB()->query($this->sql_request);
        $this->sql_response = $this->send_sql->fetch_all(MYSQLI_ASSOC);

        foreach ($this->sql_response as $key => $row) {
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

        mysqli_close($this->connectDB());
    }
    }
}
?>
