<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>


<?php
//include db
include_once './db/conn.php';

// prevent error for empty array
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email=$_POST["email"];
  $password=$_POST["password"]; 
}

$emailErr = $passwordErr = $register = $exists = "";

if (isset($_POST['submit'])) {

      //validate email
    if(empty($_POST['email'])) {
      $emailErr = "Email is necessary!";
    } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Wrong email format!";
    } 

    //validate password
    if(empty($_POST['password'])) {
      $passwordErr = "Password is necessary!";
    } else if (
      strlen($_POST['password']) < 8
    ) {
      $passwordErr = "Password must be 8 characters long!";
    }

      //check if email exists
      $sql="SELECT * FROM users WHERE email='$email';";
      $res=mysqli_query($conn,$sql);

    if (mysqli_num_rows($res) > 0) {
      $row = mysqli_fetch_assoc($res);
    if($email==isset($row['email'])) {
      $exists = "Email already exists!";
    } else {
        
      $stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (?,?) ");
      $stmt->bind_param("ss", $email, $hashed);

      // setojam parametrus
      $password = $_POST['password'];
      $email = $_POST['email'];
      $hashed = password_hash($password, PASSWORD_DEFAULT);
    
      $stmt ->execute();

      $register = "Registration successful!";

      $stmt->close();
      $conn->close();

    }
    }
}
?>

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
    <div class="box" >
        <h1 class="headingIndex">Please Register</h1>
        <form action="" method="POST">
            <div class="content">
                <input type="text" placeholder="Email" name="email" class="inputStyle"><br><br>
                <span class='error'><?php echo $emailErr ?></span>
                <input type="password" placeholder="Password" name="password" class="inputStyle"><br><br>
                <span class='error'><?php echo $passwordErr ?></span>
                <input type="submit" value="submit" name="submit" class="submitBtn">
                <span class='register'><?php echo $register, $exists ?></span>
            </div>
            <div class="choseOne">
                <button onclick="location.href='index.php'" type="button" class="switchBtn" >Log in</button>
                <button  type="button" class="switchBtn">Register</button>
            </div>
        </form>
    </div>
</body>
</html>