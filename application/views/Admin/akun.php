<!-- <div class="content-wrapper"> -->
<section class="content">
    <div class="container-fluid">
      <div class="container">
        <div class="row">
        	<div class="col-12">
            <?php
              if (isset($_GET['send'])) {
                if ($_GET['send']=='success') {
                  ?>
                  <br>
                  <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <strong>Laporan berhasil terkirim!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <?php
                }else{
                ?>
                <br>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Laporan gagal terkirim!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <?php
                }
              }
            ?>
	          <br>
	          <a class="btn btn-danger" href="<?php echo base_url('Akun/tambahAkun');?>">Tambah Akun</a>

	          <br>
	          <div class="card">
	            <div class="card-header">
	              <h3 class="card-title">Data Akun</h3>  
	            </div>
	            <!-- /.card-header -->
		            <div class="card-body">
		              <table id="example1" class="table table-bordered table-striped">
		                <thead>
		                  <tr>
		                    <th>No</th>
		                    <th>Username</th>
		                    <th>Password</th>
		                    <th width="120px">Aksi</th>
		                  </tr>
		                </thead>
		                <tbody>
						
						<?php
						$no=1;
						foreach($hasil as $r) {
						?>

						<tr>
						<td><?php echo $no++ ?></td>
						<td><?php echo $r['username'] ?></td>
						<td><?php echo $r['password'] ?></td>
						<td><a href="<?php echo base_url('Akun/editAkun/'.$r['id_user']);?>">  
						<button type="button"  class="btn btn-warning">edit</button> </a>|
						<a href="<?php echo base_url('Akun/delete/'.$r['id_user']);?>" 
						onclick="return confirm ('Yakin Akan Hapus Data ?') "> 
						<button type="button" class="btn btn-danger">hapus</button>
					</a></td>

						</tr>

						<?php }?>

		                </tbody>
		              </table>
		            </div>
	        	</div>
    		</div>
		</div>	
	   </div>
	</div>
</section>