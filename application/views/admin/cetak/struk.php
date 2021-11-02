<html>

<head>
    <title>Struk Transaksi</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>assets/images/favicon.png">
    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>dist/css/style.min.css" rel="stylesheet">
    <script src="<?php echo base_url(); ?>assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url(); ?>assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body style="font-family:tahoma; font-size:8pt;" onload="javascript:window.print()">
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Main  -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <span style="font-size:12pt"><b>Sistem Informasi Klinik</b></span></br>
                        <div class="d-flex justify-content-between">
                            <div style="text-align:left;">
                                Jln. Khatib Sulaiman no 1, Padang, Sumatera Barat, Indonesia</br>
                                Telp : 0751-12345</div>
                            <div style="text-align:right;">Kasir : <?php echo $transaksi->kasir; ?></br>
                                Tanggal : <?php echo $transaksi->tgl_transaksi; ?></br></div>
                        </div>
                    </div>
                    <div class="table-responsive border-top">
                        <table class="table table-sm table-borderless table-hover text-center">
                            <thead class="border-bottom">
                                <tr>
                                    <th><b><u>Item</u></b></th>
                                    <th><b><u>Qty</u></b></th>
                                    <th><b><u>Subtotal</u></b></th>
                                </tr>
                            </thead>
                            <?php 
                            if (empty($item)){
                                echo '<td colspan="4">Tidak ada item</td>';
                            }
							$no = 1;
                            $total_item = 0;
                            $total_modal = 0;
							foreach($item as $item)
							{
							?>
                            <tr>
                                <td style="text-align:left;"><?php echo $item->nm_item; ?></td>
                                <td><?php echo $item->jumlah; ?></td>
                                <td>
                                    <?php
                                    $harga = $item->harga;
                                    $jumlah = $item->jumlah;
                                    $total = $harga*$jumlah;
                                    echo $this->CI->rupiah($total);
                                    ?>
                                </td>
                            </tr>
                            <?php
                            $no++;
                            $total_item += $total;
							}
							?>
                            <tr>
                                <td class="border-top" colspan="1"></td>
                                <td class="border-top">
                                    <h6>Total</h6>
                                </td>
                                <td class="border-top"><?php echo $this->CI->rupiah($total_item); ?></td>
                            </tr>
                            <tr>
                                <td colspan="1"></td>
                                <td>
                                    <h6>Bayar</h6>
                                </td>
                                <td><?php echo $this->CI->rupiah($transaksi->bayar); ?></td>
                            </tr>
                            <tr>
                                <td colspan="1"></td>
                                <td>
                                    <h6>Kembalian</h6>
                                </td>
                                <td><?php echo $this->CI->rupiah($transaksi->kembalian); ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center">
                        <span>Terima kasih telah mengunjungi klinik kami :)</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>