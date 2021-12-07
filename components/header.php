<?php
session_start();

//logout button
if (isset($_POST["submit"])) {
    session_unset();   
    session_destroy();  
  
    header("location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MYWISHLIST</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
</head>
<body>

<nav class="sticky">
        <div class ="logo-section">
            <p class="logo">MYWISHLIST</p>
        </div>
            
        <div class ="link-section">
            <a href="home.php" class="linkdec">HOME</a>
            <a href="list.php" class="linkdec">WISH LIST</a>
            <a href="profile.php" class="linkdec">PROFILE</a>
                <form action="" method="POST">
                    <input type="submit" value="LOGOUT" name="submit" class="logout">
                </form>
        </div>

        <div class="hamburger">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>    
</nav>
