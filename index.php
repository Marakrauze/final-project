<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>

<!-- //login  -->
<?php include 'login.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <title>My Wish List</title>
</head>
<body>
    <video playsinline autoplay muted loop poster="" id="bgvid" class="fade-in">
        <source src="video.mp4" type="video/mp4">
      </video>
    <div class="box">
        <h1 class="headingIndex">Please log in</h1>
        <form action="" method="POST">
            <div class="content">
                <input type="text" placeholder="Email" name="email" class="inputStyle"><br><br>
                <input type="password" placeholder="Password" name="password" class="inputStyle"><br><br>
                <input type="submit" value="submit" name="submit" class="submitBtn">
                <span class='register'><?php if(isset($error_message)){ echo $error_message; }?></span>
            </div>
            <div class="choseOne">
                <button  type="button" class="switchBtn" >Log in</button>
                <button  onclick="location.href='register.php'" type="button" class="switchBtn">Register</button>
            </div>
        </form>
    </div>
</body>
</html>