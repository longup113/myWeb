<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <title>QL SOng</title>
</head>
<?php session_start(); ?>
<body class="bg-secondary">
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
            <table class="table table-responsive">
                              <tr>
                                <th>Song Name</th>
                                <th>Lyric</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th colspan="2">Action</th>
                              </tr>
                              <?php
                              include_once("config.php");
                                $result=mysqli_query($con,"Select * from song");
                                while($row=mysqli_fetch_array($result)){
                                  $id=$row['SongID'];
                                  echo "<tr>";
                                  echo "<td>".$row['SongName']."</td>"."<td><p>"
                                  .$row['SongLyric']."</p></td>"."<td>"."<img style='height:40px;width:50px' src='./"
                                  .$row['SongImg']."'/></td>"."<td>"
                                  .$row['Price']."</td>"."<td><a class='btn btn-success' href=song.php?update=".$id.">Add/Update</a></td>"."<td><a class='btn btn-danger' href='song.php?delete=".$id."'>Delete</a></td>";
                                  echo "</tr>";
                                }
                              ?>
                        </table>
            </div>
        </div>
    </div>
</body>
</html>