<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
include("connection.php");

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['passwd']);

    $stmt = $conn->prepare('SELECT * FROM users WHERE username = ? AND psswd = ?');
    $stmt->bind_param('ss', $username, $password);
    $stmt->execute();

    $result = $stmt->get_result();
    if ($user = $result->fetch_assoc()) {
        $_SESSION['user'] = [
            'id' => $user['id'],
            'username' => $user['username'],
            'level' => $user['level'],
        ];
        header('Location:dashboard.php');
    } else {
        $_SESSION['errorr'] = "invalid credential";
        header("Location:index.php");
    }
}
?>