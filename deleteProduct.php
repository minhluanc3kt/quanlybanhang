
<?php

if(isset($_GET["id"])){
    require "database-config.php";
    $id = $_GET["id"];
    
    $sql = "DELETE FROM hanghoa WHERE id = ".$id;

    $result = mysqli_query($conn, $sql);
    if($result){
        //echo '<h2>Add product successfully</h2>';
        header("location: products.php");
        die();
    }else{      
        echo '<h2>Can not delete product with error: '.mysqli_error($conn).'</h2>';
    }
}else{
    echo 'No product id';
}

?>