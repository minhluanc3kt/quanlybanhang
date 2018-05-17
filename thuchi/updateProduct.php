<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Update</title>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<style type="text/css">
    .form-container{
        width : 400px;
        margin : 20px auto;
    }
    .btn-success{
        width : 100%;
    }
    .xcontainer{
        margin-top: 100px;
        background-color: rgba(255, 255, 255, 0.3);
        width: 30%;
        margin-left: 32%;
        border-radius: 15px;
        border: 2px solid gray ;
        border-color: gray;
    }
    body{
        background: #314755;  /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #26a0da, #314755);  /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #26a0da, #314755); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

    }
    h1{
        text-align: center;
        color: rgba(255, 255, 255, 0.5);
    }
    img{
        width: 100px;
    }
</style>
</head>
<body>

<?php 
require 'database-config.php';
if ($_SERVER["REQUEST_METHOD"] == "POSTssss") {
    $id = $_POST["id"];
    $product_name = $_POST["product_name"];
     $price = $_POST["price"];
      $description = $_POST["description"];
    $category = trim($_POST['category']);
    // $image = trim($_POST['image']);
    $target_dir = "images/";
    $image = $target_dir .date("Y-m-d_H_i_s"). basename($_FILES["fileToUpload"]["name"]);
    move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $image);

    $sql = 'UPDATE hanghoa SET product_name="' . $product_name . '", price=" ' . $price . '",image="' . $image . '", category="'.$category.'", description="'.$description.'"  WHERE id='.$id.'';
    mysqli_query($conn, $sql);
    echo $sql;
    if (mysqli_query($conn, $sql)) {
        header('Location: products.php');
        die();
    } else {
        echo '<h1>Can not add product with error : ' . mysqli_error($conn) . '</h1>';
    }
} else {

}
if (isset($_GET['id'])) {
    $id = $_GET["id"];
    $sql = "SELECT product_name,price,image,category,description FROM hanghoa WHERE id='" . $id . "'";
    // echo $sql;
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die('can\'t not query date' . mysqli_error($conn));

    }

    if (mysqli_num_rows($result) > 0) {
        if ($row = mysqli_fetch_assoc($result)) {

            ?>
    <div class="xcontainer">
        <div class="form-container">
        <h1><i class="fa fa-pencil" aria-hidden="true"></i>UPDATE PRODUCT</h1>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">ID</label>
                    <input type="text" name="id" id="id" class="form-control" value="<?php echo $id; ?>" readonly>
                </div>
                <!-- Product Name -->
                <div class="form-group">
                    <label for="">Name Product</label>
                    <input type="text" name="product_name" id="product_name" class="form-control" value="<?php echo $row["product_name"]; ?>"  require>
                </div>
                <!-- Price -->
                <div class="form-group">
                    <label for="">Price</label>
                    <input type="text" name="price" id="price" class="form-control" value="<?php echo $row["price"]; ?>" require>
                </div>

                <!-- Category-->
                <div class="form-group">
                    <label for="">Category</label>
                    <input type="text" name="category" id="category" class="form-control" value="<?php echo $row["category"]; ?>" require>
                </div>

                <!-- Description -->
                <div class="form-group">
                    <label for="">Description</label>
                    <input type="text" name="description" id="description" class="form-control" value="<?php echo $row["description"]; ?>" require>
                </div>

                <!-- Image -->
                <div class="form-group">
                    <label for="">Image</label>
                    <img src="<?php echo $row["image"]; ?>" alt="">
                    <input type="file" name="fileToUpload" id="fileToUpload" class="form-control">
                </div>
                <input type="submit" value="Save" name="submit">
                <!-- <button class="btn btn-success" name="submit" type="submit">Add</button> -->
            </form>
        </div>
        <?php

        ?>
    </div>
<?php 
}
}
} ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>