<title>SI Klinik - Kunjungan</title>

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/libs/select2/dist/css/select2.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/libs/jquery-minicolors/jquery.minicolors.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/libs/quill/dist/quill.snow.css">

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Kunjungan</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Kunjungan</li>
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
                    <div class="card-header bg-dark text-white font-weight-bold text-center">Pendaftaran Kunjungan Pasien</div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>kunjungan/save">
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-md-3">Pasien</label>
                                <div class="col-md-9">
                                    <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" name="pasien" id="pasien" required>
                                        <option>Pilih</option>
                                        <?php foreach($pasien as $pasien) : ?>
                                        <option kode="<?php echo $pasien->kd_pasien;?>" nama="<?php echo $pasien->nm_pasien;?>" no="<?php echo $pasien->no_pasien;?>"><?php echo $pasien->nm_pasien; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3">Nama Pasien</label>
                                <div class="col-md-9">
                                    <input type="hidden" class="form-control" name="kd_pasien" id="kd_pasien" required>
                                    <input type="text" class="form-control" name="nm_pasien" id="nm_pasien" readonly required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3">Nomor Pasien</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="no_pasien" id="no_pasien" readonly required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3">Tanggal Pendaftaran</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="datepicker-autoclose" placeholder="dd/mm/yyyy" name="tanggal_daftar" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text h-100"><i class="fa fa-calendar"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3">Tanggal Kunjungan</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="datepicker-autoclose-1" placeholder="dd/mm/yyyy" name="tanggal_kunjungan" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text h-100"><i class="fa fa-calendar"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3">Jam Kunjungan</label>
                                <div class="col-md-9">
                                    <input type="time" class="form-control" name="jam">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3">Status Kunjungan</label>
                                <div class="col-md-9">
                                    <select class="form-select" name="status">
                                        <option>Menunggu</option>
                                        <option>Selesai</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="border-top"></div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <button type="reset" class="btn btn-warning">Reset</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Daftar Kunjungan</h5>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pasien</th>
                                    <th>Tanggal Pendaftaran</th>
                                    <th>Tanggal Kunjungan</th>
                                    <th>Jam</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
							$no = 1;
							foreach($kunjungan as $data)
							{
							?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $data->nm_pasien; ?></td>
                                    <td><?php echo $data->tgl_daftar; ?></td>
                                    <td><?php echo $data->tgl_kunjungan; ?></td>
                                    <td><?php echo $data->jam; ?></td>
                                    <td><?php echo $data->status; ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a class="btn btn-outline-success" href="#"><i class="mdi mdi-check"></i></a>
                                            <a class="btn btn-outline-warning" href="#"><i class="mdi mdi-close"></i></a>
                                            <a class="btn btn-outline-danger" href="#"><i class="mdi mdi-delete"></i></a>
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
    <script src="<?php echo base_url(); ?>assets/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>dist/js/pages/mask/mask.init.js"></script>
    <script src="<?php echo base_url(); ?>assets/libs/select2/dist/js/select2.full.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/libs/select2/dist/js/select2.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/libs/jquery-asColor/dist/jquery-asColor.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/libs/jquery-asGradient/dist/jquery-asGradient.js"></script>
    <script src="<?php echo base_url(); ?>assets/libs/jquery-asColorPicker/dist/jquery-asColorPicker.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/libs/jquery-minicolors/jquery.minicolors.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/libs/quill/dist/quill.min.js"></script>
    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable();
        //***********************************//
        // For select 2
        //***********************************//
        $(".select2").select2();

        /*colorpicker*/
        $('.demo').each(function() {
            //
            // Dear reader, it's actually very easy to initialize MiniColors. For example:
            //
            //  $(selector).minicolors();
            //
            // The way I've done it below is just for the demo, so don't get confused
            // by it. Also, data- attributes aren't supported at this time...they're
            // only used for this demo.
            //
            $(this).minicolors({
                control: $(this).attr('data-control') || 'hue',
                position: $(this).attr('data-position') || 'bottom left',

                change: function(value, opacity) {
                    if (!value) return;
                    if (opacity) value += ', ' + opacity;
                    if (typeof console === 'object') {
                        console.log(value);
                    }
                },
                theme: 'bootstrap'
            });

        });
        /*datepicker*/
        jQuery('.mydatepicker').datepicker();
        jQuery('#datepicker-autoclose').datepicker({
            format: "dd/mm/yyyy",
            autoclose: true,
            todayHighlight: true
        });
        jQuery('#datepicker-autoclose-1').datepicker({
            format: "dd/mm/yyyy",
            autoclose: true,
            todayHighlight: true
        });
        var quill = new Quill('#editor', {
            theme: 'snow'
        });

        $('#pasien').on('change', function() {
            var kode = $(this).find(":selected").attr("kode");
            var nama = $(this).find(":selected").attr("nama");
            var no = $(this).find(":selected").attr("no");
            $('#kd_pasien').val(kode);
            $('#nm_pasien').val(nama);
            $('#no_pasien').val(no);
        });
    </script>