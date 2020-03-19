<!-- <div class="content-wrapper"> -->
<section class="content">
    <div class="container-fluid">
      <div class="container">
        <div class="row">
        	<div class="col-12">
			<br>
        		<div class="card card-info">
	              <div class="card-header">
	                <h3 class="card-title">Cetak Berkas Master</h3>
	              </div>
				 
                    <form role="form" action="<?php echo base_url('Cetak/cetak_master');?>" method="POST">

                  <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Bulan</label>
                        <select required="required" required="required" class="form-control" name="bulan">
                            <option value=""> Pilih Bulan </option>
                            <option value="januari"> Januari </option>
                            <option value="februari"> Februari </option>
                            <option value="maret"> Maret </option>
                            <option value="april"> April </option>
                            <option value="mei"> Mei </option>
                            <option value="juni"> Juni </option>
                            <option value="juli"> Juli </option>
                            <option value="agustus"> Agustus </option>
                            <option value="september"> September </option>
                            <option value="oktober"> Oktober </option>
                            <option value="november"> November </option>
                            <option value="desember"> Desember </option>
                        
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Tahun</label>
                        <input type="number" required="required" class="form-control" name="tahun" id="exampleInputPassword1" placeholder="Masukan Tahun Surat">
                    </div>
                    
                    </div>
                    <!-- /.card-body -->



	                <div class="card-footer">
	                  <button type="submit" class="btn btn-info">Submit</button>
	                </div>
					</form>
	            </div>
	          </div>
	      </div>
	  </div>
	</div>
</section>