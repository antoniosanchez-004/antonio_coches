<?php
$verbo=$_SERVER['REQUEST_METHOD'];
if ($verbo === 'POST') {
    include 'log_in.php';
    log_in($_SESSION['user']);
    log_out();
    header("Location: index.html");
}