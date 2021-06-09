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
  <title>Cart</title>
</head>
<?php session_start(); ?>
<body>
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
        echo "<script>window.location.href='signin.php'</script>";
      }
        ?>
    </div>
  </div>
</nav>
    <?php
    include 'config.php';
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $result = $con->query("SELECT * FROM song,genremusic,singer where SongID='$id' and song.GenreID=genremusic.GenreID and song.SingerId=singer.SingerID");
        $product = $result->fetch_array();
        $item = [
            'id' => $product['SongID'],
            'name' => $product['SongName'],
            'price' => $product['Price'],
            'image' => $product['SongImg'],
            'Genre'=>$product['GenreName'],
            'Singer'=>$product['SingerName'],
            'Mpmusic'=>$product['Mp3'],
        ];
        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['thishere']="<3";
        } else {
            $_SESSION['cart'][$id] = $item;
        }
    }
    $cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];
    ?>
    <div class="container">
        <div class="row">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Song Name</th>
                            <th>Price</th>
                            <th>Singer</th>
                            <th>Genre</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sum=0;
                        foreach ($cart as $key => $value) {
                           $value1=$value['name'];
                           $value2=$value['price'];
                           $value3=$value['image'];
                           $value4=$value['Genre'];
                           $value5=$value['Singer'];
                           $idsong=$value['id'];
                            echo "<tr>";
                            echo "<td>$value1</td><td>$value2</td><td>$value5</td><td>$value4</td><td><img style='height:70px;width:120px' src='$value3' /></td><td><a href='delete.php?xoa=$idsong' class='btn btn-primary'>Delete</a></td>";
                            echo "</tr>";
                            $sum+=$value2;
                            if (isset($_POST['submit'])) {
                                echo("<script>window.location.href='download.php'</script>");
                          }
                        } ?>
                    </tbody>

                </table>
            </div>

            <div class="col-lg-12">
                <form action="download.php" method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Your name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Delivery address</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Bank payment</label>
                        <select class="form-select" aria-label="Default select example">
                        <option selected>TechComBank</option>
                        <option value="1">BIDV</option>
                        <option value="2">TPBank</option>
                        <option value="3">HonDaBank</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Sum :<?php echo($sum); ?> </label>
                    </div>
                    <input class='btn btn-primary form-control' type="submit" value="Pay" name="submit">
                </form>
            </div>
        </div>
    </div>
    <?php
   

    ?>
</body>

</html>