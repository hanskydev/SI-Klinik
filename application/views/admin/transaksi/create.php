<title>SI Klinik - Buat Transaksi</title>

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/libs/select2/dist/css/select2.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/extra-libs/multicheck/multicheck.css">
<link href="<?php echo base_url(); ?>assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">

<?php
date_default_timezone_set("Asia/Jakarta");
if (empty($transaksi->kd_transaksi)){
    redirect(base_url("transaksi?msg=transaction_error"));
}
?>

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Buat Transaksi</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo base_url('transaksi'); ?>">Transaksi</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Buat Transaksi</li>
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
                    <div class="card-header bg-dark text-white font-weight-bold text-center">Buat Transaksi</div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <td><b>Tanggal</b></td>
                                <td><input type="text" readonly="readonly" class="form-control" value="<?php echo date("j F Y, G:i");?>" name="tgl"></td>
                            </tr>
                        </table>
                        <div class="form-group row">
                            <label class="col-md-12">Tambah Item Baru</label>
                            <div class="col-md-12">
                                <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" name="item" id="item" required>
                                    <option>Pilih</option>
                                    <optgroup label="Obat">
                                        <?php foreach($obat as $obat) : ?>
                                        <option kode="<?php echo $obat->kd_obat;?>" item="<?php echo $obat->nm_obat;?>" harga="<?php echo $obat->harga_jual;?>" modal="<?php echo $obat->harga_modal;?>"><?php echo $obat->nm_obat; ?></option>
                                        <?php endforeach; ?>
                                    </optgroup>
                                    <optgroup label="Layanan">
                                        <?php foreach($layanan as $layanan) : ?>
                                        <option kode="<?php echo $layanan->kd_layanan;?>" item="<?php echo $layanan->nm_layanan;?>" harga="<?php echo $layanan->biaya;?>" modal="<?php echo $layanan->biaya;?>"><?php echo $layanan->nm_layanan; ?></option>
                                        <?php endforeach; ?>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>transaksi/additem">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <input type="hidden" class="form-control" name="kd_transaksi" id="kd_transaksi" value="<?php echo $transaksi->kd_transaksi;?>" required>
                                    <input type="text" class="form-control" name="item_baru" id="item_baru" placeholder="Nama Item" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="item_harga" id="item_harga" placeholder="Harga Satuan" onkeypress='validate(event)' required>
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
                                    <input type="hidden" class="form-control" name="item_modal" id="item_modal" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="d-flex justify-content-between">
                                    <a onclick="return confirm('Hapus semua item berikut?')" href="<?php echo base_url(); ?>transaksi/clearitem/<?php echo $transaksi->kd_transaksi; ?>" class="btn btn-danger text-white"><i class="mdi mdi-cart-outline"></i> Kosongkan Keranjang</a>
                                    <button type="submit" class="btn btn-success text-white"><i class="mdi mdi-cart-plus"></i> Tambahkan Item</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="border-top"></div>
                    <div class="card-body">
                        <h4>Daftar Item</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover text-center">
                                <thead>
                                    <tr>
                                        <th>Item</th>
                                        <th>Harga Satuan</th>
                                        <th>Jumlah</th>
                                        <th>Total</th>
                                        <th><i class="mdi mdi-settings mdi-18px"></i></th>
                                    </tr>
                                </thead>
                                <?php 
                                if (empty($item)){
                                    echo '<td colspan="5">Tidak ada item</td>';
                                }
							    $no = 1;
                                $total_item = 0;
                                $total_modal = 0;
							    foreach($item as $item)
							    {
							    ?>
                                <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>transaksi/updateitem">
                                <tr>
                                    <td><?php echo $item->nm_item; ?></td>
                                    <td><?php echo $this->CI->rupiah($item->harga); ?></td>
                                    <td>
                                            <input type="hidden" class="form-control" name="kd_transaksi" id="kd_transaksi" value="<?php echo $transaksi->kd_transaksi;?>" required>
                                            <input type="hidden" class="form-control" name="kd_item" id="kd_item" value="<?php echo $item->kd_item; ?>" required>
                                            <input type="number" class="form-control" name="item_jumlah" id="item_jumlah" value="<?php echo $item->jumlah; ?>" required>
                                    </td>
                                    <td>
                                        <?php
                                        $harga = $item->harga;
                                        $jumlah = $item->jumlah;
                                        $total = $harga*$jumlah;
                                        $modal = $item->modal*$jumlah;

                                        echo $this->CI->rupiah($total);
                                        ?>
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-success text-white"><i class="mdi mdi-check"></i></button>
                                        <a onclick="return confirm('Hapus item berikut?')" href="<?php echo base_url(); ?>transaksi/deleteitem/<?php echo $transaksi->kd_transaksi; ?>/<?php echo $item->kd_item; ?>" class="btn btn-danger text-white"><i class="mdi mdi-delete"></i></a>
                                    </td>
                                </tr>
                                </form>
                                <?php
                                $no++;
                                $total_item += $total;
                                $total_modal += $modal;
							    }
							    ?>
                            </table>
                        </div>
                    </div>
                    <div class="border-top"></div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>transaksi/update">
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Total</label>
                                    <input type="hidden" class="form-control" name="kd_transaksi" id="kd_transaksi" value="<?php echo $transaksi->kd_transaksi;?>" required>
                                    <input type="hidden" class="form-control" name="tgl_transaksi" id="tgl_transaksi" value="<?php echo date("j F Y, G:i");?>">
                                    <input type="text" class="form-control" name="total" id="total" value="<?php echo $total_item; ?>" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label>Bayar</label>
                                    <input type="text" class="form-control" name="bayar" id="bayar" value="<?php if (isset($transaksi->bayar)) {  echo $transaksi->bayar;};?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Kasir</label>
                                    <input type="hidden" class="form-control" name="modal" id="modal" value="<?php echo $total_modal; ?>" required>
                                    <input type="text" class="form-control" name="kasir" id="kasir" value="<?php echo $this->session->userdata("username"); ?>" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label>Kembalian</label>
                                    <input type="text" class="form-control" name="kembalian" id="kembalian" value="<?php if (isset($transaksi->kembalian)) {  echo $transaksi->kembalian;};?>">
                                </div>
                            </div>
                        </div>
                        <div class="border-top"></div>
                        <div class="card-body">
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-success text-white">Proses</button>
                            </div>
                        </div>
                    </form>
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
        //Item
        $('#item').on('change', function() {
            var item = $(this).find(":selected").attr("item");
            var harga = $(this).find(":selected").attr("harga");
            var modal = $(this).find(":selected").attr("modal");
            $('#item_baru').val(item);
            $('#item_harga').val(harga);
            $('#item_modal').val(modal);
        });
        /// Transaksi
        $("#total, #bayar").keyup(function() {
            var total  = $("#total").val();
            var bayar = $("#bayar").val();

            var kembalian = parseInt(bayar) - parseInt(total);
            $("#kembalian").val(kembalian);
        });

        // $(window).bind('beforeunload', function() {
        //     return 'Are you sure you want to leave?';
        // });
    </script>