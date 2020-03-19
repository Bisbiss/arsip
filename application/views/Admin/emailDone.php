<!-- <div class="content-wrapper"> -->
  <section class="content">
    <div class="container-fluid">
      <div class="container">
        <div class="row">
        	<div class="col-12">
            <?php
              if (isset($_GET['action'])) {
                if ($_GET['action']=='success') {
                  ?>
                  <br>
                  <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <strong>Email berhasil diperbaharui!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <?php
                }
              }
            ?>
				<br>
        		<div class="card card-info">
	              <div class="card-header">
	                <h3 class="card-title">Edit Setting Email Tujuan</h3>
	              </div>
	              <!-- /.card-header -->
                  <?php 
                  echo form_open_multipart('Email/editData'); 
                  foreach ($data as $data) {
                    $id = $data['id_email'];
                    $email = $data['email_tujuan'];
                    $subject = $data['subject']; 
                    $isi = $data['isi'];
                  }
                  ?>
                  <input type="hidden" name="id" value="$id">
					<div class="card-body">
					  <div class="form-group">
						<label for="noSurat">Email Tujuan</label>
						<input type="text" class="form-control" id="no_surat" name="email" value="<?php echo $email ?>" placeholder="Masukan Email Tujuan" required>
					  </div>

                      <div class="form-group">
						<label for="subject">Subject</label>
						<input type="text" class="form-control" id="subject" name="subject" value="<?php echo $subject?>" placeholder="Masukan Subject Email" required>
					  </div>

                      <div class="form-group">
						<label for="isi">Isi Email</label>
						<textarea class="form-control" id="isi" name="isi"  placeholder="Masukan Isi Email" required><?php echo $isi ?></textarea>
					  </div>

                    </div>

                    <div class="card-footer">
					    <input type="submit" class="btn btn-info" style="float:right;" name="simpan" value="Submit">
					</div>
                    <?php form_close();?>
	            </div>
            </div>
        </div>
      </div>
    </div>
  </section>