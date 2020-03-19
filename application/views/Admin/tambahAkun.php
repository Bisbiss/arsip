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
	                <h3 class="card-title">Tambah Akun</h3>
	              </div>

	              <!-- /.card-header -->
                  <?php echo form_open_multipart('Akun/insert'); ?>
					<div class="card-body">
					  <div class="form-group">
						<label for="noSurat">Username</label>
						<input type="text" required="required" class="form-control" id="no_surat" name="username" placeholder="Masukan Username" required>
					  </div>

                      <div class="form-group">
						<label for="subject">Password</label>
						<input type="text" required="required" class="form-control" id="subject" name="password" placeholder="Masukan Password" required>
					  </div>

                    </div>

                    <div class="card-footer">
					    <input type="submit" class="btn btn-info" style="float:right;" name="simpan" value="Submit">
					</div>
                    <?php form_close(); ?>
	            </div>
            </div>
        </div>
      </div>
    </div>
  </section>