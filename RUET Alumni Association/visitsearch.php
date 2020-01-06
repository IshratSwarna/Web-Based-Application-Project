<html>
<head>
   <title>Visitor's search</title> 
    <meta name="viewport" content="width=device-width , initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <style type="text/css">
        h6{
            text-align:left;
            color:darkblue;
            position:relative;
        }
        h2{
            color:darkred;
            margin: inherit;
            padding: inherit;
        }
        h6{
          padding-left: 8;
          margin: inherit;
        }
        h3{
            text-align: left;
            color: aliceblue;
            padding-bottom: 10;
            
        }
        nav ul li{
            transform: 1s all;
        }
        nav ul li:hover{
            background-color:black;
        }
        hr{
        	height: 2px;
        }
        .mbox h2{
        	margin: 15px;
        	padding: 15px;
        	padding-left: 0px;
        	color: black;
        }
        .main{
        	margin: 0px;
        	margin-top: 0px;
        	background-color: black;
        }
        .mbox{
        	margin: 10px;
        	padding: 2px;
        	margin-right: 50px;
        	margin-left: 50px;
            padding-left: 20px;
            background-color: lightblue;
            transition: 0.5s;
        }
        .mbox:hover{
            box-shadow: 0 2px 20px #333;
        }
        #footer{
          clear: both;
          background-color: grey;
          padding: 10px;
          margin-left: 0px;

        }
    </style>
</head>
<body>
	<!------header----->
	<section id="header">
	<div class="menu-bar">
	<nav class="navbar navbar-expand-lg navbar-light">
	  <a class="navbar-brand" href="#"><img src="images/ruet-logo.png"></a>
	  <h2>RUET</h2><h1>|</h1><h6>ALUMNI<br> ASSOCIATION</h6>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNav">
	    <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.html">HOME</a>
          </li>
	      <li class="nav-item">
	        <a class="nav-link" href="aboutus.html">ABOUT US</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="events.html">EVENTS</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="contactus.html">CONTACT US</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="http://www.ruet.ac.bd/">RUET</a>
	      </li>
	    </ul>
	  </div>
	</nav>
	</div>
	</section>
	<section id="maincontent">
	<div class="main">
		<div class="mbox">
			<h2>Your Searched result</h2>
			<hr color="darkred">
			<div class="result">
				<table align="center">
					
					<tr>
						<th >First Name</th>
						<th>Last Name</th>
						<th>Email</th>
						<th>Blood Grp</th>
						<th>Series</th>
						<th> Dept </th>
						<th>Position</th>
						<th>Work Place</th>
						<th>Faculty</th>
						<th>Room</th>
						<th>Floor</th>
						<th>Building</th>
					</tr>
					
					<?php
						session_start();
						include("header.php");
						include("config.php");
						include("functions.php");

						$type1 = $_POST['nesd'];
						$type2 = $_POST['blgrp'];
						$type3 = $_POST['wplace'];
						$con = mysqli_connect('localhost','root','','studentinfo');
						if($con-> connect_error){
							die("Connection failed:". $con-> connect_error);
						}
						$sql = " select first_name , last_name , mail ,bgroup , series , dept from studentsprofile where first_name ='$type1' || last_name = '$type1' || mail = '$type1'  || series = '$type1' || dept = '$type1' ";

						//$result = mysqli_query($con, $s);
						$result = $con-> query($sql);

						if($result-> num_rows > 0){
							while($row = $result-> fetch_assoc()){
								echo "<tr><td>". $row["first_name"] . "</td><td>" . $row["last_name"] . "</td><td>" . $row["mail"] . "</td><td>" . $row["bgroup"] . "</td><td>" . $row["series"] . "</td><td>" . $row["dept"] . "</td><td>" . "</td><td>" . "</td><td>" . "</td><td>" . "</td><td>" . "</td><td>" . "</td><td>" . "</td><td>" . "</td><td>" . "</td><td>" . "</td><td>" . "</td><td>" . "</td><td>" ;
							}
							echo "</table>";
						}
						else{
							echo "<br>";
						}
						$sql2 = " select first_name , last_name , mail ,bgroup , series , dept from studentsprofile where bgroup ='$type2' ";

						//$result = mysqli_query($con, $s);
						$result2 = $con-> query($sql2);

						if($result2-> num_rows > 0){
							while($row2 = $result2-> fetch_assoc()){
								echo "<tr><td>". $row2["first_name"] . "</td><td>" . $row2["last_name"] . "</td><td>" . $row2["mail"] . "</td><td>" . $row2["bgroup"] . "</td><td>" . $row2["series"] . "</td><td>" . $row2["dept"] . "</td><td>" . "</td><td>" . "</td><td>" . "</td><td>" . "</td><td>" . "</td><td>" . "</td><td>" . "</td><td>" . "</td><td>" . "</td><td>" . "</td><td>" . "</td><td>" . "</td><td>" ;
							}
							echo "</table>";
						}
						else{
							if(c_work($type3)){
								if(c_ruet($type3)){
									$type3 = '';
								}
								$sql3 = " select first_name , last_name , mail ,bgroup , series , dept , position , comp , faculty , room , floor , building from studentsprofile , studentwork where comp ='$type3' && studentwork.id = studentsprofile.id ";

								$result3 = $con-> query($sql3);
								
								if($result3-> num_rows > 0){
									while($row3 = $result3-> fetch_assoc()){
										echo "<tr><td>". $row3["first_name"] . "</td><td>" . $row3["last_name"] . "</td><td>" . $row3["mail"] . "</td><td>" . $row3["bgroup"] . "</td><td>" . $row3["series"] . "</td><td>" . $row3["dept"] . "</td><td>" . $row3["position"] . "</td><td>" . $row3["comp"] . "</td><td>" . $row3["faculty"] . "</td><td>" . $row3["room"] . "</td><td>" . $row3["floor"] . "</td><td>" . $row3["building"] . "</td><td>" ;
									}
									echo "</table>";
								}
								else{
									echo "<br>";
								}
							}
							else{
								echo "0 result";
							}
						}
						$con-> close();
					?>
				</table>
			</div>
		</div>
	</div>
	</section>
	<section>
	  <div id="footer">
	      copyright &copy; 2019 ruet
	  </div>
	</section>
</body>




</html>