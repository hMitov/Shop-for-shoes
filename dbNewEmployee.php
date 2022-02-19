<?php
session_start();
include "../includes/server_connection.php";

if(isset($_POST['insertButton'])) {
    $fName = $_POST['firstName'];
    $lName = $_POST['lastName'];
    $agent = $_POST['agent'];

    if(!empty($fName) && !empty($lName) && !empty($agent)) {
        $sqlReq = "INSERT INTO employee(FirstName, LastName, Agent) VALUES('$fName', '$lName', '$agent');";
        $resultSqlReq = mysqli_query($conn, $sqlReq);
    }
    header("Location: ../newEmployee/newEmployee.php");
}

