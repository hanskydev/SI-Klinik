<title>SI Klinik - Penyakit</title>
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Penyakit</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Penyakit</li>
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
            <div class="col-md-4">
                <div class="card" id="create">
                    <div class="card-header bg-dark text-white font-weight-bold text-center">Tambah Data Penyakit</div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>penyakit/save">
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-md-12">Nama Penyakit</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="nama" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-12">Kode ICD <small class="text-muted">(Klasifikasi Penyakit Internasional)</small></label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="kd_icd" required>
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
                <div class="card" id="update">
                    <div class="card-header bg-dark text-white font-weight-bold text-center">Perbarui Data Penyakit</div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>penyakit/update">
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-md-12">Nama Penyakit</label>
                                <div class="col-md-12">
                                    <input type="hidden" class="form-control" name="kd_penyakit" id="kd_penyakit" required>
                                    <input type="text" class="form-control" name="nama" id="nama" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-12">Kode ICD <small class="text-muted">(Klasifikasi Penyakit Internasional)</small></label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="kd_icd" id="kd_icd" required>
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
                    <button class="btn btn-success text-white" id="add">Pindah Tambah Data</button>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-dark text-white font-weight-bold text-center">Daftar Penyakit</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Penyakit</th>
                                        <th>Kode ICD</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
							        $no = 1;
							        foreach($penyakit as $data)
							        {
							        ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data->nm_penyakit; ?></td>
                                        <td><?php echo $data->kd_icd; ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-outline-success btn-sm edit" kode="<?php echo $data->kd_penyakit;?>" nama="<?php echo $data->nm_penyakit;?>" icd="<?php echo $data->kd_icd;?>"><i class="mdi mdi-pencil"></i></a>
                                                <a class="btn btn-outline-danger btn-sm" onclick="return confirm('Hapus data berikut?')" href="<?php echo base_url(); ?>penyakit/delete/<?php echo $data->kd_penyakit; ?>"><i class="mdi mdi-delete"></i></a>
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
        $(document).ready(function(){
            $("#update").hide();

            $("#add").click(function(){
                $("#create").show();
                $("#update").hide();
            });

            $(".edit").click(function(){
                $("#create").hide();
                $("#update").show();
            });
        });
        $('.edit').on('click', function() {
            var kode = $(this).attr("kode");
            var nama = $(this).attr("nama");
            var icd = $(this).attr("icd");
            $('#kd_penyakit').val(kode);
            $('#nama').val(nama);
            $('#kd_icd').val(icd);
        });
    </script>