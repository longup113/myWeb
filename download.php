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
  <title>Dowload</title>
</head>
<body class="bg-light" style="background-image: url('https://i.pinimg.com/originals/57/69/35/5769359798035d6223338a3d7270b487.jpg');background-repeat:no-repeat;background-size:cover">
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
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <style>
                    .down:hover{
                        cursor: pointer;
                    }
                </style>
                <p>Danh sách các bài hát đã mua :</p>
                <table class="table">
                    <tr>
                        <th colspan="2">Tên Bài hát and link</th>
                    </tr>
                    <tr>
                    <?php
                        $cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];
                        foreach($cart as $key => $value){
                            $src=$value['Mpmusic'];
                            $name=$value['name'];
                            echo "<td class='bg-light border'>'$name' :<a href='$src' class='down' download='mp3'>Download</a></td>";
                        }
                        ?>
                    </tr>
                       
                </table>
            </div>
        </div>
    </div>
</body>
</html>