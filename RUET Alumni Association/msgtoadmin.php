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

#main{

background-color: #D5F5E3 ;
width: 100%;
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
        <div id="main">
            <h3>All Messages</h3>
            <hr color="darkred">
            <?php
                $read = fopen("mestoadmin.txt", "r+t");
                echo "All Messages : <br>";

                while(!feof($read)){
                    echo fread($read , 1024);
                }
                fclose($read);
            ?>
        </div>
    </div>
    <div id="footer">
        copyright &copy; 2019 ruet
    </div>

</div>

</body>
</html>