<?php

session_start();
$msg0 = '';
$Position = ''; $Compn = ''; $Remarks = ''; $JoinDate = ''; $Faculty = ''; $Roomn = ''; $Floorn = ''; $Buildingn = ''; $workid = '' ;
$sid = $_SESSION['id'];
include("header.php");
include("config.php");
include("functions.php");
//echo $sid ;
if(isset($_POST['submit']))
{
	$Position = $_POST['pos'];
	$Compn = $_POST['comp'];
	$Remarks = $_POST['remark'];
	$JoinDate = $_POST['doj'];
	$Faculty = $_POST['faculty'];
	$Roomn = $_POST['room'];
	$Floorn = $_POST['floor'];
	$Buildingn = $_POST['build'];

	//echo 'Connected to server';
	$con = mysqli_connect('localhost','root','','studentinfo');
	
	if(!exist_work($sid , $con)){
		mysqli_query($con,"INSERT INTO studentwork(work_id,id,position,comp,remark,doj,faculty,room,floor,building)
		VALUES ('$workid','$sid','$Position','$Compn','$Remarks','$JoinDate','$Faculty','$Roomn','$Floorn','$Buildingn')");
		$msg0 = "<div class = 'success'>Your Work Info has been added!!</div>";
	}
	else{
		mysqli_query($con,"UPDATE studentwork SET position = '$Position' , comp = '$Compn' , remark = '$Remarks' , doj = '$JoinDate' , faculty = '$Faculty', room = '$Roomn' , floor = '$Floorn' , building = '$Buildingn' WHERE id = '$sid' ");
		$msg0 = "<div class = 'success'>Your Work Info has been updated!!</div>";
	}

	$Position = ''; $Compn = ''; $Remarks = ''; $JoinDate = ''; $Faculty = ''; $Roomn = ''; $Floorn = ''; $Buildingn = ''; $workid = '' ;
	header("location:studenthome.php");
}
?>


<html>
<head>
<title>Add Work Info</title>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="workstyle.css">
</head>
<body>
<div class="work-page">	
	<div class="form">
		<form method="post" enctype="multipart/form-data" class="ruet-form">
			<h3 align='center'>Work at RUET?</h3> <br>
			<input type="text" name="pos" placeholder="Designation" class="form-control" value='<?php echo $Position; ?>'/>
			<input type="text" name="faculty" placeholder="Faculty" class="form-control" value='<?php echo $Faculty; ?>'/>
			<input type="text" name="remark" placeholder="Remark" class="form-control" value='<?php echo $Remarks; ?>'/>
			<input type="date" name="doj" placeholder="Joining Date" class="form-control" value='<?php echo $JoinDate; ?>'/>
			<input type="text" name="room" placeholder="Room no" class="form-control" value='<?php echo $Roomn; ?>'/>
			<input type="text" name="floor" placeholder="Floor" class="form-control" value='<?php echo $Floorn; ?>'/>
			<input type="text" name="build" placeholder="Building" class="form-control" value='<?php echo $Buildingn; ?>'/>
			<center><input type="submit" value="Submit" name="submit" class="btn btn-success" /></center>
			<p class="message">Others?<a href="#">Click here</a></p>
		</form>
		<form method="post" enctype="multipart/form-data" class="other-form">
			<input type="text" name="pos" placeholder="Current Position" class="form-control" value='<?php echo $Position; ?>' />
			<input type="text" name="comp" placeholder="Company" class="form-control" value='<?php echo $Compn; ?>'/>
			<input type="text" name="remark" placeholder="Remark" class="form-control" value='<?php echo $Remarks; ?>'/>
			<input type="date" name="doj" placeholder="Joining Date" class="form-control" value='<?php echo $JoinDate; ?>'/>
			<center><input type="submit" value="Submit" name="submit" class="btn btn-success" /></center>
			<p class="message">Work at RUET?<a href="#">Click here</a></p>
		</form>
		
	</div>
</div>
<script src='https://code.jquery.com/jquery-3.2.1.min.js'>
</script>
<script>
	$('.message a').click(function(){
		$('form').animate({height :"toggle", opacity: "toggle"}, "slow");
	})
</script>

</body>
</html>