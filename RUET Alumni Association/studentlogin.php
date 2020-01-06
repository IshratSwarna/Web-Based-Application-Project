<?php
session_start();

$con = mysqli_connect('localhost','root','');

if(!$con){
    echo 'Not Connected to server';
}

if(!mysqli_select_db($con, 'studentinfo')){
    echo 'Databse not selected';
};

$email = $_POST['email'];
$pass = $_POST['password'];

$s = " select * from studentsprofile where mail ='$email' && password ='$pass' ";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num == 1){
    $_SESSION['email'] = $email;
    header('location:studenthome.php');
}
else{
    header('location:Login.html');
}

?>