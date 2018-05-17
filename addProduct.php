<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Thêm Sản Phẩm</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<style type="text/css">

		  body {
		   background: #4568dc; /* fallback for old browsers */
 		   background: -webkit-linear-gradient(to right, #4568dc, #b06ab3); /* Chrome 10-25, Safari 5.1-6 */
  		   
		}
		h1{
			text-align: center;
			color: white;
		}
		.form-container{
			max-width: 400px;
			margin: 40px auto;
			width:400px;
			height: auto;
			background-color:  rgba(247, 247, 247, .5);
			box-shadow: 1px 2px 4px rgba(0 ,0 ,0 ,0.5),
						1px 2px 4px rgba(0 , 0 , 0,0.3),
						1px 2px 4px rgba(0 , 0 , 0,0.1);
			border-radius: 5px;
			margin: 0px auto;
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			padding: 40px;
		
		#add-btn{
			width: 100%
		}
	</style>


</head>
<body>
<?php

if(isset($_POST["code"])){
	require "database-config.php";
	$target_dir = "images/";
	$target_file = $target_dir .date("YmdHis"). basename($_FILES["fileToUpload"]["name"]);
	$code = $_POST["code"];
	$name = $_POST["name"];
	$category = $_POST["category"];
	$description = $_POST["description"];
	// $image = $_POST["image"];

	// Move upload file to img folder 
	move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);

	$sql = "INSERT INTO hanghoa(product_code, product_name, category, description, image) VALUES('".$code."','".$name."','".$category."','".$description."', '".$target_file."')";

	$result = mysqli_query($conn, $sql);
	if($result){
		//echo '<h2>Add product successfully</h2>';
		header("location: products.php");
		die();
	}else{		
		echo '<h2>Can not add product with error: '.mysqli_error($conn).'</h2>';
	}
}else{
	//echo 'No product code';
}

?>
<div class="container">
<div class="logo"><h1><i class="fa fa-plus" aria-hidden="true"></i> THÊM SẢN PHẨM</h1></div>
	<div class="form-container">
		<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
			<!-- Mã sản phẩm -->
			<div class="form-group">
				<label for="code">Số Lượng</label>
				<input type="text" name="code" id="code" class="form-control">
			</div>	
				<!-- Tên sản phẩm -->
			<div class="form-group">
				<label for="name">Tên Sản Phẩm</label>
				<input type="text" name="name" id="name" class="form-control">
			</div>	
				<!-- Loại sản phẩm -->
			<div class="form-group">
				<label for="category">Loại Sản Phẩm</label>
				<input type="text" name="category" id="category" class="form-control">
			</div>	
				<!-- Mô tả -->
			<div class="form-group">
				<label for="description">Thông Tin Sản Phẩm</label>
				<textarea type="text" name="description" id="description" class="form-control" rows="5"></textarea>
			</div>	

			<div class="form-group">
				<label for="fileToUpload">Hình Ảnh</label>
				<input type="file" name="fileToUpload" id="fileToUpload">
				<img src="#" style="width: 200px" class="thumbnail" id="uploadphoto">
			</div>	
			<div class="form-group">
				<button type="submit" class="btn btn-success" id="add-btn">Thêm</button>
			</div>

		</form>
	</div>	
</div>	

<!-- JQuey -->
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
  <!-- Bootstrap -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script type="text/javascript">
    function loadImage(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $("#uploadphoto").attr("src", e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
 
    $("#fileToUpload").change(function(){
        loadImage(this);
    })
</script>
</body>
</html>