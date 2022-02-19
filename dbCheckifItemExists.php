<?php
session_start();
include_once "../includes/server_connection.php";

$shoeDetails = $_POST['shoeDetails'];
$brandName = $shoeDetails['brandName'];
$modelName = $shoeDetails['modelName'];

if(!empty($_POST['shoeDetails'])) {
    $sql = "SELECT * FROM shoes_in_stock WHERE BrandName = '$brandName' and Model = '$modelName';";
    $result = mysqli_query($conn, $sql);
    $result_check = mysqli_num_rows($result);
    if ($result_check > 0) {
        $data['status'] = 'exists';
    } else {
        $data['status'] = 'not exist';
    }
    echo json_encode($data);
}
