<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Quản Lý Hàng Hóa</title>
  <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<?php

        require 'database-config.php';
        
        if (isset($_GET['search'])){
            $searchq = $_GET['search'];
            $searchq = preg_replace("#[^0-9a-z]#i", "", $searchq);
            $sql = "SELECT  product_code, product_name, category, description,price, image FROM hanghoa WHERE product_name LIKE '%".$searchq."%'";
        }else{ 
            $sql = "SELECT  product_code, product_name, category, description,price, image FROM hanghoa";
        }
        $result = mysqli_query($conn, $sql);
        if(!$result){
        //Kiểm tra xem bị lỗi j
            die("Can't query data. Error occure.".mysqli_error($conn));
        }
        if (mysqli_num_rows($result) > 0) {
             echo "<div class='timkiem'style='padding :40px 40px 40px 40px'>";
             echo "<div class='row'>";
            $a=0;
            while($row = mysqli_fetch_assoc($result)) {
                echo "<div class='col-lg-3 col-md-4 '>";
                
                // echo "<div class='product-container thumbnail'>";
                echo "<img class='img-responsive' src='".$row["image"]."'>";
                echo "<h3><center>".$row["product_code"]."</center></h3>";
                echo "<h3><center>".$row["product_name"]."</center></h3>";
                echo "<h3><center>".$row["category"]."</center></h3>";
                echo "<h3><center>".$row["description"]."</center></h3>";
                echo "<h3><center>".$row["price"]."</center></h3>";

                // echo "</div>";
                echo "</a>";
                echo "</div>";
                $a=$a+1;
            }
            
             echo "</div>";  
             echo "</div>";
            // echo "<div><b></t> $a products have been found... </b></div><br>";  
        }else{
                // echo "<div class='containter'>";
                // echo "<div class='row'>";
                echo "No results to search";
                echo"Location: index.php";
                // echo "</div>";
                // echo "</div>";
        }
        
            mysqli_close($conn);
            ?>
            
</div>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.parallax.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/custom.js"></script>

</body>
</html>
<?php
include 'footer.php'; 
?>
