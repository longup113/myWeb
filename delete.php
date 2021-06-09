<?php
session_start();
if(isset($_GET['xoa'])){
    $id=$_GET['xoa'];
    unset($_SESSION['cart'][$id]);
    echo "<script>window.location.href='cart.php'</script>";
}
else{
    session_destroy();
    echo "<script>window.location.href='index.php'</script>";
}

?>