<?php
require_once 'actions/db_connect.php';
require_once 'components/boot.php';
$sql = "SELECT * FROM properties WHERE id = $_GET[id]";
$result = mysqli_query($connect, $sql);
$lat = "";
$ing = "";
$tbody = "";
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $lat ="".$row['latitude']."";
    $lng ="".$row['longitude']."";
    $tbody .= "<br>
        <div class='mt-4 mb-4 row text-center justify-content-center animate__animated animate__fadeInLeft'>
        <div class='card' style='width: 45rem;'>
  <img class='card-img-top' src='pictures/" . $row['image'] . "'>
  <div class='card-body'>
    <h5 class='card-title'>" . $row['title'] . "</h5>
    <p class='card-text'>Address: " . $row['address'] . "</p>
  </div>
  <ul class='list-group list-group-flush'>
    <li class='list-group-item'>size: " . $row['size'] . "m²</li>
    <li class='list-group-item'>rooms: " . $row['rooms'] . "</li>
    <li class='list-group-item'>city: " . $row['city'] . "</li>
    <li class='list-group-item'>price: " . $row['price'] . "€</li>
    <li class='list-group-item'>reduction: " . $row['reduction'] . "</li>
    <div class='col-12'>
    
    <a href='update.php?id=" . $row['id'] . "'><button class='button btn btn-warning' type='button'>Edit</button></a>
    <a href='delete.php?id=" . $row['id'] . "'><button class='button btn btn-danger' type='button'>Delete</button></a>
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
    <style>

            #map {
                margin: auto;
                height: 35%;
                width: 35%;

            }

        </style>
</head>

<body>
    <?php require_once 'components/navbar.php' ?>
    <div class="container">
        <?php
        echo $tbody;
        ?>
    </div>
    <div id="map"></div>
    <br>
    <?php require_once 'components/footer.php' ?>
    <script>
        var map;
        function initMap() {
          var vienna = {
            lat:  <?php echo $lat; ?>,
            lng:   <?php echo $lng; ?>
          };
          map = new google.maps.Map(document.getElementById('map'), {
            center: vienna,
            zoom: 15
          });
          var pinpoint = new google.maps.Marker({
                position: vienna,
                map: map
          });
        }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtjaD-saUZQ47PbxigOg25cvuO6_SuX3M&callback=initMap" async defer></script>
</body>

</html>