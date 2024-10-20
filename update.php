<?php
include 'connect.php';

// URL パラメータを取得
$id = $_GET['id'];

// Update したいデータを取得
$sql = "SELECT * FROM `crudTable` WHERE id = $id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$email = $row['email'];
$mobile = $row['mobile'];
$password = $row['password'];


if (isset($_POST['submit'])) {
  // 入力のエスケープ処理
  $name = mysqli_real_escape_string($con, $_POST['name']); // mysqli_real_escape_string で SQL インジェクション対策
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // PASSWORD_DEFAULT でハッシュ化

  // SQL文を作成
  $sql = "UPDATE `crudTable` SET name = '$name', email = '$email', mobile = '$mobile', password = '$password' WHERE id = $id"; // URLの id に一致するデータを更新

  // クエリ実行
  $result = mysqli_query($con, $sql);

  if ($result) {
    echo "Data UPDATED successfully";
    // リダイレクト
    header('location:display.php');
  } else {
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

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

  <!-- Original Minified CSS -->
  <link rel="stylesheet" href="./build/css/main.css">

</head>

<body>
  <div class="container my-5">

  <!-- Populate the data from DB -->
    <form method="post">
      <!-- Name -->
      <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" class="form-control" placeholder="Enter your name" name="name" autocomplete="off"
          value="<?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?>">

      </div>

      <!-- Email -->
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" placeholder="Enter your email" name="email" autocomplete="off"
        value="<?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?>"
        >
      </div>

      <!-- Mobile Number -->
      <div class="mb-3">
        <label class="form-label">Mobile Number</label>
        <input type="text" class="form-control" placeholder="Enter your mobile number" name="mobile" autocomplete="off"
        value="<?php echo htmlspecialchars($mobile, ENT_QUOTES, 'UTF-8'); ?>"
        >
      </div>

      <!-- Password -->
      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" class="form-control" placeholder="Enter your password" name="password" autocomplete="off"
        value="<?php echo htmlspecialchars($password, ENT_QUOTES, 'UTF-8'); ?>"
        >
      </div>

      <button name="submit" type="submit" class="btn btn-primary">UPDATE</button>
    </form>

  </div>

  <!-- original JS -->
  <script src="./build/js/main.js"></script>
</body>

</html>