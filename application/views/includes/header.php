<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?php echo base_url();?>">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="./products?category_id=0">Products</a>
        </li>
        <?php if(!isset($_SESSION['data_session'])): ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            User
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="   <?php echo base_url();?>login">Sign In</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="<?php echo base_url();?>register">Sign Up</a></li>
          </ul>
        </li>
        <?php else: ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Hello <?php $arr=$_SESSION['data_session']; echo $arr["username"];?>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?php echo base_url();?>userhome">My Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="<?php echo base_url();?>logout">Sign out</a></li>
          </ul>
        </li>
        <?php endif ?>
      </ul>
      <form class="d-flex" action="./search" method="get">
        <input class="form-control me-2" type="text" name="search" id="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      <div class="col-md-5" style="position: relative;margin-top: -38px;margin-left: 215px;">
        <ul class="list-group" id="show-list">
          
        </ul>
    </div>
  </div>
</nav>
<div class="container">
    <div class="row">
        <div class="col">
        <div class="container">
          <h5>Categories:</h5>
             <div class="btn-group-vertical w-50" id="sidenav" role="group" aria-label="Vertical button group">
                <a href="./products?category_id=0"type="button" class="btn btn-outline-primary ">All</a>
                <a href="./products?category_id=1"type="button" class="btn btn-outline-primary ">Electronics</a>
                <a href="./products?category_id=2"type="button" class="btn btn-outline-primary ">Books</a>
                <a href="./products?category_id=3"type="button" class="btn btn-outline-primary ">Clothing</a>
                <a href="./products?category_id=4"type="button" class="btn btn-outline-primary ">Furniture</a>
                <a href="./products?category_id=5"type="button" class="btn btn-outline-primary ">Toys</a>
            </div>
        </div>
        </div>
        <div class="col">
  