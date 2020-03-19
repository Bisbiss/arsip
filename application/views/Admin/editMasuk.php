<!-- <div class="content-wrapper"> -->
<section class="content">
    <div class="container-fluid">
      <div class="container">
        <div class="row">
        	<div class="col-12">
            <br>
        		<div class="card card-primary">
	              <div class="card-header">
                      
	                <h3 class="card-title">Form Edit Surat Masuk</h3>
	              </div>
	              <!-- /.card-header -->
                  <!-- form start -->
                  <?php
if($dataEdit){
	$id_surat = $dataEdit->id_surat;
    $no_surat=$dataEdit->no_surat;
    $tgl_surat=$dataEdit->tgl_surat;
    $asal_surat=$dataEdit->asal_surat;
    $jenis_surat=$dataEdit->jenis_surat;
    $isi_surat=$dataEdit->isi_surat;
    $ket=$dataEdit->ket;
    $file=$dataEdit->file;
    $tgl_surat_diterima=$dataEdit->tgl_surat_diterima;
}
?>


                    <form role="form" action="<?php echo base_url('Admin/update_masuk/'.$id_surat);?>" method="POST">
	                <div class="card-body">
	                  <div class="form-group">
	                    <label for="noSurat">No Surat Masuk</label>
	                    <input required="required" type="text" class="form-control" value="<?php echo $no_surat; ?>" id="noSurat" name="no_surat" placeholder="Masukan No Surat">
	                  </div>
	                  <div class="form-group">
	                    <label for="exampleInputPassword1">Tanggal Surat Masuk</label>
	                    <input type="date" required="required" value="<?php echo $tgl_surat; ?>" class="form-control" name="tgl_surat" id="exampleInputPassword1" placeholder="Password">
	                  </div>
                      <div class="form-group">
	                    <label for="exampleInputPassword1">Tanggal Diterima Surat</label>
	                    <input type="date" required="required" value="<?php echo $tgl_surat_diterima; ?>" class="form-control" name="tgl_surat_diterima" id="exampleInputPassword1" placeholder="Password">
	                  </div>
                      <div class="form-group">
	                    <label for="exampleInputPassword1">Asal Surat</label>
	                    <input type="text" required="required" value="<?php echo $asal_surat; ?>" class="form-control" name="asal_surat" id="exampleInputPassword1" placeholder="Masukan Asal Surat">
	                  </div>
                      <div class="form-group">
	                    <label for="exampleInputPassword1">Isi Surat</label>
	                    <input type="text" required="required" value="<?php echo $isi_surat; ?>" class="form-control" name="isi_surat" id="exampleInputPassword1" placeholder="Masukan Isi Surat">
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
	                    <label for="exampleInputPassword1">Keterangan</label>
	                    <textarea class="form-control" required="required" name="ket" id="exampleInputPassword1" placeholder="Masukan Keterangan"><?php echo $ket; ?></textarea>
	                </div>



	                  <div class="form-group">
	                    <label for="exampleInputFile">Upload Berkas </label>
	                    <div class="input-group">
	                      <div class="custom-file">
	                        <input type="file" name="file" class="custom-file-input" id="exampleInputFile">
	                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
	                      </div>
	                      
	                    </div>
	                  </div>
	                 
	                </div>
	                <!-- /.card-body -->

	                <div class="card-footer">
	                  <button type="submit" class="btn btn-primary">Submit</button>
	                </div>
	              </form>
	            </div>
	          </div>
	      </div>
	  </div>
	</div>
</section>