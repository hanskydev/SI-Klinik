<title>SI Klinik - Edit Pasien</title>

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
                <h4 class="page-title">Edit Pasien</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo base_url('pasien'); ?>">Pasien</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Pasien</li>
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
                    <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>pasien/update">
                        <div class="card-body">
                            <h5 class="card-title">Data Informasi Pasien</h5>
                            <br>
                            <div class="form-group row">
                                <label class="col-md-3">Nama Pasien</label>
                                <div class="col-md-9">
                                    <input type="hidden" class="form-control" name="kd_pasien" value="<?php echo $pasien->kd_pasien; ?>" required>
                                    <input type="text" class="form-control" name="nama" value="<?php echo $pasien->nm_pasien; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3">Nomor Pasien</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="no_pasien" value="<?php echo $pasien->no_pasien; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3">Nomor Identitas</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="no_identitas" maxlength="18" onkeypress='validate(event)' value="<?php echo $pasien->no_identitas; ?>" required>
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
                                <label class="col-md-3">Jenis Kelamin</label>
                                <div class="col-md-9">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="customControlValidation1" name="jenis_kelamin" value="Laki-laki" <?php if ($pasien->jns_kelamin=='Laki-laki') echo 'checked'?> required>
                                        <label class="form-check-label mb-0" for="customControlValidation1">Laki-laki</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="customControlValidation2" name="jenis_kelamin" value="Perempuan" <?php if ($pasien->jns_kelamin=='Perempuan') echo 'checked'?> required>
                                        <label class="form-check-label mb-0" for="customControlValidation2">Perempuan</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3">Tanggal Lahir</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="datepicker-autoclose" placeholder="dd/mm/yyyy" name="tanggal_lahir" value="<?php echo $pasien->tgl_lahir; ?>" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text h-100"><i class="fa fa-calendar"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3">Golongan Darah</label>
                                <div class="col-md-9">
                                <select class="form-select" name="gol_darah">
                                    <option <?php if ($pasien->gol_darah=='A') echo 'selected'?>>A</option>
                                    <option <?php if ($pasien->gol_darah=='B') echo 'selected'?>>B</option>
                                    <option <?php if ($pasien->gol_darah=='AB') echo 'selected'?>>AB</option>
                                    <option <?php if ($pasien->gol_darah=='O') echo 'selected'?>>O</option>
                                </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3">Nomor Telepon</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="no_telp" maxlength="13" onkeypress='validate(event)' value="<?php echo $pasien->no_telepon; ?>" required>
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
                                <label class="col-md-3">Alamat</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" name="alamat" rows="3" required><?php echo $pasien->alamat; ?></textarea>
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