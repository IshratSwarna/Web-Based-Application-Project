<?php
	//echo "get" ;
	$con = mysqli_connect('localhost','root','','studentinfo');
	if($con-> connect_error){
		die("Connection failed:". $con-> connect_error);
	}
	mysqli_query($con, " DELETE FROM teachertable ");
	
	$sql = "SELECT id , work_id , position , faculty , room , floor , building , doj , remark  FROM studentwork WHERE faculty not like '' ORDER BY doj desc " ;
	$result = $con-> query($sql);
	$tid = '';
	if($result-> num_rows > 0){
		while($row = $result-> fetch_assoc()){
			$idv = $row["id"] ;
			//echo $idv ;
			$sql2 = "SELECT first_name , last_name , phone , image FROM studentsprofile WHERE id = '$idv' ";
			$res = $con-> query($sql2);
			$row2 = $res-> fetch_assoc() ;
			$wd = $row["work_id"];
			$fn = $row2["first_name"];
			$ln = $row2["last_name"];
			$pos = $row["position"];
			$fac = $row["faculty"];
			$ph = $row2["phone"];
			$rm = $row["room"];
			$fl = $row["floor"];
			$bd = $row["building"];
			$d = $row["doj"];
			$rek = $row["remark"];
			$img = $row2["image"] ;
			mysqli_query($con," INSERT INTO teachertable(tid, id , work_id, fname , lname , designation , faculty , mbl_no , room , 
			floor , building , doj , remark , images )
			VALUES ('$tid' , '$idv' , '$wd' , '$fn' , '$ln' , '$pos' , '$fac' , '$ph' , '$rm' , '$fl' , '$bd' , '$d' , '$rek' , '$img') ");
		}
		
	}
?>


