<?php
require_once 'db_connect.php';
require_once 'file_upload.php';

if ($_POST) {   
    $title = $_POST['title'];
    $size = $_POST['size'];
    $rooms = $_POST['rooms'];
    $city = $_POST['city'];
    $price = $_POST['price'];
    $address = $_POST['address'];
    $reduction = $_POST['reduction'];
    $uploadError = '';
    //this function exists in the service file upload.
    $image = file_upload($_FILES['image']);  
   
    $sql = "INSERT INTO properties (title, size, rooms, city, price, address, image, reduction) VALUES ('$title', $size, $rooms, '$city', $price, '$address', '$image->fileName', '$reduction')";

    if (mysqli_query($connect, $sql) === true) {
        $class = "success";
        $message = "The entry below was successfully created <br>
            <table class='table w-50'><tr>
            <td> $title </td>
            <td> $size </td>
            <td> $rooms </td>
            <td> $city </td>
            <td> $price </td>
            <td> $address </td>
            <td> $reduction </td>
            </tr></table><hr>";
        $uploadError = ($image->error !=0)? $image->ErrorMessage :'';
    } else {
        $class = "danger";
        $message = "Error while creating record. Try again: <br>" . $connect->error;
        $uploadError = ($image->error !=0)? $image->ErrorMessage :'';
    }
    mysqli_close($connect);
} else {
    header("location: ../error.php");
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Update</title>
        <?php require_once '../components/boot.php'?>
    </head>
    <body>
        <div class="container">
            <div class="mt-3 mb-3">
                <h1>Create request response</h1>
            </div>
            <div class="alert alert-<?=$class;?>" role="alert">
                <p><?php echo ($message) ?? ''; ?></p>
                <p><?php echo ($uploadError) ?? ''; ?></p>
                <a href='../index.php'><button class="btn btn-primary" type='button'>Home</button></a>
            </div>
        </div>
    </body>
</html>