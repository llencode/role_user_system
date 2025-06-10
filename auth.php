<?php
session_start();

if (!isset($_SESSION["user"])) {
    header("index.php");
    exit;
}
?>