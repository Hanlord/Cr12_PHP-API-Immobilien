<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Method: GET');
require_once 'actions/db_connect.php';

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $sql = "SELECT * FROM properties";
    $result = mysqli_query($connect, $sql);
    if($result){
        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
        response(200, 'Data fetched successfully', $row);
    }else{
        response(400, 'error: '.mysqli_error($connect));
    }
}
mysqli_close($connect);

function response($status, $message, $data = null){
    $response = new stdClass();
    $response->status = $status;
    $response->message = $message;
    $response->data = $data;
    echo json_encode($response);
    }
