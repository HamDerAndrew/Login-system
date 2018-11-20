<?php session_start(); ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="Assets/css/myStyle.css"> 
    <title>X Firma</title>
  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <a href="index.php"><img src="Assets/img/XCompany.png" class="logo nav-logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link text-white" href="/Ordbogen//index.php">Hjem</a>
            </li>
            <?php 
            if(!isset($_SESSION['u_email'])) {
              echo '<li class="nav-item">
                      <a class="nav-link text-white" href="/Ordbogen/signup.php">Min Konto</a>
                    </li>';
                  }
            ?>
            <?php 
            if(isset($_SESSION['u_email'])) {
              echo '<li class="nav-item active">
                      <a href="loggedin.php" class="nav-link text-white">Dashboard</a>
                    </li>
                    <form action="logout.php" method="POST"> 
                      <button class="btn btn-primary" type="submit" name="submit">Log ud</button>
                    </form>';
              }
            ?>
          </ul>
        </div>
      </nav>
    </header>
    