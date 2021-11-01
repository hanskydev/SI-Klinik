<title>SI Klinik - Pasien</title>
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Pasien</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Pasien</li>
                        </ol>
                    </nav>
                </div>
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
        <div class="row">
            <div class="col-md-6 col-lg-2 col-xlg-3">
                <a href="<?php echo base_url(); ?>pasien/create">
                    <div class="card card-hover">
                        <div class="box bg-success text-center">
                            <h1 class="font-light text-white"><i class="mdi mdi-account-plus"></i></h1>
                            <h6 class="text-white">Tambah Pasien</h6>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/extra-libs/multicheck/multicheck.css">
        <link href="<?php echo base_url(); ?>assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">

        <div class="col-12">
            <div class="card">
                <div class="card-header bg-dark text-white font-weight-bold text-center">Daftar Pasien</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pasien</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Nomor Telepon</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
							    $no = 1;
							    foreach($pasien as $data)
							    {
							    ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $data->nm_pasien; ?></td>
                                    <td><?php echo $data->jns_kelamin; ?></td>
                                    <td><?php echo $data->no_telepon; ?></td>
                                    <td><?php echo $data->alamat; ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a class="btn btn-outline-primary btn-sm" href="<?php echo base_url(); ?>pasien/detail/<?php echo $data->kd_pasien; ?>"><i class="mdi mdi-account-card-details"></i></a>
                                            <a class="btn btn-outline-success btn-sm" href="<?php echo base_url(); ?>pasien/edit/<?php echo $data->kd_pasien; ?>"><i class="mdi mdi-pencil"></i></a>
                                            <a class="btn btn-outline-danger btn-sm" onclick="return confirm('Hapus data berikut?')" href="<?php echo base_url(); ?>pasien/delete/<?php echo $data->kd_pasien; ?>"><i class="mdi mdi-delete"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <?php
							    }
							    ?>
                            </tbody>
                        </table>
                    </div>
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
    <!-- This Page JS -->
    <script src="<?php echo base_url(); ?>assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
    <script src="<?php echo base_url(); ?>assets/extra-libs/multicheck/jquery.multicheck.js"></script>
    <script src="<?php echo base_url(); ?>assets/extra-libs/DataTables/datatables.min.js"></script>
    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable();
    </script>