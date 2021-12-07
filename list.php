<style>
body{
  width: 100vw;
  height: 100vh;
  background: linear-gradient(to bottom, cornflowerblue 0%, #8537c5 100%);
}
</style>

<?php

//include header
include './components/header.php';

//include login
include 'login.php';

//login user session
$loginUsername = $_SESSION['email'];

//include db
include_once './db/conn.php';

$errors = "";

//add task
if(isset($_POST['add'])) {
   if (empty($_POST['task'])) {
     $errors = "Please fill the task!";
   } else {
     $loginUsername = $_SESSION['email'];
     $task = $_POST['task'];
     $sql = "INSERT INTO todo (user_id, task) VALUES ('$loginUsername','$task') ";
     mysqli_query($conn, $sql);
     header('location: list.php');

   }
}

//delete task
if (isset($_GET['del'])) {
	$id = $_GET['del'];

	mysqli_query($conn, "DELETE FROM todo WHERE id='$id'");
	header('location: list.php');
}

//edit task
$update = "";
$todos ="";

if (isset($_GET['edit'])) {
  $id = $_GET['edit'];
  $update = true;
  $record = mysqli_query($conn, "SELECT * FROM todo WHERE id=$id");

  if (count(array($record)) == 1 ) {
    $n = mysqli_fetch_array($record);
    $todos = $n['task'];
    
  }
}

//update task
if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$task = $_POST['task'];

	mysqli_query($conn, "UPDATE todo SET task='$task' WHERE id=$id"); 
	header('location: list.php');
}

//delete all button
if (isset($_POST['clear'])) {

	mysqli_query($conn, "DELETE FROM todo WHERE user_id='$loginUsername'");
	header('location: list.php');
}
?>

<div class="wrapper flexCenter">
<div class="list flexCenter">
    <h3>My wish list</h3>
      <div class="listHeader">
        <form action="" method="POST">
          <input type="text" class="inputStyleList" placeholder="Add your Wish" name="task" value="<?php echo $todos; ?>">
          <input type="hidden" name="id" value="<?php echo $id; ?>"><br><br>
          <?php if ($update == true): ?>
          <input class="btnList" type="submit" name="update" style="background: rgb(226, 31, 31);" value="SAVE"></input>
          <?php else: ?>
          <input class="btnList" type="submit" name="add" Value="ADD" ></input>
          <?php endif ?>
        <form>
      </div>
      <span class='error'><?php echo $errors ?></span> 

      <table class="table">
          <tbody>
            <?php 
            // select all tasks if page is visited or refreshed
            $tasks = mysqli_query($conn, "SELECT * FROM todo WHERE user_id='$loginUsername'");
            $i = 1; while ($row = mysqli_fetch_array($tasks)) { ?>

            <tr>
                <td> <?php echo $i; ?> </td>
                <td class="task"> <?php echo $row['task']; ?> </td>

                <td class="delete"> 
                  <a href="list.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
                </td>

                <td class="edit">
                  <a href="list.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
                </td>
              </tr>
            <?php $i++;}?>	
          </tbody>
        </table>
          <input class="btnList" type="submit" name="clear" Value="CLEAR ALL" href="list.php?del=<?php echo $row['id']; ?>" ></input>
      </div>
</div>
</div>
 
</body>
</html>