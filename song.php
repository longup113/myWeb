<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <title>Update Song</title>
</head>
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
<body class="bg-light">
<div class="container">
<?php
    include("./config.php");
    if(isset($_GET['update'])){
        $id1=$_GET['update'];
        $query=mysqli_query($con,"Select * from song where songID=$id1");
        $row=mysqli_fetch_array($query);
        $SongName=$row['SongName'];
        $Price=$row['Price'];
        $Description=$row['SongLyric'];
        $anh=$row['SongImg'];
        $Mpmusic=$row['Mp3']; 
    }
    if(isset($_GET['delete'])){
        $id2=$_GET['delete'];
        $result2=mysqli_query($con,"DELETE FROM `song` WHERE SongID='$id2'");
        header("location:qlsong.php");
        
    }
?>
    <div class="row">
        <div class="col-lg-12">
            <form enctype="multipart/form-data" action="#" method="post">
            <div class="mb-3">
                <label for="a" class="form-label">Song Name</label>
                <input name="a1" type="text" value="<?php echo($SongName); ?>" class="form-control" id="a" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="ba" class="form-label">Lyric</label>
                <input name="a2" value="<?php echo($Description) ?>" type="text" class="form-control" id="ba">
            </div>
            <div class="mb-3">
                <label for="s" class="form-label">Price</label>
                <input name="a3" value="<?php echo($Price) ?>" type="text" class="form-control" id="s">
            </div>
            <div class="mb-3">
                <label for="c" class="form-label">Img</label>
                <input value="<?php echo($anh) ?>" type="file" name="filetoUploadIMG" class="form-control" id="c">
            </div>
            <div class="mb-3">
                <label for="fileToUpload" class="form-label">MP3 File </label>
                <input type="file" name="fileToUploadmp3" id="fileToUpload" class="form-control">
            </div>
            <div class="mb-3">
            <div class="form-group">
                <label for="category">Genre </label>
                <select name="category" class="form-select" aria-label="Default select example">
                    <?php 
                        $result=$con->query("select * from genremusic");
                        while($row=$result->fetch_array()){
                            $GenreID=$row["GenreID"];
                            $GenreName=$row["GenreName"];
                            echo "<option value='$GenreID'>$GenreName</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="category">Singer name </label>
                <select name="category" class="form-select" aria-label="Default select example">
                    <?php 
                        $result=$con->query("select * from singer");
                        while($row=$result->fetch_array()){
                            $SingerID=$row["SingerID"];
                            $SingerName=$row["SingerName"];
                            echo "<option value='$SingerID'>$SingerName</option>";
                        }
                    ?>
                </select>
            </div>
            </div>
            <button name="updatesong" type="submit" class="btn btn-primary">Update</button>
            <button name="insertsong" type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
      $a1=$_POST['a1'];
      $a2=$_POST['a2'];
      $a3=$_POST['a3'];
      // get img
      $product_image=$_FILES['filetoUploadIMG']['name'];
      $product_Mp3=$_FILES['fileToUploadmp3']['name'];
      $target="../img/".basename($product_image);
      $resulttarget="img/".basename($product_image);
      $target2="../MP3/".basename($product_Mp3);
      $resulttarget2="MP3/".basename($product_Mp3);
      if(isset($_POST['updatesong'])){
        if(file_exists($target)){
          echo "sr";
        }
        else{
          move_uploaded_file($_FILES['filetoUploadIMG']['tmp_name'],$target);
        }
        move_uploaded_file($_FILES['fileToUploadmp3']['tmp_name'],$target2);
        $result=mysqli_query($con,"UPDATE `song` SET `SongName`='$a1',`SongImg`='$resulttarget',`SongLyric`='$a2',`Price`='$a3',`Mp3`='$resulttarget2',`SingerID`='$SingerID',`GenreID`='$GenreID' WHERE SongID= $id1");
        if($result){
          echo "<script>window.location.href='qlsong.php'</script>";
        }
        
      }
      if(isset($_POST['insertsong'])){
        if(!file_exists($target)){
          move_uploaded_file($_FILES['filetoUploadIMG']['tmp_name'],$target);
        }
        move_uploaded_file($_FILES['fileToUploadmp3']['tmp_name'],$target2);
        $result=mysqli_query($con,"INSERT INTO `song`(`SongName`, `SongImg`, `SongLyric`, `Price`, `Mp3`, `SingerID`, `GenreID`) VALUES ('$a1','$resulttarget','$a2','$a3','$resulttarget2','$SingerID','$GenreID')");
        if($result){
          echo "<script>window.location.href='qlsong.php'</script>";
        }
      }
    }
    
    
    ?>
</div>
</body>
</html>