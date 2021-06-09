<!DOCTYPE html>
<html lang="en">

<head>
  <script data-ad-client="ca-pub-4802060218454967" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
  <meta charset="UTF-8">
  <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  <title>Home Page</title>
</head>
<?php session_start(); ?>
<nav class="navbar navbar-expand-lg navbar-light bg-primary sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">WEB</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home Page</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://www.facebook.com/h18620010">Contact For Us</a>
        </li>
        <?php if(isset($_SESSION['admin'])){echo("<li class='nav-item'>
          <a class='nav-link' href='qlsong.php' tabindex='-1'>Manage songs</a>
        </li>");} ?>

        <?php  if(isset($_SESSION['admin']) or isset($_SESSION['user'])){echo("<li class='nav-item'>
          <a class='nav-link' href='cart.php'><i class='fas fa-shopping-cart'></i></a>
        </li>");}  ?>
        
      </ul>
      <form action="search.php" method="POST" class="d-flex">
        <input name="input" required class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button name="search" class="btn btn-outline-danger" type="submit">Search</button>
      </form>
      <?php
      if(isset($_SESSION['user']) or isset($_SESSION['admin']))
      {
          echo "<a style='margin-left: 1%;'  href='delete.php' class='btn btn-warning btn-outline-success'>LogOut</a>";
      }
      else{
        echo "<a style='margin-left: 1%;'  href='signin.php' class='btn btn-warning btn-outline-success'>LogIn</a>";
      }
        ?>
    </div>
  </div>
</nav>
<div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="10000">
      <img src="https://o.vdoc.vn/data/image/2021/03/17/loi-bai-hat-sao-cha-khong-phan-manh-quynh-700.jpg" style="height:600px" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="https://i.ytimg.com/vi/jGdMu2KoeAM/maxresdefault.jpg" style="height:600px" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://i.ytimg.com/vi/ewFmBXXVKG8/maxresdefault.jpg" class="d-block w-100" alt="..." style="height:600px">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <h3 style="color:blue">I. List Song</h3>
      <div class="row row-cols-1 row-cols-md-4 g-4">
      <?php
        include_once("config.php");
        $result=mysqli_query($con,"select * from song order by SongID DESC");
        while ($row = mysqli_fetch_array($result)) {
          echo "<div class='card border-success mb-3' style='max-width: 50%;'>
                      <div class='card-header bg-transparent border-success'>".$row['SongName']."</div>
                      <div class='card-body text-success'>
                          <p class='card-text'><img src='".$row['SongImg']."' class='img-fluid rounded' style='height:13rem;width:100%' /></p>
                      </div>
                      <div class='card-footer bg-transparent border-success'>
                      <a class='btn btn-warning' href='detail.php?id=".$row['SongID']."'>Listening</a>
                      <a class='btn btn-primary' href='cart.php?id=".$row['SongID']."'>Add Cart</a>
                      </div>
                      </div>
                      ";
                  }
        
        ?>
      </div>
    </div>
  </div>
</div>

</body>

</html>