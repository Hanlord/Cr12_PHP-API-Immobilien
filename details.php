<?php
require_once 'action/db_connect.php';
require_once 'components/boot.php';
$sql = "SELECT * FROM properties WHERE id = $_GET[id]";
$result = mysqli_query($conn, $sql);
$tbody = "";
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $tbody .= "<br>
        <div class='mt-4 mb-4 row text-center justify-content-center animate__animated animate__fadeInLeft'>
        <div class='card bg-dark' style='width: 18rem;'>
  <img class='card-img-top' src='image/" . $row['image'] . "'>
  <div class='card-body bg-dark'>
    <h5 class='card-title'>" . $row['title'] . "</h5>
    <p class='card-text'>Address:" . $row['address'] . "</p>
  </div>
  <ul class='list-group list-group-flush'>
    <li class='list-group-item'>size:" . $row['size'] . "</li>
    <li class='list-group-item'>rooms: " . $row['rooms'] . "</li>
    <li class='list-group-item'>city: " . $row['city'] . "</li>
    <li class='list-group-item'>price" . $row['price'] . "</li>
    <li class='list-group-item'>reduction: " . $row['reduction'] . "</li>
    <div class='col-12'>
    
    <a href='update.php?id=" . $row['id'] . "'><button class='button btn-warning' type='button'>Edit</button></a>
    <a href='delete.php?id=" . $row['id'] . "'><button class='button btn-danger' type='button'>Delete</button></a>
    </div>
    </ul>
  
  </div>
</div>
        <br>
        
        ";
  };
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.scss">
    <?php require_once 'components/boot.php' ?>
    <title>Details</title>
</head>

<body class="bbc">
    <?php require_once 'components/navigation.php' ?>
    <div class="container">
        <?php
        echo $tbody;
        ?>
    </div>
    <?php require_once 'components/footer.php' ?>
</body>

</html>