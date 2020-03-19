<!-- <div class="content-wrapper"> -->
  <section class="content">
    <div class="container-fluid">
      <div class="container">
        <div class="row">
            <div class="col-12">
            <br>
            <?php 
            $query2 = $this->db->query("select * from email"); 
            /* $query = $this->db->query("SELECT bulan,no_surat AS jumlah FROM surat_keluar GROUP by bulan"); */
            if($query2->num_rows() < 1){
                ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Email Belum disetting!</strong><p>Silahkan setting di menu <a href="<?php echo base_url('Email') ?>">Email</a> untuk mengunakan fitur kirim laporan</p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
            <?php }
            ?>



            </div>
        </div>
        <div class="row">
          <div class="col-12">
            <br>
            <div class="callout callout-info">
              <marquee behavior="scroll" direction="left"> Selamat Datang di Bank Arsip Pidsus (BAP) Kejaksaan Negeri Empat Lawang </marquee>
            </div>
          </div><!-- /.col -->
        </div><!-- /.row -->


        <?php 
        $query = $this->db->query("select count(id_surat) as jumlah from surat_masuk"); 
       /* $query = $this->db->query("SELECT bulan,no_surat AS jumlah FROM surat_keluar GROUP by bulan"); */
        if($query->num_rows() > 0){
            foreach($query->result() as $data2){
                $hasil=$data2->jumlah;
            }
        }

        ?>

        <div class="row">
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $hasil; ?></h3>

                <p>Surat Masuk</p>
              </div>
              <div class="icon">
                <i class="ion envelope"></i>
              </div>
              <a href="<?php echo base_url('admin/masuk')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>


<?php 
$query = $this->db->query("select count(id_sk) as jumlah from surat_keluar"); 
       /* $query = $this->db->query("SELECT bulan,no_surat AS jumlah FROM surat_keluar GROUP by bulan"); */
        if($query->num_rows() > 0){
            foreach($query->result() as $data2){
                $hasil=$data2->jumlah;
            }
        }

        ?>


          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $hasil; ?></h3>

                <p>Surat Keluar</p>
              </div>
              <div class="icon">
                <i class="ion mail"></i>
              </div>
              <a href="<?php echo base_url('admin/keluar')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>



<?php 
$query = $this->db->query("select count(id_nota_dinas) as jumlah from nota_dinas"); 
       /* $query = $this->db->query("SELECT bulan,no_surat AS jumlah FROM surat_keluar GROUP by bulan"); */
        if($query->num_rows() > 0){
            foreach($query->result() as $data2){
                $hasil=$data2->jumlah;
            }
        }

        ?>


          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $hasil; ?></h3>

                <p>Nota Dinas</p>
              </div>
              <div class="icon">
                <i class="ion mail"></i>
              </div>
              <a href="<?php echo base_url('admin/dinas')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>

        </div>
        
        <div class="row">
            <div class="col-lg-4 col-12">
                <div class="card">
                    <div class="card-header no-border">
                        <div class="d-flex justify-content-between">
                        <h3 class="card-title">Surat Masuk</h3>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="position-relative mb-4">
                            <canvas id="canvas2" height="200"></canvas>
                        </div>
                        <div class="d-flex flex-row justify-content-end">
                            <span class="mr-2">
                            <i class="fa fa-square text-info"></i> Surat Masuk
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-12">
                <div class="card">
                    <div class="card-header no-border">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Surat Keluar</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="position-relative mb-4">
                            <canvas id="canvas" height="200"></canvas>
                        </div>
                        <div class="d-flex flex-row justify-content-end">
                            <span class="mr-2">
                            <i class="fa fa-square text-info"></i> Surat Keluar
                            </span>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-4 col-12">
                <div class="card">
                    <div class="card-header no-border">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Nota Dinas</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="position-relative mb-4">
                            <canvas id="canvas3" height="200"></canvas>
                        </div>
                        <div class="d-flex flex-row justify-content-end">
                            <span class="mr-2">
                            <i class="fa fa-square text-info"></i> Nota Dinas
                            </span>
                        </div>
                    </div>
                </div>
            </div>



<?php
date_default_timezone_set('Asia/Jakarta');
$jam =  date("h:i:sa");
?>

<script type="text/javascript">
    var detik = <?php echo date('s'); ?>;
    var menit = <?php echo date('i'); ?>;
    var jam   = <?php echo date('H'); ?>;
     
    function clock()
    {
        if (detik!=0 && detik%60==0) {
            menit++;
            detik=0;
        }
        second = detik;
         
        if (menit!=0 && menit%60==0) {
            jam++;
            menit=0;
        }
        minute = menit;
         
        if (jam!=0 && jam%24==0) {
            jam=0;
        }
        hour = jam;
         
        if (detik<10){
            second='0'+detik;
        }
        if (menit<10){
            minute='0'+menit;
        }
         
        if (jam<10){
            hour='0'+jam;
        }
        waktu = hour+':'+minute+':'+second;
         
        document.getElementById("clock").innerHTML = waktu;
        detik++;
    }
 
    setInterval(clock,1000);
</script>





<div style="width:1200px;">
<div style="float:right">

Jam &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <h10 id="clock"> </h10>
<br>
<?php
$tgl=date('l, d F Y');
echo "Hari & Tanggal :  " . $tgl;
?>
</div>
</div>



        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
<!-- /.content -->
<!-- </div> -->
