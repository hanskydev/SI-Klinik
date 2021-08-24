<?php
$active_user = $this->session->userdata("username");
$msg = isset($_GET['msg']) ? $_GET['msg'] : '';
if ($msg=='login') {
	echo "<script> 
	toastr.success('Selamat datang $active_user', 'Login Berhasil!');
    </script>
    ";
}
if ($msg=='login_error') {
	echo "<script> 
	toastr.error('Pengguna tidak ditemukan, cek kembali data anda', 'Login Gagal!');
    </script>
    ";
}
if ($msg=='login_warning') {
	echo "<script> 
	toastr.warning('Harap login terlebih dahulu', 'Peringatan!');
    </script>
    ";
}
if ($msg=='logout') {
	echo "<script> 
	toastr.success('Anda telah keluar dengan aman', 'Logout Berhasil!');
    </script>
    ";
}
?>