<!--
=========================================================
Material Dashboard - v2.1.2
=========================================================

Product Page: https://www.creative-tim.com/product/material-dashboard
Copyright 2020 Creative Tim (https://www.creative-tim.com)
Coded by Creative Tim

=========================================================
The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">

<head>
</head>
<body>
  <?php $this->load->view('template/header') ?>
  <div class="content">
    <div class="container-fluid">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-text card-header-sucess">
        <div class="card-text">
          <h4 class="card-title">Ubah Password</h4>
        </div>
      </div>
	   <div class="card-body">
               <form action="<?php echo base_url().'home/DoChangePass';?>" method="post">
			    <div class="row">
                   <div class="col-md-12">
                     <div class="form-group">
                       <label class="bmd-label-floating">Password Lama Anda</label>
                       <input name="oldpass" type="password" class="form-control" required>
                     </div>
                   </div>
                 </div>
				  <div class="row">
                   <div class="col-md-12">
                     <div class="form-group">
                       <label class="bmd-label-floating">Password Baru Anda</label>
                       <input name="newpass1" type="password" class="form-control" required>
                     </div>
                   </div>
                 </div>
				 <div class="row">
                   <div class="col-md-12">
                     <div class="form-group">
                       <label class="bmd-label-floating">Ulangi Password Baru Anda</label>
                       <input name="newpass2" type="password" class="form-control" required>
                     </div>
                   </div>
                 </div>
				 <div class="col-md-12">
	<button type="submit" class="btn btn-primary pull-right">Simpan</button>
	<div class="clearfix"></div>
	</form>
	</div>
			   </form>
	  </div>
	  </div>
	  </div>
	  </div>
	  </div>
   
  <?php $this->load->view('template/footer')?>
  <?php $this->load->view('template/core')?>
</body>

</html>
