<title>SI Klinik - Admin</title>
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Admin</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Admin</li>
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

    <style>
        body {
            background: #eeeeee
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #BA68C8
        }

        .profile-button {
            background: #BA68C8;
            box-shadow: none;
            border: none
        }

        .profile-button:hover {
            background: #682773
        }

        .profile-button:focus {
            background: #682773;
            box-shadow: none
        }

        .back:hover {
            color: #682773;
            cursor: pointer
        }
    </style>

    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Main  -->
        <!-- ============================================================== -->

        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/extra-libs/multicheck/multicheck.css">
        <link href="<?php echo base_url(); ?>assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Daftar Admin</h5>
                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-success btn-sm text-white rounded-pill"><i class="mdi mdi-account-circle"></i> <?php echo $this->session->userdata("username"); ?></button>
                            <button type="button" class="btn btn-success btn-sm text-white" data-bs-toggle="modal" data-bs-target="#Modal"><i class="mdi mdi-account-plus"></i> Tambah Admin</button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover mt-3">
                                <thead class="thead-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Nama</th>
                                        <th>Foto Profil</th>
                                        <th>Terakhir Diubah</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
							        $no = 1;
							        foreach($admin as $data)
							        {
							        ?>
                                    <tr>
                                        <td><?php echo $no ?></td>
                                        <td><?php echo $data->username; ?></td>
                                        <td><?php echo $data->email; ?></td>
                                        <td><?php echo $data->nama; ?></td>
                                        <td><img class="rounded-circle" src="<?php echo base_url($data->image); ?>" width="50" height="50"></td>
                                        <td><?php echo date('d-m-Y H:i',strtotime($data->last_edit)); ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#Modal<?php echo $no; ?>"><i class="mdi mdi-pencil"></i></a>
                                                <a class="btn btn-outline-danger btn-sm" onclick="return confirm('Hapus data berikut?')" href="<?php echo base_url(); ?>admin/delete/<?php echo $data->username; ?>"><i class="mdi mdi-delete"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Modal Edit -->
                                    <div class="modal fade" id="Modal<?php echo $no; ?>" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="ModalLabel">Edit Profile <?php echo $data->nama; ?></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>auth/update">
                                                    <div class="modal-body">
                                                        <div class="container rounded bg-white">
                                                            <div class="row">
                                                                <div class="col-md-4 border-end">
                                                                    <div class="d-flex flex-column align-items-center text-center">
                                                                        <img class="rounded-circle border border-3 mt-5" src="<?php echo base_url($data->image); ?>" width="150">
                                                                        <span class="font-weight-bold"><?php echo $data->nama; ?></span>
                                                                        <span class="text-black-75"><?php echo $data->email; ?></span>
                                                                        <span class="text-black-50">Terakhir Diubah</span>
                                                                        <span class="text-black-50"><?php echo date('d-m-Y H:i',strtotime($data->last_edit)); ?></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="form-group row">
                                                                        <div class="col-md-12">
                                                                            <label>Username</label>
                                                                            <input type="text" class="form-control" name="username" value="<?php echo $data->username; ?>" readonly>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <div class="col-md-12">
                                                                            <label>Nama</label>
                                                                            <input type="text" class="form-control" name="nama" value="<?php echo $data->nama; ?>" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <div class="col-md-12">
                                                                            <label>Email</label>
                                                                            <input type="email" class="form-control" name="email" value="<?php echo $data->email; ?>" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <div class="col-md-6"><label>Password</label><input type="password" class="form-control" name="password"></div>
                                                                        <div class="col-md-6"><label>Konfirmasi Password</label><input type="password" class="form-control" name="repassword"></div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <div class="col-md-12">
                                                                            <label for="formFile" class="form-label">Upload Foto Profil</label>
                                                                            <input class="form-control" type="file" name="image">
                                                                            <small>Maks file 1mb, tipe (gif,jpg,png)</small>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer d-flex justify-content-between align-items-center">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    $no++;
							        }
							        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Add -->
        <div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel">Tambah Admin</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>auth/register">
                        <div class="modal-body">
                            <div class="container rounded bg-white">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label>Username</label>
                                                <input type="text" class="form-control" name="username" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label>Nama</label>
                                                <input type="text" class="form-control" name="nama" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label>Email</label>
                                                <input type="email" class="form-control" name="email" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6"><label>Password</label><input type="password" class="form-control" name="password" required></div>
                                            <div class="col-md-6"><label>Konfirmasi Password</label><input type="password" class="form-control" name="repassword" required></div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="formFile" class="form-label">Upload Foto Profil</label>
                                                <input class="form-control" type="file" name="image">
                                                <small>Maks file 1mb, tipe (gif,jpg,png)</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-between align-items-center">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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

    <script src="assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
    <script src="assets/extra-libs/multicheck/jquery.multicheck.js"></script>
    <script src="assets/extra-libs/DataTables/datatables.min.js"></script>
    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable();
    </script>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->