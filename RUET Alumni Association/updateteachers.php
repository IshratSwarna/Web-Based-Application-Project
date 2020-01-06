<?php

session_start();
include("header.php");
include("config.php");
include("functions.php");

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
		<div id="other">
			<h3>Teachers of RUET sorted by joining date</h3>
			<hr color="darkred">
			<div id="info">
				<table align="center">
					
					<tr>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Designation</th>
						<th>Faculty</th>
						<th>Room</th>
						<th>Floor</th>
						<th>Building</th>
						<th>Date of join</th>
						<th>Remark</th>
						
					</tr>
					
					<?php 
						$con = mysqli_connect('localhost','root','','studentinfo');
						if($con-> connect_error){
							die("Connection failed:". $con-> connect_error);
						}
						//$sql = "SELECT id , first_name , last_name , mail , phone , bgroup , series , dept , dob , dog FROM studentsprofile ";
						$sql = "SELECT id , position , faculty , room , floor , building , doj , remark  FROM studentwork WHERE faculty not like '' ORDER BY doj desc " ;
						$result = $con-> query($sql);

						if($result-> num_rows > 0){
							while($row = $result-> fetch_assoc()){
								$idv = $row["id"] ;
								//echo $idv ;
								$sql2 = "SELECT first_name , last_name  FROM studentsprofile WHERE id = '$idv' ";
								$res = $con-> query($sql2);
								$row2 = $res-> fetch_assoc() ;
								echo "</tr><td>" . $row2["first_name"] . "</td><td>" . $row2["last_name"] . "</td><td>" . $row["position"] . "</td><td>" . $row["faculty"] . "</td><td>" . $row["room"] . "</td><td>" . $row["floor"] . "</td><td>" . $row["building"] . "</td><td>" . $row["doj"] . "</td><td>" . $row["remark"] . "</td><td>" ;
								//echo "<br>";
							}
							echo "</table>";
						}
						else{
							echo "0 result";
						}
						$con-> close();
					?>
				</table>	
			</div>
		</div>
		<div id="main">
			<h3>Recently Updated Teacher Table</h3>
			<hr color="darkred">
			<div id="updatepart">
				<table align="center">
					
					<tr>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Designation</th>
						<th>Faculty</th>
						
						<th>Date of join</th>
						
						
					</tr>
					
					<?php 
						$con = mysqli_connect('localhost','root','','studentinfo');
						if($con-> connect_error){
							die("Connection failed:". $con-> connect_error);
						}
						$sql = "SELECT fname , lname , designation , faculty , doj  FROM teachertable " ;
						$result = $con-> query($sql);

						if($result-> num_rows > 0){
							while($row = $result-> fetch_assoc()){
								echo "</tr><td>" . $row["fname"] . "</td><td>" . $row["lname"] . "</td><td>" . $row["designation"] . "</td><td>" . $row["faculty"] . "</td><td>" . $row["doj"] . "</td><td>"  ;
							}
							echo "</table>";
						}
						
						else{
							echo "0 result";
						}
						$con-> close();
					?>
				</table>	
			</div>
			<br><br>
			<h4 >Want to update it?</h4>
			<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
			<script type="text/javascript">
				function test(){
					$.ajax({url:"buttonupdateteachers.php",success:function(result){
						alert("Updated");
					}
				})
				}
			</script>
			<button onclick="test()">Update</button>
		</div>
	</div>
	<div id="footer">
		copyright &copy; 2019 ruet
	</div>

</div>

</body>
</html>