<!-- <div class="content-wrapper"> -->
  <section class="content">
    <div class="container-fluid">
      <div class="container">
      <?php
        if (isset($_GET['action'])) {
            if ($_GET['action']=='success') {
            ?>
            <br>
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>Dokumentasi berhasil diupload!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
            }else{?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Dokumentasi Gagal diupload!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php }
        }
        ?>
        <div class="row">
        	<div class="col-12">
              <br>
	          <div class="callout callout-info">
                <h5>Dokumentasi</h5>
              </div>
              <br>
	          <a class="btn btn-danger" a href="#" data-target="#ouput" data-toggle="modal">Tambah Data</a>
            </div>
        </div>
        <div class="row">
        <?php
        foreach($data as $data) {
            if($data<1){
                echo "<center>Tidak ada Dokumentasi</center>";
            }
            $file = $data['file'];
        ?>
            <div class="col-md-4">
            <br>
                <div class="card">
                    <a href="<?php echo base_url('assets/file/'.$file)?>">
                    <img src="<?php echo base_url('assets/file/'.$file)?>" class="card-img-top" height="205px"> </a>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $file ?></h5>
                        <a href="<?php echo base_url('Dokumentasi/delete/'.$data['id_galeri'])?>" class="btn btn-danger" style="float:right">Delete</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
      </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="ouput" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-tittle">Tambah Dokumentasi</h3>
                </div>
                
                <?php echo form_open_multipart('Dokumentasi/tambah'); ?>
                <form role="form" action="ouput" method="POST" class="from-horizontal">                            
                <div class="modal-body">
                    <div class="form-group">
	                    <label for="exampleInputFile">Upload Dokumentasi</label>
	                    <div class="input-group">
	                      <div class="custom-file">
	                        <input type="file" required name="file" class="custom-file-input" id="exampleInputFile">
	                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
	                      </div>
	                    </div>
	                </div>
                </div>

                <div class="modal-footer">
                    <input type="submit" class="btn btn-danger" name="submit" value="Submit">
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Akhir Modal -->
  </section>