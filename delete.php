<?php 
include 'connect.php';

// URL パラメータを取得
if (isset($_GET['id'])) {
  $id = $_GET['id'];

  // id と一致するデータを削除
  $sql = "DELETE FROM `crudTable` WHERE id = $id";

  $result = mysqli_query($con, $sql);

  if ($result) {
    echo "Data deleted successfully";
    header('location:display.php');
  } else {
    echo "Data not deleted" .
      die(mysqli_error($con));
  }
  
}