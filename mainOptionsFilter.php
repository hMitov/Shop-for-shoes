<?php
session_start();

if(empty($_POST)) {
    $data['pos'] = $_SESSION['position'];
    echo json_encode($data);
}

