<html>

<head>
	<link href="dist/css/login.css" rel="stylesheet">
	<link href="dist/css/style.min.css" rel="stylesheet">
	<script src="assets/libs/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap tether Core JavaScript -->
	<script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
	<script src="assets/extra-libs/sparkline/sparkline.js"></script>
</head>

<body class="main-bg">
	<div class="login-container text-c animated flipInX">
		<div>
			<h1 class="logo-badge text-blacksmoke"><span class="fa fa-user-circle"></span></h1>
		</div>
		</br>
		<div class="container-content">
			<div class="card">
				<form class="form-horizontal">
					<div class="card-body">
						<h4 class="card-title">Personal Info</h4>
						<div class="form-group row">
							<label for="lname" class="col-sm-3 text-end control-label col-form-label">Username</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="username">
							</div>
						</div>
						<div class="form-group row">
							<label for="lname" class="col-sm-3 text-end control-label col-form-label">Password</label>
							<div class="col-sm-9">
								<input type="password" class="form-control" name="password">
							</div>
						</div>
					</div>
					<div class="border-top">
						<div class="card-body">
							<button type="button" class="btn btn-dark btn-md">Login</button>
						</div>
					</div>
				</form>
			</div>
			<p class="margin-t text-blacksmoke">Sistem Informasi Klinik &copy; <?php echo date("Y"); ?></p>
		</div>
	</div>
</body>

</html>
