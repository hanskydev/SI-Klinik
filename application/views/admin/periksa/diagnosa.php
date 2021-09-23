<title>SI Klinik - Diagnosa Pasien</title>
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Diagnosa Pasien <?php echo $periksa->nm_pasien; ?></h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo base_url('periksa'); ?>">Periksa</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Diagnosa Pasien</li>
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

        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/libs/select2/dist/css/select2.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/extra-libs/multicheck/multicheck.css">
        <link href="<?php echo base_url(); ?>assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-dark text-white font-weight-bold text-center">Biodata Pasien</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <tr>
                                    <th>Nama Pasien</th>
                                    <td><?php echo $periksa->nm_pasien; ?></td>
                                </tr>
                                <tr>
                                    <th>Nomor Pasien</th>
                                    <td><?php echo $periksa->no_pasien; ?></td>
                                </tr>
                                <tr>
                                    <th>Nomor Identitas</th>
                                    <td><?php echo $periksa->no_identitas; ?></td>
                                </tr>
                                <tr>
                                    <th>Jenis Kelamin</th>
                                    <td><?php echo $periksa->jns_kelamin; ?></td>
                                </tr>
                                <tr>
                                    <th>Tanggal Lahir</th>
                                    <td><?php echo $periksa->tgl_lahir; ?></td>
                                </tr>
                                <tr>
                                    <th>Golongan Darah</th>
                                    <td><?php echo $periksa->gol_darah; ?></td>
                                </tr>
                                <tr>
                                    <th>Nomor Telepon</th>
                                    <td><?php echo $periksa->no_telepon; ?></td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td><?php echo $periksa->alamat; ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="d-flex justify-content-around">
                            <a href="<?php echo base_url(); ?>pasien/edit/<?php echo $periksa->kd_pasien; ?>" class="btn btn-success text-white"><i class="mdi mdi-account-edit"></i> Edit Data</a>
                            <a onclick="return confirm('Hapus data berikut?')" href="<?php echo base_url(); ?>periksa/delete/<?php echo $periksa->kd_periksa; ?>" class="btn btn-danger text-white"><i class="mdi mdi-delete"></i> Hapus Data</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-dark text-white font-weight-bold text-center">Dokter Pemeriksa</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <tr>
                                    <th>Nama Dokter</th>
                                    <td><?php echo $periksa->nm_dokter; ?></td>
                                </tr>
                                <tr>
                                    <th>Spesialis</th>
                                    <td><?php echo $periksa->spesialis; ?></td>
                                </tr>
                                <tr>
                                    <th>Tanggal Periksa</th>
                                    <td><?php echo $periksa->tgl_periksa; ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header bg-dark text-white font-weight-bold text-center">Keluhan</div>
                    <div class="card-body">
                        <h4>Rincian Keluhan</h4>
                        <p><?php echo $periksa->keluhan; ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="card" id="list">
                    <div class="card-header bg-dark text-white font-weight-bold text-center">Diagnosa Penyakit</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <tr>
                                    <th>Nama Penyakit</th>
                                    <td><?php 
                                    if (is_null($get_penyakit)){
                                        echo "Tidak ada data";
                                    }else{
                                        echo $get_penyakit->nm_penyakit;
                                    }
                                    ?></td>
                                </tr>
                                <tr>
                                    <th>Kode ICD</th>
                                    <td><?php 
                                    if (is_null($get_penyakit)){
                                        echo "Tidak ada data";
                                    }else{
                                        echo $get_penyakit->kd_icd;
                                    }
                                    ?></td>
                                </tr>
                                <tr>
                                    <th>Layanan</th>
                                    <td><?php 
                                    if (is_null($get_layanan)){
                                        echo "Tidak ada data";
                                    }else{
                                        echo $get_layanan->nm_layanan;
                                    }
                                    ?></td>
                                </tr>
                                <tr>
                                    <th>Biaya Layanan</th>
                                    <td><?php 
                                    if (is_null($get_layanan)){
                                        echo "Tidak ada data";
                                    }else{
                                        echo $this->CI->rupiah($get_layanan->biaya);
                                    }
                                    ?></td>
                                </tr>
                            </table>
                            <div class="d-flex justify-content-center">
                                <button class="btn btn-success text-white" id="edit"><i class="mdi mdi-pencil"></i> Edit Data</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card" id="update">
                    <div class="card-header bg-dark text-white font-weight-bold text-center">Diagnosa Penyakit</div>
                    <div class="card-body">
                        <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>periksa/proses">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label>Penyakit</label>
                                    <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" name="penyakit" id="penyakit" required>
                                        <option>Pilih</option>
                                        <?php foreach($penyakit as $penyakit) : ?>
                                        <option kd_penyakit="<?php echo $penyakit->kd_penyakit;?>" penyakit="<?php echo $penyakit->nm_penyakit;?>" kd_icd="<?php echo $penyakit->kd_icd;?>"><?php echo $penyakit->nm_penyakit; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label>Nama Penyakit</label>
                                    <input type="text" class="form-control" name="nm_penyakit" id="nm_penyakit" readonly required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label>Kode ICD</label>
                                    <input type="text" class="form-control" name="kd_icd" id="kd_icd" readonly required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label>Layanan</label>
                                    <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" name="layanan" id="layanan" required>
                                        <option>Pilih</option>
                                        <?php foreach($layanan as $layanan) : ?>
                                        <option kd_layanan="<?php echo $layanan->kd_layanan;?>" layanan="<?php echo $layanan->nm_layanan;?>" biaya_layanan="<?php echo $this->CI->rupiah($layanan->biaya);?>"><?php echo $layanan->nm_layanan; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label>Biaya Layanan</label>
                                    <input type="text" class="form-control" name="biaya_layanan" id="biaya_layanan" readonly required>
                                </div>
                            </div>
                            <input type="hidden" class="form-control" name="kd_periksa" id="kd_periksa" value="<?php echo $periksa->kd_periksa;?>" required>
                            <input type="hidden" class="form-control" name="kd_penyakit" id="kd_penyakit" required>
                            <input type="hidden" class="form-control" name="kd_layanan" id="kd_layanan" required>
                    </div>
                    <div class="card-body border-top">
                        <div class="d-flex justify-content-between">
                            <button type="reset" class="btn btn-warning">Reset</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                    </form>
                    <button class="btn btn-success text-white" id="back">Kembali</button>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-dark text-white font-weight-bold text-center">Resep Obat</div>
                    <div class="card-body">
                        <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>periksa/save">

                        </form>
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
    <script src="<?php echo base_url(); ?>assets/libs/select2/dist/js/select2.full.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/libs/select2/dist/js/select2.min.js"></script>
    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable();
        //***********************************//
        // For select 2
        //***********************************//
        $(".select2").select2();
        //Penyakit
        $('#penyakit').on('change', function() {
            var kd_penyakit = $(this).find(":selected").attr("kd_penyakit");
            var penyakit = $(this).find(":selected").attr("penyakit");
            var kd_icd = $(this).find(":selected").attr("kd_icd");
            $('#kd_penyakit').val(kd_penyakit);
            $('#nm_penyakit').val(penyakit);
            $('#kd_icd').val(kd_icd);
        });
        //Layanan
        $('#layanan').on('change', function() {
            var kd_layanan = $(this).find(":selected").attr("kd_layanan");
            var layanan = $(this).find(":selected").attr("layanan");
            var biaya_layanan = $(this).find(":selected").attr("biaya_layanan");
            $('#kd_layanan').val(kd_layanan);
            $('#biaya_layanan').val(biaya_layanan);
        });
        //Diagnosa
        $(document).ready(function() {
            $("#update").hide();

            $("#edit").click(function() {
                $("#list").hide();
                $("#update").show();
            });
            $("#back").click(function() {
                $("#list").show();
                $("#update").hide();
            });
        });
    </script>