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
                  
				                    
                  <?php
                    if($dataEdit){
                        $id_berkas = $dataEdit->id_berkas;
                        $jenis_berkas=$dataEdit->jenis_berkas;
                        $tgl_input=$dataEdit->tgl_input;
                        $nama_berkas=$dataEdit->nama_berkas;
                        $isi=$dataEdit->isi_berkas;
                        $file=$dataEdit->file;
                    }
                    ?>
 <?php echo form_open_multipart('Master/update_master/'.$id_berkas); ?>
<!-- <form role="form" action="<?php echo base_url('Admin/update_dinas/'.$id_nota_dinas);?>" method="POST"> !-->


<div class="card-body">
    <div class="form-group">
        <label for="exampleInputPassword1">Jenis Berkas</label>
        <select  class="form-control" name="jenis_berkas" id"exampleInputPassword1">
            <option value=""> Pilih Jenis Berkas </option>
            <option <?php  if($jenis_berkas == "Berkas Penyelidikan"){ echo "selected=\"selected\""; } ?> value="Berkas Penyelidikan"> Berkas Penyelidikan </option>
            <option <?php  if($jenis_berkas == "Berkas Penyidikan"){ echo "selected=\"selected\""; } ?> value="Berkas Penyidikan"> Berkas Penyidikan </option>
            <option <?php  if($jenis_berkas == "Berkas Penuntutan"){ echo "selected=\"selected\""; } ?> value="Berkas Penuntutan"> Berkas Penuntutan </option>
            <option <?php  if($jenis_berkas == "Berkas Eksekusi"){ echo "selected=\"selected\""; } ?> value="Berkas Eksekusi"> Berkas Eksekusi </option>
        </select>
    </div>
  <div class="form-group">
	<label for="noSurat">Nama Berkas</label>
	<input type="text" value="<?php echo $nama_berkas; ?>" class="form-control" id="no_surat" name="nama_berkas" placeholder="Masukan Nama Berkas" required>
  </div>
  <div class="form-group">
	<label for="exampleInputPassword1">Tanggal Input</label>
	<input type="date" value="<?php echo $tgl_input; ?>" class="form-control" name="tgl_input" id="exampleInputPassword1" required>
  </div>
  <div class="form-group">
	<label for="exampleInputPassword1">Isi Surat</label>
	<textarea class="form-control" name="isi" id="exampleInputPassword1" placeholder="Masukan Isi Surat" required><?php echo $isi; ?></textarea>
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
<input type="submit" class="btn btn-info" name="simpan" value="Submit">
</div>
<?php form_close(); ?>
	            </div>
	          </div>
	      </div>
	  </div>
	</div>
</section>