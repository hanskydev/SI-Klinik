<title>SI Klinik - Tambah Dokter</title>
<div class="page-wrapper">
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="page-breadcrumb">
		<div class="row">
			<div class="col-12 d-flex no-block align-items-center">
				<h4 class="page-title">Dashboard</h4>
			</div>
		</div>
	</div>
	<!-- ============================================================== -->
	<!-- End Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<!-- ============================================================== -->
	<!-- Container fluid  -->
	<!-- ============================================================== -->
	<div class="container-fluid">
		<!-- ============================================================== -->
		<!-- Main  -->
		<!-- ============================================================== -->
		<?php 
			if(validation_errors() != false)
			{
				?>
		<div class="alert alert-danger" role="alert">
			<?php echo validation_errors(); ?>
		</div>
		<?php
			}
		?>

		<div class="row">
			<div class="col-12">
				<div class="card">
					<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>dokter/save">
						<div class="card-body">
							<h5 class="card-title">Form Elements</h5>
							<br>
							<div class="form-group row">
								<label class="col-md-3">Single Select</label>
								<div class="col-md-9">
									<input type="text" class="form-control" id="fname" placeholder="First Name Here">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-3">Radio Buttons</label>
								<div class="col-md-9">
									<input type="text" class="form-control" id="fname" placeholder="First Name Here">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-3">Checkboxes</label>
								<div class="col-md-9">
									<input type="text" class="form-control" id="fname" placeholder="First Name Here">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-3">File Upload</label>
								<div class="col-md-9">
									<input type="text" class="form-control" id="fname" placeholder="First Name Here">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-3" for="disabledTextInput">Disabled input</label>
								<div class="col-md-9">
									<input type="text" class="form-control" id="fname" placeholder="First Name Here">
								</div>
							</div>
						</div>
						<div class="border-top">
							<div class="card-body">
								<button type="button" class="btn btn-primary">Submit</button>
							</div>
					</form>
				</div>
			</div>
		</div>
		<!-- ============================================================== -->
		<!-- End Main -->
		<!-- ============================================================== -->
	</div>
	<!-- ============================================================== -->
	<!-- End Container fluid  -->
	<!-- ============================================================== -->
