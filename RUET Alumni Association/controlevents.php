<?php

session_start();
include("header.php");
//include("config.php");
include("functions.php");
$con = mysqli_connect('localhost','root','','adminregistration');

$msg = '';$msg1 = '';$msg2 = '';$msg3 = '';$msg4 = '';
$ename = '';$edate = '';$edes = '';$image1 = '';$tmp_image1 = '';$image2 = '';$tmp_image2 = '';$image3 = '';$tmp_image3 = '';

if(isset($_POST['submit'])){
	$ename = $_POST['ename'];
	$edate = $_POST['edate'];
	$edes = $_POST['edes'];

	$image1 = $_FILES['image1']['name'];
    $tmp_image1 = $_FILES['image1']['tmp_name'];
    $size_image1 = $_FILES['image1']['size'];

    $image2 = $_FILES['image2']['name'];
    $tmp_image2 = $_FILES['image2']['tmp_name'];
    $size_image2 = $_FILES['image2']['size'];

    $image3 = $_FILES['image3']['name'];
    $tmp_image3 = $_FILES['image3']['tmp_name'];
    $size_image3 = $_FILES['image3']['size'];

    if(strlen($ename)<3)
    {
        $msg = "<div class='error'>First name must contain at least 3 characters.</div>";
    }
    else if(empty($edate))
    {
        $msg1 = "<div class='error'>Event must contain the Date.</div>";
    }
    else if($image1 == '')
    {
        $msg2 = "<div class='error'>Please, upload at least one photo.</div>";
    }
    else if($size_image1 >= 2000000)
    {
        $msg2 = "<div class='error'>Please, upload image less than 2 MB.</div>";
    }
    else if($size_image2 >= 2000000)
    {
        $msg3 = "<div class='error'>Please, upload image less than 2 MB.</div>";
    }
    else if($size_image3 >= 2000000)
    {
        $msg4 = "<div class='error'>Please, upload image less than 2 MB.</div>";
    }
    else
    {
        $img_ext1=explode(".", $image1);
        $imgage_ext1 = $img_ext1['1'];
        $image1 = rand(1,1000).rand(1,1000).time().".".$imgage_ext1;

        $img_ext2=explode(".", $image2);
        $imgage_ext2 = $img_ext2['1'];
        $image2 = rand(1,1000).rand(1,1000).time().".".$imgage_ext2;

        $img_ext3=explode(".", $image3);
        $imgage_ext3 = $img_ext3['1'];
        $image3 = rand(1,1000).rand(1,1000).time().".".$imgage_ext3;

        if($imgage_ext1=='jpg' || $imgage_ext1=='png' || $imgage_ext1=='JPG' || $imgage_ext1=='PNG' || $imgage_ext2=='jpg' || $imgage_ext2=='png' || $imgage_ext2=='JPG' || $imgage_ext2=='PNG' || $imgage_ext3=='jpg' || $imgage_ext3=='png' || $imgage_ext3=='JPG' || $imgage_ext3=='PNG')
        {
        move_uploaded_file($tmp_image1, "images/$image1"); 
        move_uploaded_file($tmp_image2, "images/$image2"); 
        move_uploaded_file($tmp_image3, "images/$image3");   
        mysqli_query($con,"INSERT INTO eventstable(ename,edate,edes,image1,image2,image3) 
        VALUES ('$ename','$edate','$edes','$image1','$image2','$image3')");
        //$msg4 = "<div class = 'success'>Your Profile is Ready!!</div>";
        $ename = '';$edate = '';$edes = '';$image1 = '';$tmp_image1 = '';$image2 = '';$tmp_image2 = '';$image3 = '';$tmp_image3 = '';
        }
        else
        {
            $msg2 = "<div class='error'>Please, upload a image file.</div>";
        }
    }
}
?>

<title>Welcome to Admin Home</title>   
<link rel="stylesheet" href="style.css"> 
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<style type="text/css">
table{
	border-collapse: collapse;
	width:100%;
	color: #185231;
	font-family: monospace;
	font-size: 15px;
	text-align: left;
}
th{
	background-color: #185231;
	color: white; 
}
tr:nth-child(even) {background-color: #f2f2f2}
#body-bg
{
	background-color: #efefef;
}
#header{
background-color: #52BE80 ;
}

#container{
margin-top: 10px;
margin-left: 10px;
margin-bottom: 10px;
margin-right: 10px;
}
button{
    background: darkgreen;
    color:#ccc;
    width: 180px;
    height: 50px;
    border: 1px solid #E5E7E9;
    font-size: 25px;
    border-radius: 5px;
    transition: .6s;
    overflow: hidden;
}
#content{
margin-top: 10px;
margin-left: 0px;

}
#other{
float: left;
width: 58% ;
background-color: #D5F5E3 ;
height: 550px;
padding-top: 20px;
padding-bottom: 20px;
padding-left: 20px;
}
#main{
float: right;
background-color: #D5F5E3 ;
width: 41%;
height: 550px;
padding-top: 20px;
padding-bottom: 20px;
padding-left: 20px;
}

#footer{
clear : both;
}
h4{
	color: darkred ;
}
h1{
	color: white;
	padding: 15px;
	padding-left: 170px;
}
hr{
	height: 2px;
}
</style>
</head>

<body id="body-bg">

<div id="container">
	<div id="header">
		<nav class="navbar navbar-expand-lg navbar-light">
			<a href="adminhome.php"><button class="btn btn-outline-success">Back</button></a>
  			<h1>Welcome <?php echo $_SESSION['username']; ?></h1>
		</nav>
	</div> 
	<div id="content">
		<form method="post" enctype="multipart/form-data">
		<div id="other">			
			<div class="form-group">
                <label>Set Event Name :</label>
                <input type="text" name="ename" placeholder="Event name" class="form-control" value='<?php echo $ename; ?>'>
                <?php echo $msg; ?> 
            </div>
            <div class="form-group">
	            <label>Set Event Date :</label>
	            <input type="date" name="edate" placeholder="date" class="form-control" value='<?php echo $edate; ?>'>
	            <?php echo $msg1; ?> 
            </div>
            <div class="form-group">
	            <label>Add Description :</label>
	            <input type="text" name="edes" placeholder="Description" class="form-control" value='<?php echo $edes; ?>'>
            </div>	
		</div>
		<div id="main">
			<div class="form-group">
                <label>Add Photos :</label>
                <hr color="darkred">
                <label>Image 01 :</label>
                <input type="file" name="image1" value='<?php echo $image1; ?>'> <br>
                <?php echo $msg2; ?>
                <label>Image 02 :</label>
                <input type="file" name="image2" value='<?php echo $image2; ?>'> <br>
                <?php echo $msg3; ?>
                <label>Image 03 :</label>
                <input type="file" name="image3" value='<?php echo $image3; ?>'> <br>
                <?php echo $msg4; ?>
            </div> 
            <center><input type="submit" value="POST" name="submit" class="btn btn-success" /></center>
		</div>
		</form>
	</div>
	<div id="footer">
		copyright &copy; 2019 ruet
	</div>

</div>

</body>
</html>