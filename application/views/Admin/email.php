<!-- <div class="content-wrapper"> -->
  <section class="content">
    <div class="container-fluid">
      <div class="container">
        <div class="row">
            <div class="col-12">
            <br>
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>Email Belum Disetting!</strong> Silahkan Setting Email Terlebih Dahulu....
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            </div>
        </div>
        <div class="row">
        	<div class="col-12">
				<br>
        		<div class="card card-info">
	              <div class="card-header">
	                <h3 class="card-title">Setting Email Tujuan</h3>
	              </div>

	              <!-- /.card-header -->
                  <?php echo form_open_multipart('Email/tambah'); ?>
					<div class="card-body">
					  <div class="form-group">
						<label for="noSurat">Email Tujuan</label>
						<input type="text" required="required" class="form-control" id="no_surat" name="email" placeholder="Masukan Email Tujuan" required>
					  </div>

                      <div class="form-group">
						<label for="subject">Subject</label>
						<input type="text" required="required" class="form-control" id="subject" name="subject" placeholder="Masukan Subject Email" required>
					  </div>

                      <div class="form-group">
						<label for="isi">Isi Email</label>
						<textarea class="form-control" required="required" id="isi" name="isi" placeholder="Masukan Isi Email" required></textarea>
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