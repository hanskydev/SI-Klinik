<title>SI Klinik - Edit Obat</title>

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
                <h4 class="page-title">Edit Obat</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo base_url('obat'); ?>">Obat</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Obat</li>
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
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-dark text-white font-weight-bold text-center">Perbarui Data Informasi Obat</div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>obat/update">
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-md-3">Nama Obat</label>
                                <div class="col-md-9">
                                    <input type="hidden" class="form-control" name="kd_obat" value="<?php echo $obat->kd_obat; ?>" required>
                                    <input type="text" class="form-control" name="nama" value="<?php echo $obat->nm_obat; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3">Deskripsi</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" name="deskripsi" rows="5" required><?php echo $obat->deskripsi; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3">Stok</label>
                                <div class="col-md-9">
                                    <input type="number" class="form-control" name="stok" value="<?php echo $obat->stok; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3">Harga Modal</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon2">Rp</span>
                                        </div>
                                        <input type="text" class="form-control" name="harga_modal" maxlength="20" onkeypress='validate(event)' value="<?php echo $obat->harga_modal; ?>" aria-describedby="basic-addon2" required>
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
                                        <input type="text" class="form-control" name="harga_jual" maxlength="20" onkeypress='validate(event)' value="<?php echo $obat->harga_jual; ?>" aria-describedby="basic-addon2" required>
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
                        <div class="border-top">
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
        <!-- ============================================================== -->
        <!-- End Main -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
</div>
<!-- This Page JS -->
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
    var quill = new Quill('#editor', {
        theme: 'snow'
    });
</script>