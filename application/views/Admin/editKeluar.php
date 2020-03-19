<!-- <div class="content-wrapper"> -->
<section class="content">
    <div class="container-fluid">
      <div class="container">
        <div class="row">
        	<div class="col-12">
            <br>
        		<div class="card card-info">
	              <div class="card-header">
	                <h3 class="card-title">Form Edit Surat Keluar</h3>
	              </div>
	              <!-- /.card-header -->
	              <!-- form start -->

				                    
<?php
if($dataEdit){
	$id_sk = $dataEdit->id_sk;
    $no_surat=$dataEdit->no_surat;
    $tgl_surat=$dataEdit->tgl_surat;
    $tujuan_surat=$dataEdit->tujuan_surat;
    $jenis_surat=$dataEdit->jenis_surat;
    $isi_surat=$dataEdit->isi_surat;
    $ket=$dataEdit->ket;
    $file = $dataEdit->file;
}
?>
	              <?php echo form_open_multipart('Admin/update/'.$id_sk); ?>

	                <div class="card-body">
	                  <div class="form-group">
	                    <label for="noSurat">No Surat Keluar</label>
	                    <input type="text"  required="required" class="form-control" id="no_surat" value="<?php echo $no_surat; ?>" name="no_surat" placeholder="Masukan No Surat">
	                  </div>
	                  <div class="form-group">
	                    <label for="exampleInputPassword1">Tanggal Surat Keluar</label>
	                    <input type="date" required="required" class="form-control" name="tgl_surat" value="<?php echo $tgl_surat; ?>" id="exampleInputPassword1" placeholder="Password">
	                  </div>
                      <div class="form-group">
	                    <label for="exampleInputPassword1">Tujuan Surat</label>
	                    <input type="text" required="required" class="form-control" value="<?php echo $tujuan_surat; ?>" name="tujuan_surat" id="exampleInputPassword1" placeholder="Masukan Tujuan Surat">
	                  </div>
                      <div class="form-group">
	                    <label for="exampleInputPassword1">Jenis Surat</label>
	                    <select required="required" class="form-control" name="jenis_surat">
                            <option value=""> Pilih Jenis Surat </option>
                            <option <?php  if($jenis_surat == "Biasa"){ echo "selected=\"selected\""; } ?> value="Biasa"> Biasa </option>
                            <option  <?php  if($jenis_surat == "Rahasia"){ echo "selected=\"selected\""; } ?> value="Rahasia">Rahasia</option>
                            <option  <?php  if($jenis_surat == "Segera"){ echo "selected=\"selected\""; } ?> value="Segera">Segera</option>
                        
                        </select>
                    </div>
                      <div class="form-group">
	                    <label for="exampleInputPassword1">Isi Surat</label>
	                    <input type="text" required="required" class="form-control" value="<?php echo $isi_surat; ?>" name="isi_surat" id="exampleInputPassword1" placeholder="Masukan Isi Surat">
	                  </div>
                    <div class="form-group">
	                    <label for="exampleInputPassword1">Keterangan</label>
	                    <textarea class="form-control" required="required" name="ket" id="exampleInputPassword1" placeholder="Masukan Keterangan"><?php echo $ket; ?></textarea>
	                </div>



	                  <div class="form-group">
	                    <label for="exampleInputFile">Upload Berkas</label>
	                    <div class="input-group">
	                      <div class="custom-file">
	                        <input type="file" name="file" value=" <?php echo $file; ?>" class="custom-file-input" id="exampleInputFile">
		                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
	                      </div>
	                    </div>
	                  </div>
	                 
	                </div>
	                <!-- /.card-body -->

	                <div class="card-footer">
					<input type="submit" class="btn btn-primary" name="simpan" value="Submit">
	                </div>
	              </form>
	            </div>
	          </div>
	      </div>
	  </div>
	</div>
</section>