<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>

<?php
  if(!empty($user)){
    ?>
      <script type="text/javascript">
          window.location.href ="?p=home";
      </script>
    <?php
  }
?>

    <!-- css -->
    <style>
        body {
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #eee;
}

.form-signin {
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
  margin-bottom: 10px;
}
.form-signin .checkbox {
  font-weight: normal;
}
.form-signin .form-control {
  position: relative;
  height: auto;
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}

    </style>
</head>
<body>
<form class="form-signin" method="post" action="">
        <h2 class="form-signin-heading">Silahkan login</h2>
        <label for="inputUsername" class="sr-only">Username</label>
        <input type="text" id="inputUsername" name="username" class="form-control" placeholder="Username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="masuk">Masuk</button>
</form>
</body>
</html>

<?php
  if(isset($_POST['masuk'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM petugas WHERE username = '$username'";
    $query = mysqli_query($koneksi, $sql);
    $cek = mysqli_num_rows($query);
    
    if($cek > 0 ){
      $data = mysqli_fetch_array($query);
      $password = $password;
      $pass_db = $data['password'];

      if($password == $pass_db){
        $_SESSION['username'] = $username;
        $_SESSION['level'] = $data['id_level'];
        ?>
        <script type="text/javascript">
          window.location.href="?p=home";
        </script>
        <?php
      }else {
        ?>
      <div class="alert alert-warning alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>Maaf!</strong> Maaf, Password yang anda masukkan salah!
      </div>
      <?php
      }

    }else{
      ?>
      <div class="alert alert-warning alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>Gagal!</strong> Maaf, Username atau Password yang anda masukkan salah!
      </div>
      <?php
    }
  }
?>