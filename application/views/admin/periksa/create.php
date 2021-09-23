<title>SI Klinik - Periksa Pasien</title>

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
                <h4 class="page-title">Periksa Pasien</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo base_url('periksa'); ?>">Periksa</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Periksa Pasien</li>
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
        <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>periksa/save">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-dark text-white font-weight-bold text-center">Pasien</div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-md-3">Pasien</label>
                                <div class="col-md-9">
                                    <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" name="pasien" id="pasien" required>
                                        <option>Pilih</option>
                                        <?php foreach($pasien as $pasien) : ?>
                                        <option kd_pasien="<?php echo $pasien->kd_pasien;?>" pasien="<?php echo $pasien->nm_pasien;?>" no_pasien="<?php echo $pasien->no_pasien;?>" jekel_pasien="<?php echo $pasien->jns_kelamin;?>" tgl_pasien="<?php echo $pasien->tgl_lahir;?>" goldarah_pasien="<?php echo $pasien->gol_darah;?>"><?php echo $pasien->nm_pasien; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3">Nama Pasien</label>
                                <div class="col-md-9">
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
                                <label class="col-md-3">Jenis Kelamin</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="jekel_pasien" id="jekel_pasien" readonly required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3">Tanggal Lahir</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="tgl_pasien" id="tgl_pasien" readonly required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3">Golongan Darah</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="goldarah_pasien" id="goldarah_pasien" readonly required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-dark text-white font-weight-bold text-center">Dokter</div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-md-3">Dokter</label>
                                <div class="col-md-9">
                                    <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" name="dokter" id="dokter" required>
                                        <option>Pilih</option>
                                        <?php foreach($dokter as $dokter) : ?>
                                        <option kd_dokter="<?php echo $dokter->kd_dokter;?>" dokter="<?php echo $dokter->nm_dokter;?>" spesialis="<?php echo $dokter->spesialis;?>"><?php echo $dokter->nm_dokter; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3">Nama Dokter</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="nm_dokter" id="nm_dokter" readonly required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3">Spesialis</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="spesialis" id="spesialis" readonly required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3">Tanggal Periksa</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="datepicker-autoclose" placeholder="dd/mm/yyyy" name="tanggal_periksa" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text h-100"><i class="fa fa-calendar"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Keluhan Pasien</h4>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input type="hidden" class="form-control" name="kd_pasien" id="kd_pasien" required>
                                    <input type="hidden" class="form-control" name="kd_dokter" id="kd_dokter" required>
                                    <textarea class="form-control" name="keluhan" rows="5" required></textarea>
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
                        </div>
                    </div>
                </div>
        </form>
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
    $('#pasien').on('change', function() {
        var kd_pasien = $(this).find(":selected").attr("kd_pasien");
        var pasien = $(this).find(":selected").attr("pasien");
        var no_pasien = $(this).find(":selected").attr("no_pasien");
        var jekel_pasien = $(this).find(":selected").attr("jekel_pasien");
        var tgl_pasien = $(this).find(":selected").attr("tgl_pasien");
        var goldarah_pasien = $(this).find(":selected").attr("goldarah_pasien");
        $('#kd_pasien').val(kd_pasien);
        $('#nm_pasien').val(pasien);
        $('#no_pasien').val(no_pasien);
        $('#jekel_pasien').val(jekel_pasien);
        $('#tgl_pasien').val(tgl_pasien);
        $('#goldarah_pasien').val(goldarah_pasien);
    });
    $('#dokter').on('change', function() {
        var kd_dokter = $(this).find(":selected").attr("kd_dokter");
        var dokter = $(this).find(":selected").attr("dokter");
        var spesialis = $(this).find(":selected").attr("spesialis");
        $('#kd_dokter').val(kd_dokter);
        $('#nm_dokter').val(dokter);
        $('#spesialis').val(spesialis);
    });
</script>