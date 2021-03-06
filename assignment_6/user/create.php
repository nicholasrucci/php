<?php require_once('../includes/header.php'); ?>

<?php
  if (isset($_POST['submit'])) {
    // get values from $_POST
    $first_name       = mysqli_real_escape_string($mysql_connection, $_POST['first_name']);
    $last_name        = mysqli_real_escape_string($mysql_connection, $_POST['last_name']);
    $email            = mysqli_real_escape_string($mysql_connection, $_POST['email']);
    $password         = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    $errors = [];

    if (empty($email)) {
      $errors['email'] = "Please enter your email";
    }
    if (empty($password)) {
      $errors['password'] = "Please enter a password";
    }
    if (empty($confirm_password)) {
      $errors['confirm_password'] = "Please confirm your password";
    }
    if ($password != $confirm_password) {
      $errors['confirm_password'] = "Password and confirmation do not match";
      $password = '';
      $confirm_password = '';
    }

    if (empty($errors)) {
      print_r($errors);
      $encrypted_password = password_hash($password, PASSWORD_DEFAULT);

      insert into the table
      $sql = "INSERT INTO users (first_name, last_name, email, encrypted_password) VALUES (
      '$first_name',
      '$last_name',
      '$email',
      '$encrypted_password'
      )";

      mysqli_query($mysql_connection, $sql);
      $mysql_error = mysqli_error($mysql_connection);

      $userSql = "SELECT * FROM users WHERE email = '$email'";
      $result = mysqli_query($mysql_connection, $userSql);
      $row = mysqli_fetch_array($result);
      if ($row) {
          $_SESSION['user_id'] = $row['id'];
      } else {
        header('Location: ../user/new.php');
      }
    }

  }
?>

<?php if (empty($errors)): ?>

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
            <a class="waves-effect btn blue accent-1" href="../kids/index.php">Back to home page</a>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php else: ?>

  <!-- I couldn't get the line of code, require_once('new.php') to work so I included all of the code from new.php -->
  <div class="row">
    <div class="col s6 push-s3">
      <h1>User Sign Up</h1>
      <?php if (isset($errors)): ?>
        <p>The following errors occurred:</p>
        <ul>
        <?php foreach ($errors as $field => $error): ?>
         <li><?= $error ?></li>
        <?php endforeach ?>
        </ul>
      <?php endif ?>
    </div>
  </div>
  <div class="row">
    <div class="card col s6 push-s3">
      <div class="card-content">
        <span class="card-title">Fill it out stat</span>
        <form method="post" action="create.php">
          <div class="input-field">
            First name:
            <input type="text" name="first_name" value="<?= strIfSet($first_name) ?>">
          </div>
          <div class="input-field">
            Last name:
            <input type="text" name="last_name" value="<?= strIfSet($last_name) ?>">
          </div>
          <div class="input-field">
            Email:
            <input type="email" name="email" value="<?= strIfSet($email) ?>">
          </div>
          <div class="input-field">
            Password:
            <input type="password" name="password">
          </div>
          <div class="input-field">
            Confirm Password:
            <input type="password" name="confirm_password">
          </div>
          <div class="card-action">
            <button class="waves-effect btn teal accent-2" type="submit" name="submit">
              <span class="pink-text">Sign up</span>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

<?php endif ?>

<?php require_once('../includes/footer.php'); ?>
