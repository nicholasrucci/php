<?php require_once('../includes/header.php'); ?>

<?php 
  if (isset($_POST['submit'])) {
    // get values from $_POST
    $first_name     = $_POST['first_name'];
    $last_name      = $_POST['last_name'];
    $email          = $_POST['email'];
    $password       = $_POST['password'];

    $sql = "INSERT INTO users (first_name, last_name, email, encrypted_password) VALUES (
    '$first_name', 
    '$last_name', 
    '$email', 
    '$password'
    )";
    
    mysqli_query($mysql_connection, $sql);
    
  } else {
    // redirect if not POST
    header('Location: new.php');
  }
    // insert into the table
?>

<div class="row">
  <div class="card col s6 push-s3">
    <div class="card-content">
      <span class="card-title"><?= $first_name ?> signed up</span>
      <div class="card-content">
        <p>
          <strong>First Name:</strong>
          <?= $first_name ?>
        </p>
        <p>
          <strong>Last Name:</strong>
          <?= $last_name ?>
        </p>
        <p>
          <strong>Email:</strong>
          <?= $email ?>
        </p>
        <div class="card-action">
          <a class="waves-effect btn blue accent-1" href="index.php">Back to home page</a>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once('../includes/footer.php'); ?>