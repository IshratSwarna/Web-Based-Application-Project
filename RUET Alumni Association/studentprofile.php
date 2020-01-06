<?php
$msg = ''; $msg2 = ''; $msg3 = ''; $msg4 = ''; $msg5 = ''; $msg6 = ''; $msg7 = ''; $msg8 = ''; $msg9 = ''; $msg0 = ''; $msg10='';

$firstname = ''; $lastname = ''; $email = ''; $password = ''; $c_password = ''; $phone = '';$Bgrp = '';$series = '';$dept = '';
$dateb = '';$dateg = '';$image = '';$tmp_image = '';
include("header.php");
include("config.php");
include("functions.php");
if(isset($_POST['submit']))
{
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $email = $_POST['mail'];
    $password = $_POST['pass'];
    $c_password = $_POST['cpass'];
    $phone = $_POST['pnumber'];
    $Bgrp = $_POST['blgrp'];
    $series = $_POST['series'];
    $dept = $_POST['dept'];
    $dateb = $_POST['dob'];
    $dateg = $_POST['dog'];
    
    $image = $_FILES['image']['name'];
    $tmp_image = $_FILES['image']['tmp_name'];
    $size_image = $_FILES['image']['size'];
    $checkbox = isset($_POST['check']);
    
    if(strlen($firstname)<3)
    {
        $msg = "<div class='error'>First name must contain at least 3 characters.</div>";
    }
    else if(strlen($lastname)<3)
    {
        $msg2 = "<div class='error'>Last name must contain at least 3 characters.</div>";
    }
    else if(!filter_var($email,FILTER_VALIDATE_EMAIL))
    {
        $msg3 = "<div class='error'>Enter valid Email.</div>";
    }
    else if(!exact_email($email,$con))
    {
        $msg3 = "<div class='error'>Enter registered Email.</div>";
    }
    else if(empty($dateb))
    {
        $msg4 = "<div class='error'>Please, Enter the Date.</div>";
    }
    else if(empty($dateg))
    {
        $msg5 = "<div class='error'>Please, Enter the Date.</div>";
    }
    else if(strlen($password)<4)
    {
        $msg6 = "<div class='error'>Password must contain at least 4 characters.</div>";
    }
    else if(!exact_password($password,$email,$con))
    {
        $msg6 = "<div class='error'>Enter registered Password.</div>";
    }
    else if($password != $c_password)
    {
        $msg7 = "<div class='error'>Password isn't same.</div>";
    }
    else if($image == '')
    {
        $msg8 = "<div class='error'>Please, upload your profile image.</div>";
    }
    else if($size_image >= 1000000)
    {
        $msg8 = "<div class='error'>Please, upload image less than 1 MB.</div>";
    }
    else if($checkbox == '')
    {
        $msg9 = "<div class='error'>Please, agree our terms and conditions.</div>";
    }
    else
    {
        $img_ext=explode(".", $image);
        $imgage_ext = $img_ext['1'];
        $image = rand(1,1000).rand(1,1000).time().".".$imgage_ext;

        if($imgage_ext=='jpg' || $imgage_ext=='png' || $imgage_ext=='JPG' || $imgage_ext=='PNG')
        {
        move_uploaded_file($tmp_image, "images/$image");    
        mysqli_query($con,"INSERT INTO studentsprofile(first_name,last_name,mail,password,phone,bgroup,series,dept,dob,dog,image) 
        VALUES ('$firstname','$lastname','$email','$password','$phone','$Bgrp','$series','$dept','$dateb','$dateg','$image')");
        $msg0 = "<div class = 'success'>Your Profile is Ready!!</div>";
        $firstname = ''; $lastname = ''; $email = ''; $password = ''; $c_password = ''; $phone = '';$Bgrp = '';$series = '';$dept = '';
        $dateb = '';$dateg = '';$image = '';$tmp_image = '';
        }
        else
        {
            $msg8 = "<div class='error'>Please, upload a image file.</div>";
        }
    }
}

?>
    
<html>
<head>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<title>Make Profile!</title>    
</head>
<style type="text/css">
#body-bg
{
    background-color: darkgreen;
}
.error
{
    color: red;
}
.success
{
    color:green;
    font-weight: bold;
}
</style>   
<body id="body-bg">
<div class="container">
    <div class="login-form col-md-5 offset-md-4">
        <div class="jumbotron" style="margin-top:20px;padding-top:20px">
            <h3 align='center'>Make your Profile!</h3> <br>
            <?php echo $msg0; ?>
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                <label>First Name :</label>
                <input type="text" name="fname" placeholder="Your First Name" class="form-control" value='<?php echo $firstname; ?>'>
                <?php echo $msg; ?>   
                </div>
                <div class="form-group">
                <label>Last Name :</label>
                <input type="text" name="lname" placeholder="Your Last Name" class="form-control" value='<?php echo $lastname; ?>'>
                <?php echo $msg2; ?>
                </div>
                <div class="form-group">
                <label>Email :</label>
                <input type="email" name="mail" placeholder="Your Email" class="form-control" value='<?php echo $email; ?>'>
                <?php echo $msg3; ?>
                </div>
                <div class="form-group">
                <label>Password :</label>
                <input type="password" name="pass" placeholder="Your Password" class="form-control" value='<?php echo $password; ?>'>
                <?php echo $msg6; ?>
                </div>
                <div class="form-group">
                <label>Re-enter Password :</label>
                <input type="password" name="cpass" placeholder="Confirm Your Password" class="form-control" value='<?php echo $c_password; ?>'>
                <?php echo $msg7; ?>
                </div>
                <div class="form-group">
                <label>Phone Number :</label>
                <input type="int" name="pnumber" placeholder="Your Phone Number" class="form-control" value='<?php echo $phone; ?>'>
                </div>
                <div class="form-group">
                <label>Blood Group :</label>
                <input type="text" name="blgrp" placeholder="Your Blood Group" class="form-control" value='<?php echo $Bgrp; ?>'>
                </div>
                <div class="form-group">
                <label>Series :</label>
                <input type="int" name="series" placeholder="Your Series" class="form-control" value='<?php echo $series; ?>'>
                </div>
                <div class="form-group">
                <label>Department :</label>
                <input type="text" name="dept" placeholder="Your Department" class="form-control" value='<?php echo $dept; ?>'>
                </div>
                <div class="form-group">
                <label>Date of Birth :</label>
                <input type="date" name="dob" placeholder="Your Date " class="form-control" value='<?php echo $dateb; ?>'>
                <?php echo $msg4; ?>
                </div>
                <div class="form-group"> 
                <label>Date of Graduation :</label> 
                <input type="date" name="dog" placeholder="Your Date" class="form-control" value='<?php echo $dateg; ?>'>
                <?php echo $msg5; ?>
                </div>
                
                <div class="form-group">
                <label>Profile Image :</label>
                <input type="file" name="image" value='<?php echo $image; ?>'>
                <?php echo $msg8; ?>
                </div> <br>
                <div class="form-group">
                <input type="checkbox" name="check">
                    I agree the terms &amp; conditions
                <?php echo $msg9; ?>
                </div> <br>
                <center><input type="submit" value="Submit" name="submit" class="btn btn-success" /></center>
            </form>
        </div>
    </div>  
</div>
</body>
</html> 