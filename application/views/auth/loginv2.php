<html>

<head>
	<title>SI Klinik - Login</title>
	<link href="<?php echo base_url(); ?>dist/css/login.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>dist/css/style.min.css" rel="stylesheet">
	<script src="<?php echo base_url(); ?>assets/libs/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap tether Core JavaScript -->
	<script src="<?php echo base_url(); ?>assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/extra-libs/sparkline/sparkline.js"></script>
	<!-- Toastr -->
	<link href="<?php echo base_url(); ?>assets/libs/toastr/build/toastr.min.css" rel="stylesheet">
	<script src="<?php echo base_url(); ?>assets/libs/toastr/build/toastr.min.js"></script>
</head>

<body class="main-bg">
	<div class="login-container text-c">
		<div>
			<h1 class="logo-badge text-blacksmoke"><span class="fa fa-user-circle"></span></h1>
		</div>
		</br>
		<div class="container-content">
			<div class="card">
				<form class="form-horizontal" action="<?php echo base_url('auth/login'); ?>" method="post">
					<div class="card-body">
						<h4 class="card-title">Personal Info</h4>
						</br>
						<div class="form-group row">
							<label for="username" class="col-sm-3 text-end control-label col-form-label">Username</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="username">
							</div>
						</div>
						<div class="form-group row">
							<label for="password" class="col-sm-3 text-end control-label col-form-label">Password</label>
							<div class="col-sm-9">
								<input type="password" class="form-control" name="password">
							</div>
						</div>
					</div>
					<div class="border-top">
						<div class="card-body">
							<button type="submit" class="btn btn-dark btn-md">Login</button>
						</div>
					</div>
				</form>
			</div>
			<p class="margin-t text-blacksmoke">Sistem Informasi Klinik &copy; <?php echo date("Y"); ?></p>
		</div>
	</div>
</body>

</html>
