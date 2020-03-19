<!-- <div class="content-wrapper"> -->
<section class="content">
    <div class="container-fluid">
      <div class="container">
        <div class="row">
        	<div class="col-12">
			<br>
        		<div class="card card-primary">
	              <div class="card-header">
	                <h3 class="card-title">Form Surat Masuk</h3>
	              </div>
	              <!-- /.card-header -->
	              <!-- form start -->
				  <?php echo form_open_multipart('Admin/insert_masuk'); ?>
	                <div class="card-body">
	                  <div class="form-group">
	                    <label for="noSurat">No Surat Masuk</label>
	                    <input type="text" required="required" class="form-control" id="noSurat" name="no_surat" placeholder="Masukan No Surat">
	                  </div>
	                  <div class="form-group">
	                    <label for="exampleInputPassword1">Tanggal Surat Masuk</label>
	                    <input type="date" required="required" class="form-control" name="tgl_surat" id="exampleInputPassword1" placeholder="Password">
	                  </div>
                      <div class="form-group">
	                    <label for="exampleInputPassword1">Tanggal Diterima Surat</label>
	                    <input type="date" required="required" class="form-control" name="tgl_surat_diterima" id="exampleInputPassword1" placeholder="Password">
	                  </div>
                      <div class="form-group">
	                    <label for="exampleInputPassword1">Asal Surat</label>
	                    <input type="text" required="required" class="form-control" name="asal_surat" id="exampleInputPassword1" placeholder="Masukan Asal Surat">
	                  </div>
                      <div class="form-group">
	                    <label for="exampleInputPassword1">Isi Surat</label>
	                    <input type="text" required="required" class="form-control" name="isi_surat" id="exampleInputPassword1" placeholder="Masukan Isi Surat">
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
	                  <button type="submit" class="btn btn-primary">Submit</button>
	                </div>
					<?php form_close(); ?>
	            </div>
	          </div>
	      </div>
	  </div>
	</div>
</section>