<title>SI Klinik - Detail Pasien</title>
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Detail Pasien <?php echo $pasien->nm_pasien; ?></h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo base_url('pasien'); ?>">Pasien</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail Pasien</li>
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

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-dark text-white font-weight-bold text-center">Biodata Pasien</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <tr>
                                    <th>Nama Pasien</th>
                                    <td><?php echo $pasien->nm_pasien; ?></td>
                                </tr>
                                <tr>
                                    <th>Nomor Pasien</th>
                                    <td><?php echo $pasien->no_pasien; ?></td>
                                </tr>
                                <tr>
                                    <th>Nomor Identitas</th>
                                    <td><?php echo $pasien->no_identitas; ?></td>
                                </tr>
                                <tr>
                                    <th>Jenis Kelamin</th>
                                    <td><?php echo $pasien->jns_kelamin; ?></td>
                                </tr>
                                <tr>
                                    <th>Tanggal Lahir</th>
                                    <td><?php echo $pasien->tgl_lahir; ?></td>
                                </tr>
                                <tr>
                                    <th>Golongan Darah</th>
                                    <td><?php echo $pasien->gol_darah; ?></td>
                                </tr>
                                <tr>
                                    <th>Nomor Telepon</th>
                                    <td><?php echo $pasien->no_telepon; ?></td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td><?php echo $pasien->alamat; ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="d-flex justify-content-around">
                            <a href="<?php echo base_url(); ?>pasien/edit/<?php echo $pasien->kd_pasien; ?>" class="btn btn-success text-white"><i class="mdi mdi-account-edit"></i> Edit Data</a>
                            <a onclick="return confirm('Hapus data berikut?')" href="<?php echo base_url(); ?>pasien/delete/<?php echo $pasien->kd_pasien; ?>" class="btn btn-danger text-white"><i class="mdi mdi-delete"></i> Hapus Data</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="card">
                    <div class="card-header bg-dark text-white font-weight-bold text-center">Kontak Keluarga</div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>pasien/addcontact">
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-md-3">Nama</label>
                                <div class="col-md-9">
                                    <input type="hidden" class="form-control" name="kd_pasien" value="<?php echo $pasien->kd_pasien; ?>" required>
                                    <input type="text" class="form-control" name="nama" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3">Status</label>
                                <div class="col-md-9">
                                    <select class="form-select" name="status">
                                        <option>Ayah</option>
                                        <option>Ibu</option>
                                        <option>Anak</option>
                                        <option>Saudara</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3">Nomor Telepon</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="no_telp" maxlength="13" onkeypress='validate(event)' required>
                                    <script>
                                        function validate(evt) {
                                            var theEvent = evt || window.event;
                                            // Handle paste
                                            if (theEvent.type === 'paste') {
                                                key = event.clipboardData.getData('text/plain');
                                            } else {
                                                // Handle key press
                                                var key = theEvent.keyCode || theEvent.which;
                                                key = String.fromCharCode(key);
                                            }
                                            var regex = /[0-9]|\./;
                                            if (!regex.test(key)) {
                                                theEvent.returnValue = false;
                                                if (theEvent.preventDefault) theEvent.preventDefault();
                                            }
                                        }
                                    </script>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary"><i class="mdi mdi-plus-circle"></i></button>
                            </div>
                        </div>
                    </form>
                    <div class="card-body border-top">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-responsive text-center">
                                <tr>
                                    <th>Nama</th>
                                    <th>Status</th>
                                    <th>Nomor Telepon</th>
                                    <th><i class="mdi mdi-settings mdi-18px"></i></th>
                                </tr>
                                <?php 
                                if (empty($kontak)){
                                    echo '<td colspan="4">Tidak ada kontak</td>';
                                }
							    $no = 1;
							    foreach($kontak as $k)
							    {
							    ?>
                                <tr>
                                    <td><?php echo $k->nm_keluarga; ?></td>
                                    <td><?php echo $k->status_keluarga; ?></td>
                                    <td><?php echo $k->no_kontak; ?></td>
                                    <td><a onclick="return confirm('Hapus data berikut?')" href="<?php echo base_url(); ?>pasien/delcontact/<?php echo $pasien->kd_pasien; ?>/<?php echo $k->kd_keluarga; ?>" class="btn btn-danger text-white"><i class="mdi mdi-delete"></i></a></td>
                                </tr>
                                <?php
                                $no++;
							    }
							    ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-7">
                <div class="card">
                    <div class="card-header bg-dark text-white font-weight-bold text-center">Rekam Medis</div>
                    <div class="card-body">
                        <div class="accordion" id="accordion">
                            <style>
                                .accordion-button:not(.collapsed) {background-color: #fff;}
                            </style>
                        <?php 
                        if (empty($periksa)){
                            echo 'Tidak ada data ditemukan!';
                        }
						$no = 1;
						foreach($periksa as $hasil)
						{
						?>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading<?php echo $no; ?>">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $no; ?>" aria-expanded="true" aria-controls="collapse<?php echo $no; ?>">
                                        <span>Rekam Medis #<?php echo $no; ?> - <?php echo $hasil->tgl_periksa; ?></span>
                                    </button>
                                </h2>
                                <div id="collapse<?php echo $no; ?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo $no; ?>" data-bs-parent="#accordion">
                                    <div class="accordion-body">
                                        <h4>Keluhan</h4>
                                        <p><?php echo $hasil->keluhan; ?></p>
                                        <a href="<?php echo base_url(); ?>diagnosa/<?php echo $hasil->kd_periksa; ?>" target="_blank" class="btn btn-success text-white"><i class="mdi mdi-open-in-new"></i> Periksa Hasil</a>
                                    </div>
                                </div>
                            </div>
                        <?php
                        $no++;
						}
						?>
                        </div>
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