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
	          <a class="btn btn-danger" href="<?php echo base_url('Admin/tambahKeluar');?>">Tambah Data</a>
               <a class="btn btn-warning" href="<?php echo base_url('Cetak/keluar');?>">Cetak Laporan</a>
	          <br>
	          <div class="card">
	            <div class="card-header">
	              <h3 class="card-title">Data Surat Keluar</h3>  
	            </div>
	            <!-- /.card-header -->
		            <div class="card-body">
		              <table id="example1" class="table table-bordered table-striped">
		                <thead>
		                  <tr>
		                    <th>No</th>
		                    <th>No Surat</th>
		                    <th>Tanggal Surat Keluar</th>
		                    <th>Tujuan Surat</th>
		                    <th>Jenis Surat</th>
		                    <th>File Surat</th>
                            <th>Lapor</th>
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
						<td><?php echo $r['no_surat'] ?></td>
						<td><?php echo $r['tgl_surat'] ?></td>
						<td><?php echo $r['tujuan_surat'] ?></td>
						<td><?php echo $r['jenis_surat'] ?></td>
						<td>
						<a href="<?php echo base_url(); ?>assets/foto/<?php echo $r['file'] ?>">Lihat File</a>
						</td>
                        <td>
                        <?php if($r['lapor']!=1){ ?>
                            <a href="<?php echo base_url('Email/sendEmailKeluar/'.$r['id_sk']); ?>">Kirim Laporan</a>
                        <?php }else{ ?>
                            <span>Terkirim!!</span>
                        <?php } ?>
                        </td>
						<td><a href="<?php echo base_url('Admin/editKeluar/'.$r['id_sk']);?>">  
						<button type="button"  class="btn btn-warning">edit</button> </a>|
						<a href="<?php echo base_url('Admin/delete/'.$r['id_sk']);?>" 
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