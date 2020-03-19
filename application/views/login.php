<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<body class="hold-transition login-page" id="login">

  <?php
    if (isset($_GET['pesan'])){
     $pesan = $_GET['pesan'];
        if($pesan='false') {
        ?>
        <br>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <marquee><strong>Username atau Password Salah</strong></marquee>
        </div>
      <?php }
    }
  ?>
  <!-- <div class="col-md-4"> -->
    <!-- general form elements -->
    <div class="card login-box">
      <div class="card-header">
        <img src="<?php echo base_url('assets/img/logo.png'); ?>" class="img-fluid">
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form role="form" action="<?php echo base_url('welcome/aksi_login'); ?>" method="post">
        <div class="card-body">
          <div class="form-group">
            <label for="inputUsername">Username</label>
            <input type="text" class="form-control" name="username" id="inputUsername" placeholder="Masukan Username" required>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" name="password" required id="exampleInputPassword1" placeholder="Password">
          </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Login</button>
        </div>
      </form>
    </div>
    <!-- /.card -->
  <!-- </div> -->
  <!--/.col (left) -->
</body>