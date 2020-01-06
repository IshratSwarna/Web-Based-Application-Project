<?php

session_start();
include("header.php");


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

#content{
margin-top: 10px;
margin-left: 0px;

}

#nav{
float : left;
padding-top: 20px;
background-color: #D5F5E3 ;
width: 19%;
height: 550px;
padding-left: 30px;
padding-bottom: 20px;
}

#main{
float: right;
background-color: #D5F5E3 ;
width: 80%;
height: 550px;
padding-top: 20px;
padding-bottom: 20px;
padding-left: 20px;
}

#footer{
clear : both;
}
li a{
	color: darkgreen;
}
h1{
	color: white;
	padding: 15px;
	padding-left: 170px;
}
</style>
</head>

<body id="body-bg">

<div id="container">
	<div id="header">
		<nav class="navbar navbar-expand-lg navbar-light">
			<a href="adminlogout.php"><button class="btn btn-outline-success">Logout</button></a>
  			<h1>Welcome <?php echo $_SESSION['username']; ?></h1>
		</nav>
	</div> 
	<div id="content">
		<div id="nav">
			<h3>Activities</h3>
			
				<li><a href="controlevents.php">Add Event</li>
				
				<li><a href="updateteachers.php">Update Recent Teachers</a></li>
				<li><a href="msgtoadmin.php">See All Messages</a></li>
			
		</div>
		<div id="main">
			<h3>Member's Information</h3><br>
			<div id="info">
				<table align="center">
					
					<tr>
						<th >Id</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Email</th>
						<th>Mbl No</th>
						<th>Blood Grp</th>
						<th>Series</th>
						<th>Dept</th>
						<th>Date of Birth</th>
						<th>Date of Graduation</th>
						
					</tr>
					
					<?php 
						$con = mysqli_connect('localhost','root','','studentinfo');
						if($con-> connect_error){
							die("Connection failed:". $con-> connect_error);
						}
						$sql = "SELECT id , first_name , last_name , mail , phone , bgroup , series , dept , dob , dog FROM studentsprofile ";
						$result = $con-> query($sql);

						if($result-> num_rows > 0){
							while($row = $result-> fetch_assoc()){
								echo "<tr><td>". $row["id"] . "</td><td>" . $row["first_name"] . "</td><td>" . $row["last_name"] . "</td><td>" . $row["mail"] . "</td><td>" . $row["phone"] . "</td><td>" . $row["bgroup"] . "</td><td>" . $row["series"] . "</td><td>" . $row["dept"] . "</td><td>" . $row["dob"] . "</td><td>" . $row["dog"] . "</td><td>" ;
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
	</div>
	<div id="footer">
		copyright &copy; 2019 ruet
	</div>

</div>

</body>
</html>