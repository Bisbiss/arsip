<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-info">
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <a class="navbar-brand" href="<?php echo base_url('admin');?>">E-Arsip</a>

	  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
	    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
	      <li class="nav-item dropdown">
	        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Kelola Arsip</a>
    		<div class="dropdown-menu bg-info">
	        	<a href="<?php echo base_url('admin/masuk');?>" class="dropdown-item bg-info">Surat Masuk</a>
	        	<a href="<?php echo base_url('admin/keluar');?>" class="dropdown-item bg-info">Surat Keluar</a>
	        	<a href="<?php echo base_url('admin/dinas');?>" class="dropdown-item bg-info">Nota Dinas</a>
	        </div>
	      </li>

	      <li class="nav-item">
	        <a class="nav-link" href="<?php echo base_url('Master') ?>">Data Master</a>
	      </li>

          <li class="nav-item">
	        <a class="nav-link" href="<?php echo base_url('Dokumentasi') ?>">Dokumentasi</a>
	      </li>
	      
	      <li class="nav-item">
	        <a class="nav-link" href="<?php echo base_url('Email');?>">E-mail</a>
	      </li>
	      
	      <li class="nav-item">
	        <a class="nav-link" href="<?php echo base_url('Akun');?>">Kelola Akun</a>
	      </li>
	      <li class="nav-inline">
	        <a class="nav-link" href="<?php echo base_url('Welcome/logout');?>">Keluar</a>
	      </li>
	    </ul>
	  </div>
	</nav>
</body>