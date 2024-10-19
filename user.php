<?php
include 'connect.php';

if (isset($_POST['submit'])) {
 echo "Form submitted";
}

if (isset($_POST['submit'])) {
  // 入力のエスケープ処理
  $name = mysqli_real_escape_string($con, $_POST['name']); // mysqli_real_escape_string で SQL インジェクション対策
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // PASSWORD_DEFAULT でハッシュ化

  // SQL文を作成
  $sql = "INSERT INTO crudTable (name, email, mobile, password) VALUES ('$name', '$email', '$mobile', '$password')";

  // クエリ実行
  $result = mysqli_query($con, $sql);

  if ($result) {
    echo "Data inserted successfully";
    // リダイレクト
    // header('location:read.php');
  } else {
    echo "Data not inserted" .
    die(mysqli_error($con));
  }
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CRUD Operation</title>
  <link rel="stylesheet" href="style.css">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
  <div class="container my-5">

    <form method="post">
      <!-- Name -->
      <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" class="form-control" placeholder="Enter your name" name="name" autocomplete="off">
      </div>

      <!-- Email -->
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" placeholder="Enter your email" name="email" autocomplete="off">
      </div>

      <!-- Mobile Number -->
      <div class="mb-3">
        <label class="form-label">Mobile Number</label>
        <input type="text" class="form-control" placeholder="Enter your mobile number" name="mobile" autocomplete="off">
      </div>

      <!-- Password -->
      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" class="form-control" placeholder="Enter your password" name="password" autocomplete="off">
      </div>

      <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    </form>

  </div>
</body>

</html>