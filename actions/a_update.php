<?php
require_once 'db_connect.php';
require_once 'file_upload.php';

if ($_POST) {   
    $id = $_POST['id']; 
    $title = $_POST['title'];
    $size = $_POST['size'];
    $rooms = $_POST['rooms'];
    $city = $_POST['city'];
    $price = $_POST['price'];
    $address = $_POST['address'];
    $reduction = $_POST['reduction'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    //variable for upload pictures errors is initialised
    $uploadError = '';

    $image = file_upload($_FILES['image']);//file_upload() called  
    if($image->error===0){
        ($_POST["image"]=="product.png")?: unlink("../pictures/$_POST[image]");           
        $sql = "UPDATE properties SET title = '$title', price = $price, size = $size, rooms = $rooms, city = '$city', address = '$address', reduction = '$reduction',latitude = '$latitude',longitude ='$longitude', image = '$image->fileName' WHERE id = {$id}";
    }else{
        $sql = "UPDATE properties SET title = '$title', price = $price, size = $size, rooms = $rooms, city = '$city', address = '$address', reduction = '$reduction',latitude = '$latitude',longitude ='$longitude' WHERE id = {$id}";
    }    
    if (mysqli_query($connect, $sql) === TRUE) {
        $class = "success";
        $message = "The record was successfully updated";
        $uploadError = ($image->error !=0)? $image->ErrorMessage :'';
    } else {
        $class = "danger";
        $message = "Error while updating record : <br>" . mysqli_connect_error();
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
                <h1>Update request response</h1>
            </div>
            <div class="alert alert-<?php echo $class;?>" role="alert">
                <p><?php echo ($message) ?? ''; ?></p>
                <p><?php echo ($uploadError) ?? ''; ?></p>
                <a href='../update.php?id=<?=$id;?>'><button class="btn btn-warning" type='button'>Back</button></a>
                <a href='../index.php'><button class="btn btn-success" type='button'>Home</button></a>
            </div>
        </div>
    </body>
</html>