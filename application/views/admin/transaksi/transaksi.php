<title>SI Klinik - Transaksi</title>
<?php
date_default_timezone_set("Asia/Jakarta");
?>
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Transaksi</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Transaksi</li>
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
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/extra-libs/multicheck/multicheck.css">
        <link href="<?php echo base_url(); ?>assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">

        <div class="col-12">
            <div class="card">
                <div class="card-header bg-dark text-white font-weight-bold text-center">Daftar Transaksi</div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <a href="<?php echo base_url(); ?>transaksi/create/new" class="btn btn-success text-white"><i class="mdi mdi-cart-plus"></i> Transaksi Baru</a>
                        <h5><?php echo date("j F Y, G:i");?></h5>
                    </div>
                </div>

                <div class="card-body border-top">
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>Total</th>
                                    <th>Keuntungan</th>
                                    <th>Kasir</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
							$no = 1;
							foreach($transaksi as $data)
							{
							?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $data->tgl_transaksi; ?></td>
                                    <td><?php echo $this->CI->rupiah($data->total); ?></td>
                                    <td>
                                        <?php 
                                        $total = $data->total;
                                        $modal = $data->modal;
                                        $keuntungan = $total-$modal;

                                        echo $this->CI->rupiah($keuntungan);
                                        ?>
                                    </td>
                                    <td><?php echo $data->kasir; ?></td>
                                    <td><?php echo $data->status; ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a class="btn btn-outline-primary btn-sm" style="cursor:pointer; color:blue; font-weight:bold; text-decoration: underline;" onclick="window.open('<?php echo base_url(); ?>transaksi/struk/<?php echo $data->kd_transaksi; ?>','Cetak Struk','width=600,height=900,toolbar=no,location=no,directories=no,status=no,menubar=no, scrollbars=no,resizable=yes,copyhistory=no')"><i class="mdi mdi-printer"></i></a>
                                            <a class="btn btn-outline-success btn-sm" href="<?php echo base_url(); ?>transaksi/edit/<?php echo $data->kd_transaksi; ?>"><i class="mdi mdi-pencil"></i></a>
                                            <a class="btn btn-outline-danger btn-sm" onclick="return confirm('Hapus data berikut?')" href="<?php echo base_url(); ?>transaksi/delete/<?php echo $data->kd_transaksi; ?>"><i class="mdi mdi-delete"></i></a>
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