<!-- <div class="content-wrapper"> -->
  <section class="content">
    <div class="container-fluid">
      <div class="container">
        <div class="row">
        	<div class="col-12">
				<br>
        		<div class="card card-primary">
	              <div class="card-header">
	                <h3 class="card-title">Form Nota Dinas</h3>
	              </div>
	              <!-- /.card-header -->
	              <!-- form start -->
				  <?php echo form_open_multipart('Admin/insert_dinas'); ?>


<div class="card-body">
  <div class="form-group">
	<label for="noSurat">No Nota Dinas</label>
	<input type="text" required="required" class="form-control" id="no_surat" name="no_surat" placeholder="Masukan No Surat">
  </div>
  <div class="form-group">
	<label for="exampleInputPassword1">Tanggal Keluar Nota Dinas</label>
	<input type="date" required="required" class="form-control" name="tgl_keluar" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group">
	<label for="exampleInputPassword1">Tujuan Surat</label>
	<input type="text" required="required" class="form-control" name="tujuan_surat" id="exampleInputPassword1" placeholder="Masukan Tujuan Surat">
  </div>
  <div class="form-group">
	<label for="exampleInputPassword1">Jenis Surat</label>
	<select required="required" class="form-control" name="jenis_surat">
		<option value=""> Pilih Jenis Surat </option>
                            <option value="Biasa"> Biasa </option>
                            <option value="Rahasia"> Rahasia </option>
                            <option value="Segera"> Segera </option>

	
	</select>
</div>
  <div class="form-group">
	<label for="exampleInputPassword1">Isi Surat</label>
	<input type="text" required="required" class="form-control" name="isi_surat" id="exampleInputPassword1" placeholder="Masukan Isi Surat">
  </div>
<div class="form-group">
	<label for="exampleInputPassword1">Keterangan</label>
	<textarea class="form-control" required="required" name="ket" id="exampleInputPassword1" placeholder="Masukan Keterangan"></textarea>
</div>



  <div class="form-group">
	<label for="exampleInputFile">Upload Berkas</label>
	<div class="input-group">
	  <div class="custom-file">
		<input type="file" required="required" name="file" class="custom-file-input" id="exampleInputFile">
		<label class="custom-file-label" for="exampleInputFile">Choose file</label>
	  </div>
	</div>
  </div>
 
</div>
<!-- /.card-body -->

<div class="card-footer">
<input type="submit" class="btn btn-primary" name="simpan" value="Submit">
</div>
<?php form_close(); ?>
	            </div>
	          </div>
	      </div>
	  </div>
	</div>
</section>