<?php
session_start();

$con = mysqli_connect('localhost','root','');

if(!$con){
    echo 'Not Connected to server';
}

if(!mysqli_select_db($con, 'adminregistration')){
    echo 'Databse not selected';
};

$name = $_POST['user'];
$pass = $_POST['password'];

$s = " select * from admintable where name ='$name'";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num == 1){ 
    echo" Username Already Taken";
}
else{
    $reg= " insert into admintable(name , password) values ('$name' , '$pass')";
    mysqli_query($con, $reg);
    echo" Registration Succcessful";
}
header("refresh:1; url=Registration.html");

?>