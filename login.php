<?php
//include db
include_once './db/conn.php';

if(isset($_POST['email']) && isset($_POST['password'])) {

    // check if not empty
    if(!empty(trim($_POST['email'])) && !empty(trim($_POST['password']))) {

        // check if no special characters
        $email = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['email'])));
        $query = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email'");

        if(mysqli_num_rows($query) > 0) {

            $row = mysqli_fetch_assoc($query);
            $user_db_pass = $row['password'];

            // verify password
            $check_password = password_verify($_POST['password'], $user_db_pass);

            if($check_password === TRUE) {

                session_regenerate_id(true);
                
                session_start();
                $_SESSION['email'] = $email;  
                header('Location: home.php');
                exit;

            } else {
                // incorrect password
                $error_message = "Wrong email or password!";
            }
        }
    } else {

    // fields are empty
    $error_message = "Please fill in all the required fields!";
    }
}
?>