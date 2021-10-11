<?php
$active_user = $this->session->userdata("nama");
$msg = isset($_GET['msg']) ? $_GET['msg'] : '';
if ($msg==null) {
	return;
}
else if ($msg=='login') {
	echo "<script> 
	toastr.success('Selamat datang $active_user', 'Berhasil!');
    </script>
    ";
}
else if ($msg=='login_info') {
	echo "<script> 
	toastr.info('Anda telah login', 'Info!');
    </script>
    ";
}
else if ($msg=='login_error') {
	echo "<script> 
	toastr.error('Pengguna tidak ditemukan', 'Gagal!');
    </script>
    ";
}
else if ($msg=='login_form') {
	echo "<script> 
	toastr.warning('Cek kembali data username dan password anda', 'Gagal!');
    </script>
    ";
}
else if ($msg=='login_warning') {
	echo "<script> 
	toastr.warning('Harap login terlebih dahulu', 'Peringatan!');
    </script>
    ";
}
else if ($msg=='logout') {
	echo "<script> 
	toastr.success('Anda telah logout dari sistem', 'Berhasil!');
    </script>
    ";
}
else if ($msg=='input_success') {
	echo "<script> 
	toastr.success('Data berhasil ditambahkan', 'Berhasil!');
    </script>
    ";
}
else if ($msg=='input_error') {
	echo "<script> 
	toastr.warning('Data tidak valid', 'Peringatan!');
    </script>
    ";
}
else if ($msg=='edit_success') {
	echo "<script> 
	toastr.success('Data berhasil diperbarui', 'Berhasil!');
    </script>
    ";
}
else if ($msg=='edit_error') {
	echo "<script> 
	toastr.warning('Perubahan data tidak valid', 'Peringatan!');
    </script>
    ";
}
else if ($msg=='delete_success') {
	echo "<script> 
	toastr.success('Data berhasil dihapus', 'Berhasil!');
    </script>
    ";
}
else if ($msg=='set_done') {
	echo "<script> 
	toastr.info('Kunjungan ditandai selesai', 'Ditandai!');
    </script>
    ";
}
else if ($msg=='set_wait') {
	echo "<script> 
	toastr.info('Kunjungan ditandai menunggu', 'Ditandai!');
    </script>
    ";
}
else if ($msg=='diagnosa') {
	echo "<script> 
	toastr.success('Data diagnosa berhasil diperbarui', 'Berhasil!');
    </script>
    ";
}
else if ($msg=='item_success') {
	echo "<script> 
	toastr.success('Item berhasil ditambahkan', 'Berhasil!');
    </script>
    ";
}
else if ($msg=='item_error') {
	echo "<script> 
	toastr.warning('Item tidak valid', 'Peringatan!');
    </script>
    ";
}
else if ($msg=='item_update') {
	echo "<script> 
	toastr.success('Item berhasil diperbarui', 'Berhasil!');
    </script>
    ";
}
else if ($msg=='item_delete') {
	echo "<script> 
	toastr.success('Item berhasil dihapus', 'Berhasil!');
    </script>
    ";
}
else if ($msg=='transaction_new') {
	echo "<script> 
	toastr.success('Transaksi dibuat', 'Berhasil!');
    </script>
    ";
}
else if ($msg=='transaction_success') {
	echo "<script> 
	toastr.success('Transaksi selesai', 'Berhasil!');
    </script>
    ";
}
else if ($msg=='transaction_delete') {
	echo "<script> 
	toastr.success('Transaksi berhasil dihapus', 'Berhasil!');
    </script>
    ";
}
else if ($msg=='transaction_error') {
	echo "<script> 
	toastr.warning('Transaksi tidak valid atau gagal', 'Peringatan!');
    </script>
    ";
}
else {
    echo "<script> 
	toastr.error('Pesan tidak ditemukan', 'Error!');
    </script>
    ";
}
?>