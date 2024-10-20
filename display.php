<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crud Display Page</title>
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

  <!-- Original Minified CSS -->
  <link rel="stylesheet" href="./build/css/main.css">
</head>

<body>

  <div class="container">
    <button class="btn btn-primary my-4">
      <a href="user.php">
        Add User Page
      </a>
    </button>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">Serial No</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Mobile</th>
          <th scope="col">Password</th>
          <th scope="col">Operations</th>
        </tr>
      </thead>

      <tbody>

        <?php
        $sql = "select * from `crudTable`";
        $result = mysqli_query($con, $sql);
        if ($result) {
          while ($row = mysqli_fetch_assoc($result)) {
            // extract each row
            $id = $row['id'];
            $name = $row['name'];
            $email = $row['email'];
            $mobile = $row['mobile'];
            $password = $row['password'];
        ?>
            <!-- UPDATE & DELETE -->
            <tr>
              <th scope="row"><?php echo $id; ?></th>
              <td><?php echo htmlspecialchars($name); ?></td>
              <td><?php echo htmlspecialchars($email); ?></td>
              <td><?php echo htmlspecialchars($mobile); ?></td>
              <td><?php echo htmlspecialchars($password); ?></td>
              <td>
                <button class="btn btn-primary">
                  <a href="update.php?id=<?php echo $id; ?>" class="text-light">UPDATE</a>
                </button>
                <button class="btn btn-danger">
                  <a href="delete.php?id=<?php echo $id; ?>" class="text-light">DELETE</a>
                </button>
              </td>
            </tr>
        <?php
          }
        }
        ?>

      </tbody>
    </table>
  </div>
</body>

</html>