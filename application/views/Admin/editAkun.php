<!-- <div class="content-wrapper"> -->
  <section class="content">
    <div class="container-fluid">
      <div class="container">
        <div class="row">
            <div class="col-12">
            </div>
        </div>
        <div class="row">
        	<div class="col-12">
				<br>
        		<div class="card card-info">
	              <div class="card-header">
	                <h3 class="card-title">Edit Akun</h3>
	              </div>

                  
<?php
if($dataEdit){
	$id_user = $dataEdit->id_user;
    $username=$dataEdit->username;
    $password=$dataEdit->password;

}
?>


	              <!-- /.card-header -->
                    <form role="form" action="<?php echo base_url('Akun/update_akun/'.$id_user);?>" method="POST">

					<div class="card-body">
					  <div class="form-group">
						<label for="noSurat">Username</label>
						<input type="text" required="required" value="<?php echo $username; ?>" class="form-control" id="no_surat" name="username" placeholder="Masukan Username" required>
					  </div>

                      <div class="form-group">
						<label for="subject">Password</label>
						<input type="text" required="required" value="<?php echo $password; ?>" class="form-control" id="subject" name="password" placeholder="Masukan Password" required>
					  </div>

                    </div>

                    <div class="card-footer">
					    <input type="submit" class="btn btn-info" style="float:right;" name="simpan" value="Submit">
					</div>
                    </form>
	            </div>
            </div>
        </div>
      </div>
    </div>
  </section>