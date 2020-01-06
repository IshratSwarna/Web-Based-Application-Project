<?php

session_start();
include("header.php");
include("config.php");
include("functions.php");

$msg = 'You did not add your work information. ' ;
$msg2 = 'Faculty of ';
$msg3 = ' , RUET';
$msg4 = 'Contact info: ';
$msg5 = 'Room no: ';
$msg6 = ' floor, ';
$msg7 = ' building.';
$msg8 = 'Date of Join: ';
$msg9 = 'Remark: ';
$email = $_SESSION['email'];
$result = mysqli_query($con,"SELECT id , first_name , last_name , mail, phone, bgroup, series, dept, dob, dog, image FROM studentsprofile WHERE mail = '$email' ");
$retrive = mysqli_fetch_array($result);
//print_r($retrive);

$id = $retrive['id'];
$_SESSION['id'] = $id;

$firstname = $retrive['first_name'];
$lastname = $retrive['last_name'];
$email = $retrive['mail'];
$num = $retrive['phone'];
$blgrp = $retrive['bgroup'];
$series = $retrive['series'];
$department = $retrive['dept'];
$dateb = $retrive['dob'];
$dateg = $retrive['dog'];

$image = $retrive['image'];

$result = mysqli_query($con,"SELECT position , comp , remark , doj , faculty , room , floor , building FROM studentwork WHERE id = '$id' ");
$retrive = mysqli_fetch_array($result);

$pos = ''; $company = ''; $remarks = ''; $joindate = ''; $Faculty = ''; $roomn = ''; $floorn = ''; $build = '';
$pos = $retrive['position'];
$company = $retrive['comp'];
$remarks = $retrive['remark'];
$joindate = $retrive['doj'];
$Faculty = $retrive['faculty'];
$roomn = $retrive['room'];
$floorn = $retrive['floor'];
$build = $retrive['building'];
?>

<title>Welcome to Student Home</title>   
<link rel="stylesheet" href="style.css"> 
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<style type="text/css">
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

#content{
margin-top: 10px;
margin-left: 0px;

}

#nav{
float : left;
padding-top: 20px;
background-color: #D5F5E3 ;
width: 24%;
height: 550px;
padding-left: 30px;
padding-bottom: 20px;
}

#main{
float: right;
background-color: #D5F5E3 ;
width: 75%;
height: 550px;
padding-top: 20px;
padding-bottom: 20px;
padding-left: 20px;
}
#otherpart{
float: left;
width: 55%;
}
#workpart{
float: right;
width: 40%;
}
#footer{
clear : both;
}
#pinfo{
	float:left;
	width: 33%;
}

#info{
	float:right;
	width: 66%;
}
h1{
	color: white;
	padding: 15px;
	padding-left: 170px;
}
li a{
	color: darkgreen;
}
</style>
</head>

<body id="body-bg">

<div id="container">
	<div id="header">
		<nav class="navbar navbar-expand-lg navbar-light">
			
			<a href="studentlogout.php"><button class="btn btn-outline-success">Logout</button></a>
  			<h1 >Welcome to Your Profile!</h1>
		</nav>
	</div>
	<div id="content">
		<div id="nav">
			<h3>Activities</h3>
			
				
				<li><a href="studentwork.php">Update Your Work Info</a></li>
			
		</div>
		<div id="main">
			<div id="otherpart">
				<h3><?php echo ucfirst($firstname)." ".ucfirst($lastname) ?></h3><br>
				<div id="pinfo">
				<img src="images/<?php echo $image ?>" class="img-fluid img-thumbnail" style="width:200px; height: 300px;" > 
				<br><br><p>Bio can be added here.</p>
				</div>
				<div id="info">
					<li>Email: <?php echo $email ?></li>
					<li>Contact Number: <?php echo $num ?></li>
					<li>Blood Group: <?php echo $blgrp ?></li>
					<li>Date of Birth: <?php echo $dateb ?></li>
					<li>Series: <?php echo $series ?></li>
					<li>Department: <?php echo $department ?></li>
					<li>Date of Graduation: <?php echo $dateg ?></li>
					
				</div>
			</div>
			<div id="workpart">
				<h4>Work Info</h4><br>
				<div id="workinfo">
					<?php
					if(!exist_work($id , $con))
						 echo $msg ;
					else if(!exist_faculty($id , $con)){
						echo $pos ; echo "<br>" ;
						echo $company ; echo "<br>" ;
						echo $msg8 ; echo $joindate ; echo "<br>" ;
						echo $msg9 ; echo $remarks ; echo "<br>" ;
					}
					
					else{
						echo $pos ; echo "<br>" ;
						echo $msg2 ; echo $Faculty ; echo $msg3 ; echo "<br>";
						echo $msg4 ; echo "<br>" ;
						echo $msg5 ; echo $roomn ; echo "<br>" ;
						echo $floorn ; echo $msg6 ; echo $build ; echo $msg7 ; echo "<br>" ;
						echo $msg8 ; echo $joindate ; echo "<br>" ;
						echo $msg9 ; echo $remarks ; echo "<br>" ;
					}
					?>
				</div>
			</div>
		</div>
	</div>
	<div id="footer">
		copyright &copy; 2019 ruet
	</div>

</div>

</body>
</html>