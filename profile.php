<style>
body{
  width: 100vw;
  height: 100vh;
  background: linear-gradient(to bottom, cornflowerblue 0%, #8537c5 100%);
}

h2{
    color: gray;
    font-size: 25px;
    font-weight: bold;
}

input[type=text]{
    padding: 8px;
    margin: 5px;
    background-color: white;
    border: 0;
    border-radius: 9px;
    box-shadow:0 0 6px 3px rgb(187, 187, 187);
}

.hello {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 30px;
    color: navy;
}
</style>

<?php 
include './components/header.php';

//include login
include 'login.php';

//login user session
$loginUsername = $_SESSION['email'];
?>

    <div class="wrapperProfile flexCenter">
        <div class="inputFields flexCenter">
        <h2>Welcome to your Profile.</h2>
            <h2> You are logged in with email: <?php $loginUsername = $_SESSION['email']; echo $loginUsername; ?></h2><br>
            <h4 id='change' style="display:none" class='hello'></h4>
                <form action="" method="POST" enctype="multipart/form-data" id="hide" onsubmit="return myFunction()">
                    <h4>Whats your name?</h4>
                    <input type="text" placeholder="Name" id="name"><br>
                    <input type="text" placeholder="Surname" id="surname"><br><br>
                    <input type="submit" value="SUBMIT" class="btn" name="submitData" onClick="myFunction()">
                </form>
                
                
                <script>
                    const hide = document.getElementById('hide');
                    const change = document.getElementById('change');

                    function myFunction() {

                    if (change.style.display === "none") {
                        const nameValue = document.getElementById("name").value;
                        const surnameValue = document.getElementById("surname").value;
                        change.innerHTML = `Hello ${nameValue} ${surnameValue} `;
                        change.style.display = "block";
                        
                    }
                        hide.style.visibility = "hidden";
                        return false;
                    }
                    
        

                </script>
              
        </div>
    </div>
</body>
</html>