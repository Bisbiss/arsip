<!-- <div class="content-wrapper"> -->
  <section class="content">
    <div class="container-fluid">
      <div class="container">
        <div class="row">
        	<div class="col-12">
				<br>
        		<div class="card card-info">
	              <div class="card-header">
	                <h3 class="card-title">Form Data Master</h3>
	              </div>
	              <!-- /.card-header -->
	              <!-- form start -->
				  <?php echo form_open_multipart('Master/insert_master'); ?>
					<div class="card-body">
					 <div class="form-group">
                        <label for="exampleInputPassword1">Jenis Berkas</label>
                        <select required="required" class="form-control" name="jenis_berkas" id="exampleInputPassword1">
                            <option value=""> Pilih Jenis Berkas </option>
                            <option value="Berkas Penyelidikan"> Berkas Penyelidikan </option>
                            <option value="Berkas Penyidikan"> Berkas Penyidikan </option>
                            <option value="Berkas Penuntutan"> Berkas Penuntutan </option>
                            <option value="Berkas Eksekusi"> Berkas Eksekusi </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="noSurat">Nama Berkas</label>
                        <input type="text" class="form-control" id="no_surat" name="nama_berkas" placeholder="Masukan Nama Berkas" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Tanggal Input</label>
                        <input type="date" class="form-control" name="tgl_input" id="exampleInputPassword1" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Isi Surat</label>
                        <textarea class="form-control" name="isi" id="exampleInputPassword1" placeholder="Masukan Isi Berkas" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Upload Berkas</label>
                        <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="file" required="required" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        </div>
                    </div> 
					 
					</div>
					<!-- /.card-body -->

					<div class="card-footer">
					<input type="submit" class="btn btn-info" name="simpan" value="Submit">
					</div>
                    <?php form_close(); ?>
	            </div>
	          </div>
	      </div>
	  </div>
	</div>
</section>