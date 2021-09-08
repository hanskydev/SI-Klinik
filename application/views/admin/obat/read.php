<title>SI Klinik - Obat</title>
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Obat</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Obat</li>
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
                <a href="<?php echo base_url(); ?>obat/create">
                    <div class="card card-hover">
                        <div class="box bg-success text-center">
                            <h1 class="font-light text-white"><i class="mdi mdi-account-plus"></i></h1>
                            <h6 class="text-white">Tambah Obat</h6>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/extra-libs/multicheck/multicheck.css">
        <link href="<?php echo base_url(); ?>assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Daftar Obat</h5>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Obat</th>
                                    <th>Deskripsi</th>
                                    <th>Stok</th>
                                    <th>Harga Modal</th>
                                    <th>Harga Jual</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
							$no = 1;
							foreach($obat as $data)
							{
							?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $data->nm_obat; ?></td>
                                    <td><?php echo $data->deskripsi; ?></td>
                                    <td><?php echo $data->stok; ?></td>
                                    <td><?php echo $data->harga_modal; ?></td>
                                    <td><?php echo $data->harga_jual; ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pilih</button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="<?php echo base_url(); ?>obat/edit/<?php echo $data->kd_obat; ?>">Edit</a>
                                                <a class="dropdown-item" onclick="return confirm('Hapus data berikut?')" href="<?php echo base_url(); ?>obat/delete/<?php echo $data->kd_obat; ?>">Hapus</a>
                                            </div>
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