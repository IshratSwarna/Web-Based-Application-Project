
<?php
	
function email_exists($email,$con)
{
	$result = mysqli_query($con, "SELECT email FROM studentregistration WHERE email='$email' ");

	$rcount = mysqli_num_rows($result);

	if($rcount >= 1)
	{
		return true;
	}
	else
	{
		return false;
	}

}

function exact_email($email,$con)
{
	$result = mysqli_query($con, "SELECT email FROM studentregistration WHERE email='$email' ");

	$rcount = mysqli_num_rows($result);

	if($rcount == 1)
	{
		return true;
	}
	else
	{
		return false;
	}
}

function exact_password($pass , $email , $con)
{
	$result = mysqli_query($con, "SELECT email FROM studentregistration WHERE password='$pass' AND email='$email' ");

	$rcount = mysqli_num_rows($result);

	if($rcount == 1){
		return true;
	}
	else{
		return false;
	}

}

function exist_work($sid , $con)
{
	$result = mysqli_query($con, "SELECT id FROM studentwork WHERE id = '$sid' ");

	$rcount = mysqli_num_rows($result);

	if($rcount == 1){
		return true;
	}
	else{
		return false;
	}
}

function exist_faculty($id , $con)
{
	$result = mysqli_query($con, "SELECT faculty FROM studentwork WHERE id = '$id' ");

	$retrive = mysqli_fetch_array($result);
	$fac = $retrive['faculty'];

	if($fac == ''){
		return false;
	}
	else{
		return true;
	}
}
function c_ruet($type3)
{
	if(($type3 != '') &&($type3 = 'RUET' || $type3 = 'ruet')){
		return true;
	}
	else{
		return false;
	}
}
function c_work($type3)
{
	if($type3 != ''){
		return true;
	}
	else{
		return false;
	}
}

?>