<?php 
  session_start(); 
  require_once('mysql.php');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Kids</title>
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
</head>
<body>
  <nav class="pink">
    <div class="nav-wrapper">
      <div class="row">
        <div class="col s3">
          <a href="#" class="brand-logo">I got kids</a>
          <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="./index.php">Home</a></li>
            <li><a href="./new.php">New</a></li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <div class="container">
  
