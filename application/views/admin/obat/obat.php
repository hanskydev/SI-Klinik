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

        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/extra-libs/multicheck/multicheck.css">
        <link href="<?php echo base_url(); ?>assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">

        <div class="col-12">
            <div class="card">
                <div class="card-header bg-dark text-white font-weight-bold text-center">Daftar Obat</div>
                <div class="card-body">
                    <button type="button" class="btn btn-success btn-sm text-white mb-3" data-bs-toggle="modal" data-bs-target="#Modal"><i class="mdi mdi-flask-empty"></i> Tambah Obat</button>
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
                                    <td><?php echo $this->CI->rupiah($data->harga_modal); ?></td>
                                    <td><?php echo $this->CI->rupiah($data->harga_jual); ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a class="btn btn-outline-success btn-sm" href="<?php echo base_url(); ?>obat/edit/<?php echo $data->kd_obat; ?>"><i class="mdi mdi-pencil"></i></a>
                                            <a class="btn btn-outline-danger btn-sm" onclick="return confirm('Hapus data berikut?')" href="<?php echo base_url(); ?>obat/delete/<?php echo $data->kd_obat; ?>"><i class="mdi mdi-delete"></i></a>
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
        <!-- Modal Add -->
        <div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel">Tambah Obat</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>obat/save">
                        <div class="modal-body">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-md-3">Nama Obat</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="nama" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3">Deskripsi</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control" name="deskripsi" rows="5" required></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3">Stok</label>
                                    <div class="col-md-9">
                                        <input type="number" class="form-control" name="stok" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3">Harga Modal</label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon2">Rp</span>
                                            </div>
                                            <input type="text" class="form-control" name="harga_modal" maxlength="20" onkeypress='validate(event)' aria-describedby="basic-addon2" required>
                                        </div>
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
                                <div class="form-group row">
                                    <label class="col-md-3">Harga Jual</label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon2">Rp</span>
                                            </div>
                                            <input type="text" class="form-control" name="harga_jual" maxlength="20" onkeypress='validate(event)' aria-describedby="basic-addon2" required>
                                        </div>
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
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-between align-items-center">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
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
    </script>