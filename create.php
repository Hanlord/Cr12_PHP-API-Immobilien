<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once 'components/boot.php' ?>
    <title>Add Real Estate</title>
    <style>
        fieldset {
            margin: auto;
            margin-top: 100px;
            width: 60%;
        }
    </style>
</head>

<body>
    <fieldset>
        <legend class='h2'>Add Real Estate</legend>
        <form action="actions/a_create.php" method="post" enctype="multipart/form-data">
            <table class='table'>
                <tr>
                    <th>Title</th>
                    <td><input class='form-control' type="text" name="title" placeholder="Title" /></td>
                </tr>
                <tr>
                    <th>Size</th>
                    <td><input class='form-control' type="number" name="size" placeholder="size"/></td>
                </tr>
                <tr>
                    <th>Rooms</th>
                    <td><input class='form-control' type="number" name="rooms" placeholder="rooms"/></td>
                </tr>
                <tr>
                    <th>City</th>
                    <td><input class='form-control' type="text" name="city" placeholder="City" /></td>
                </tr>
                <tr>
                    <th>Price</th>
                    <td><input class='form-control' type="number" name="price" placeholder="Price"/></td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td><input class='form-control' type="text" name="address" placeholder="address" /></td>
                </tr>
                <tr>
                    <th>Picture</th>
                    <td><input class='form-control' type="file" name="image" /></td>
                </tr>
                <tr>
                    <th>Latitude</th>
                    <td><input class='form-control' type="text" name="latitude" placeholder="latitude" /></td>
                </tr>
                <tr>
                    <th>Longitude</th>
                    <td><input class='form-control' type="text" name="longitude" placeholder="longitude" /></td>
                </tr>
                <tr>
                    <th>Reduction</th>
                    <td>
                        <select class="form-select" name="reduction" aria-label="Default select example">
                            
                            <option value='yes'>yes</option>
                            <option value='no'>no</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><button class='btn btn-success' type="submit">Insert Product</button></td>
                    <td><a href="index.php"><button class='btn btn-warning' type="button">Home</button></a></td>
                </tr>
            </table>
        </form>
    </fieldset>
    <?php require_once 'components/footer.php' ?>
</body>

</html>