<?php
require_once('Connect.php');
class Login extends Connect 
{
    public $userName;
    public $userPassword;
    public $sql_stmt;
    public $sql_response;
    public $sql_row;

    public function loginUser() {
        session_start();
        if($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (isset($_POST['username'])) $this->userName = mysqli_real_escape_string(parent::connectDB(), $_REQUEST['username']);
        if (isset($_POST['password'])) $this->userPassword = mysqli_real_escape_string(parent::connectDB(), $_REQUEST['password']);

        $this->sql_stmt = parent::connectDB()->prepare("SELECT id, username, pwhash FROM users WHERE username = ?");
        $this->sql_stmt->bind_param("s", $this->userName);
        $this->sql_stmt->execute();
        $this->sql_response = $this->sql_stmt->get_result();
        parent::connectDB()->close();

        $this->sql_row = $this->sql_response->fetch_assoc();

        if ($this->sql_response->num_rows < 1 && (!password_verify ($this->userPassword , $this->sql_row['pwhash']))) {
        header("Location: ../public/index.html");
        } else {
        $_SESSION['username'] = $this->userName;
        $_SESSION['pwhash'] = $this->sql_row['pwhash'];
        header("Location: ../public/todo.php");

        }
       
    }
    }

}


?>
