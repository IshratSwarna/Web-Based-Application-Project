<?php
session_start();

include("functions.php");

$con = mysqli_connect('localhost','root','');

$msg = '';

if(!$con){
    echo 'Not Connected to server';
}

if(!mysqli_select_db($con, 'studentinfo')){
    echo 'Databse not selected';
};

$mail = $_POST['email'] ;
$pass = $_POST['password'];

if(!filter_var($mail,FILTER_VALIDATE_EMAIL))
{
    $msg = "<div class='error'>Enter valid Email.</div>";
}
else if(email_exists($mail,$con))
{
    $msg = "<div class='error'>Email exists.</div>";
}
$s = " select * from studentregistration where email ='$mail'";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num == 1){ 
    echo" This Email has been Already Taken";
}
else{
    $reg= " insert into studentregistration( email , password ) values ('$mail' , '$pass')";
    mysqli_query($con, $reg);
    header('location:studentprofile.php');
}

?>