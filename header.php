<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>BuySell</title>
    <!-- Bootstrap CSS-->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="signin.css" rel="stylesheet">
    <link href="main.css" rel="stylesheet">

</head>

<body>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand logo"  href="index.php">BuySell</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="view_items.php">View Items<span class="sr-only">(current)</span></a>
          </li>
            <li class="nav-item active">
            <a class="nav-link" href="index.php">Sold Items</a>
                </li>
                <li class="nav-item active" style="background-color:#B22222;font-weight:bold;">
            <a class="nav-link" href="https://github.com/jagtarkhinda/eCommercePhp">GitHub Code</a>
                </li>
<!--
          <li class="nav-item">
            <a class="nav-link" href="view_items.php">View Items</a>
          </li>
-->

          <li class="nav-item active">
                <?php
                if(isset($_SESSION["id"]))
                   {
                      echo '<a class="nav-link" href="admin_panel.php">Admin Panel</a>';
                        echo '<li class="nav-item active">';
                        echo '<a class="nav-link" href="log_out.php">Log Out</a>';
                        echo '</li>';
                   }
                   else{
                        echo '<a class="nav-link" href="login.php">Log In</a>';
                        echo '<li class="nav-item active">';
                        echo '<a class="nav-link" href="signup.php">Register</a>';
                        echo '</li>';
                   }
                ?>
            </a>
          </li>
        </ul>
      </div>
    </nav>
