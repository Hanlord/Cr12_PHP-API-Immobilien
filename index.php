<?php
require_once 'actions/db_connect.php';

$sql = "SELECT * FROM properties";
$result = mysqli_query($connect, $sql);
$tbody = ''; //this variable will hold the body for the table
if (mysqli_num_rows($result)  > 0) {
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $tbody .= "<div class='container col-lg-4 rows-col-md-2 rows-col-sm-1 d-flex justify-content-center animate__animated animate__fadeInLeft g-4'>
            <div class='card' style='width: 18rem;'>
      <img src='pictures/" . $row['image'] . "' class='card-img-top' alt='...'>
      <div class='card-body'>
        <h5 class='card-title'>" . $row['title'] . "</h5>
        <p>price: " . $row['price'] . "€</p>
        <a href='details.php?id=" . $row['id'] . "'><button class='button btn btn-primary' type='button'>Show Details</button></a>
        <a href='update.php?id=" . $row['id'] . "'><button class='button btn btn-warning' type='button'>Edit</button></a>
        <a href='delete.php?id=" . $row['id'] . "'><button class='button btn btn-danger' type='button'>Delete</button></a>
      </div>
    </div>
          </div>
            
            ";
    };
} else {
    $tbody =  "<tr><td colspan='5'><center>No Data Available </center></td></tr>";
}

mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CR#12</title>
    <?php require_once 'components/boot.php' ?>
    <style type="text/css">
        .manageProduct {
            margin: auto;
        }

        .img-thumbnail {
            width: 70px !important;
            height: 70px !important;
        }

        .hero {
            width: 100%;
            height: 20rem;
            background-image: url("pictures/hero.jpg");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .hero-text {
            text-align: center;
            position: absolute;
            top: 30%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            background-color: #b2b2b2;
            background-color: rgba(0, 0, 0, .3);
            
        }
    </style>
</head>

<body>
    <?php require_once 'components/navbar.php' ?>
    <div class="hero text-center align-items-center">
    <h1 class="hero-text text-center animate__animated animate__zoomIn">Your new Location here</h1>
  </div>
    <br>
    <div class="manageProduct w-75 mt-3">
        <div class='mb-3'>
        <a href="displayAll.php" class="btn btn-success" target="_blank">API</a>
            <a href="create.php"><button class='btn btn-primary' type="button">Add new Real Estate</button></a>
        </div>
        <p class='h2'>Our Objects:</p>
    </div>
    <div class="container">
        <br>
        <div class="row rows-col-lg-4 rows-col-md-2 rows-col-sm-1 animate__animated animate__fadeInLeft" id="content">
        </div>
      </div>
    <div class="container">
        <br>
        <div class="row rows-col-lg-4 rows-col-md-2 rows-col-sm-1 animate__animated animate__fadeInLeft">
          <?= $tbody ?>
        </div>
      </div>
    <div class="mt-5">
        <?php require_once 'components/footer.php' ?>
    </div>
    <script>
        document.getElementById("content").addEventListener("click", getProp, false)

function getProp() {
    const property = new XMLHttpRequest();
    property.open("GET", "displayAll.php", true);
    property.onload = function () {
        if (this.status == 200) {
            let properties = JSON.parse(this.responseText);
            console.log(properties.data);
            let output = '<h1 class="text-center text-primary">Properties</h1><div class="row row-col-12 justify-content-center g-4" >';
            for (let result of properties.data) { 
                output += "<div class='card text-center col-3' style='width: 18rem;'><img src='pictures/"+result.image+"' class='card-img-top'><div class='card-body'><h5 class='card-title text-center'>"+result.title+"</h5><p class='text-center'>address: "+result.address+"</p><p class='text-center'>size: "+result.size+"m²</p><p class='text-center'>rooms: "+result.rooms+"</p><p class='text-center'>city: "+result.city+"</p><p class='text-center'>"+result.price+"€</p><p class='card-text'>reduction: "+result.reduction+"</p></div></div>";
                console.log(output);
            }
            output +="</div>";
            document.getElementById("content").innerHTML = output;
        }
    }
    property.send(); 
}

    </script>
</body>

</html>