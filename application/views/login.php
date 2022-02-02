<html>
<header>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/css/main.css">
  <script src='https://www.google.com/recaptcha/api.js'></script>
<!--===============================================================================================-->
</header>

<body>
<div class="limiter">
		<div class="container-login100" style="background-image: url('<?php echo base_url() ?>/assets/img/background.png');">
			<div class="wrap-login100 p-t-30 p-b-50" >

				<form class="login100-form validate-form p-b-33 p-t-5 "  action="<?php echo base_url().'home/loginAPI';?>" method="post">

					<div class="wrap-input100 validate-input " data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="User name">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>
					<div class="wrap-input100 validate-input" align="center">
            <div class="g-recaptcha" data-sitekey="<?php echo $this->config->item('google_key') ?>"></div>
					</div>
          <div style="color:red" align="center">
                <?php if(isset($err_msg))echo $err_msg; ?>
                <?php echo form_error('g-recaptcha-response'); ?>
           </div>
					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
				</form>
			</div>
			<div class="container-login100-form-btn m-t-32" align="center" style="color:white">
				<div style="font-size: 10px;">
					2020<br/>
					Untuk bantuan lebih lanjut, anda dapat menghubungi<br/>
					PT MNC Guna Usaha Indonesia<br/>
					di nomor 021-3910993 ext 1
				</div>
			</div>

		</div>

	</div>
  <!--===============================================================================================-->
	<script src="<?php echo base_url() ?>/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url() ?>/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?php echo base_url() ?>/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>/js/main.js"></script>
</body>
</html>
