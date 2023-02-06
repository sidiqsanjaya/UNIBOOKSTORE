<?php
if (!defined('MyConst')) {
    die('Direct access not permitted');
}
if (debug == FALSE) {
    error_reporting(0);
}
$admin = new admin;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tab = $_GET['t'];
    $mode = $_GET['m'];
    if ($tab == 'buku') {
        if ($mode == 'add') {
            $error = [];
            if (empty($_POST['inidbuku'])) {
                $error['idbuku'] = 'idbuku kosong';
            } else {
                if ($admin->valid($_POST['inidbuku'], 'buku') != 0) {
                    $error['idbuku'] = 'kesamaan id buku';
                } else {
                    $input_idbuku = $_POST['inidbuku'];
                }
            }

            if (empty($_POST['inkategori'])) {
                $error['idkategori'] = 'kategori kosong';
            } else {
                $input_kategori = $_POST['inkategori'];
            }

            if (empty($_POST['innama'])) {
                $error['nama'] = 'nama buku kosong';
            } else {
                $input_nama = $_POST['innama'];
            }
            if (empty($_POST['inharga'])) {
                $error['harga'] = 'harga kosong';
            } elseif (filter_var($_POST['inharga'], FILTER_VALIDATE_INT) == false) {
                $error['harga'] = 'data harga bukan angka';
            } else {
                $input_harga = $_POST['inharga'];
            }
            if (empty($_POST['instok'])) {
                $error['stok'] = 'stok kosong';
            } elseif (filter_var($_POST['instok'], FILTER_VALIDATE_INT) == false) {
                $error['stok'] = 'data stok bukan angka';
            } else {
                $input_stok = $_POST['instok'];
            }

            if (empty($_POST['inpenerbit'])) {
                $error['inpenerbit'] = 'nama penerbit kosong';
            } elseif ($admin->valid($_POST['inpenerbit'], 'penerbit') == 0) {
                $error['inpenerbit'] = 'data penerbit tidak ada';
            } else {
                $input_penerbit = $admin->valid($_POST['inpenerbit'], 'penerbit')['id_penerbit'];
            }

            if (empty($error)) {
                if ($admin->tambahbook($input_idbuku, $input_kategori, $input_nama, $input_harga, $input_stok, $input_penerbit) == 'oke') {
                    echo '<script>alert("Berhasil Menambahkan data buku"); window.location.href = "' . $config[`baseurl`] . '?p=admin";</script>';
                } else {
                    echo '<script>alert("Gagal Menambahkan data buku"); window.location.href = "' . $config[`baseurl`] . '?p=admin";</script>';
                }
            } else {
                echo '<script>alert("data yang diberikan tidak valid"); window.location.href = "' . $config[`baseurl`] . '?p=admin";</script>';
            }
        } elseif ($mode == 'edit') {
            $error = [];
            if (empty($_POST['inidbuku'])) {
                $error['idbuku'] = 'idbuku kosong';
            } else {
                $input_idbuku = $_POST['inidbuku'];
            }


            if (empty($_POST['inkategori'])) {
                $error['idkategori'] = 'kategori kosong';
            } else {
                $input_kategori = $_POST['inkategori'];
            }

            if (empty($_POST['innama'])) {
                $error['nama'] = 'nama buku kosong';
            } else {
                $input_nama = $_POST['innama'];
            }
            if (empty($_POST['inharga'])) {
                $error['harga'] = 'harga kosong';
            } elseif (filter_var($_POST['inharga'], FILTER_VALIDATE_INT) == false) {
                $error['harga'] = 'data harga bukan angka';
            } else {
                $input_harga = $_POST['inharga'];
            }
            if (empty($_POST['instok'])) {
                $error['stok'] = 'stok kosong';
            } elseif (filter_var($_POST['instok'], FILTER_VALIDATE_INT) == false) {
                $error['stok'] = 'data stok bukan angka';
            } else {
                $input_stok = $_POST['instok'];
            }

            if (empty($_POST['inpenerbit'])) {
                $error['inpenerbit'] = 'nama penerbit kosong';
            } elseif ($admin->valid($_POST['inpenerbit'], 'penerbit') == 0) {
                $error['inpenerbit'] = 'data penerbit tidak ada';
            } else {
                $input_penerbit = $admin->valid($_POST['inpenerbit'], 'penerbit')['id_penerbit'];
            }

            if (empty($error)) {
                if ($admin->editbook($input_idbuku, $input_kategori, $input_nama, $input_harga, $input_stok, $input_penerbit) == 'oke') {
                    echo '<script>alert("Berhasil Merubah data buku"); window.location.href = "' . $config[`baseurl`] . '?p=admin";</script>';
                } else {
                    echo '<script>alert("Gagal Merubah data buku"); window.location.href = "' . $config[`baseurl`] . '?p=admin";</script>';
                }
            } else {
                echo '<script>alert("data yang diberikan tidak valid"); window.location.href = "' . $config[`baseurl`] . '?p=admin";</script>';
            }
        } elseif ($mode == 'hapus') {
            $error = [];
            if (empty($_POST['inidbuku'])) {
                $error['idbuku'] = 'idbuku kosong';
            } else {
                $input_idbuku = $_POST['inidbuku'];
            }


            if (empty($_POST['inkategori'])) {
                $error['idkategori'] = 'kategori kosong';
            } else {
                $input_kategori = $_POST['inkategori'];
            }

            if (empty($_POST['innama'])) {
                $error['nama'] = 'nama buku kosong';
            } else {
                $input_nama = $_POST['innama'];
            }
            if (empty($_POST['inharga'])) {
                $error['harga'] = 'harga kosong';
            } elseif (filter_var($_POST['inharga'], FILTER_VALIDATE_INT) == false) {
                $error['harga'] = 'data harga bukan angka';
            } else {
                $input_harga = $_POST['inharga'];
            }
            if (empty($_POST['instok'])) {
                $error['stok'] = 'stok kosong';
            } elseif (filter_var($_POST['instok'], FILTER_VALIDATE_INT) == false) {
                $error['stok'] = 'data stok bukan angka';
            } else {
                $input_stok = $_POST['instok'];
            }

            if (empty($_POST['inpenerbit'])) {
                $error['inpenerbit'] = 'nama penerbit kosong';
            } elseif ($admin->valid($_POST['inpenerbit'], 'penerbit') == 0) {
                $error['inpenerbit'] = 'data penerbit tidak ada';
            } else {
                $input_penerbit = $admin->valid($_POST['inpenerbit'], 'penerbit')['id_penerbit'];
            }

            if (empty($error)) {
                if ($admin->hapusbook($input_idbuku) == 'oke') {
                    echo '<script>alert("Berhasil Menghapus data buku"); window.location.href = "' . $config[`baseurl`] . '?p=admin";</script>';
                } else {
                    echo '<script>alert("Gagal Menghapus data buku"); window.location.href = "' . $config[`baseurl`] . '?p=admin";</script>';
                }
            } else {
                echo '<script>alert("data yang diberikan tidak valid"); window.location.href = "' . $config[`baseurl`] . '?p=admin";</script>';
            }
        } else {
            echo '<script>alert("not found 404"); window.location.href = "' . $config[`baseurl`] . '?p=admin";</script>';
        }
    } elseif ($tab == 'penerbit') {
        if ($mode == 'add') {
            $error = [];
            if (empty($_POST['inpenerbit'])) {
                $error['id_penerbit'] = 'id penerbit kosong';
            } else {
                if ($admin->valid($_POST['inpenerbit'], 'penerbit') != 0) {
                    $error['id_penerbit'] = 'kesamaan id penerbit';
                } else {
                    $input_penerbit = $_POST['inpenerbit'];
                }
            }
            if (empty($_POST['innama'])) {
                $error['id_nama'] = 'Nama Penerbit Kosong';
            } else {
                $input_nama = $_POST['innama'];
            }
            if (empty($_POST['inalamat'])) {
                $error['id_alamat'] = 'Alamat Penerbit Kosong';
            } else {
                $input_alamat = $_POST['inalamat'];
            }
            if (empty($_POST['inkota'])) {
                $error['id_kota'] = 'Kota Penerbit Kosong';
            } else {
                $input_kota = $_POST['inkota'];
            }
            if (empty($_POST['intelepon'])) {
                $error['id_telepon'] = 'Telepon Penerbit Kosong';
            } else {
                $input_telepon = $_POST['intelepon'];
            }

            if (empty($error)) {
                if ($admin->tambahpenerbit($input_penerbit, $input_nama, $input_alamat, $input_kota, $input_telepon) == 'oke') {
                    echo '<script>alert("Berhasil Menambahkan data Penerbit"); window.location.href = "' . $config[`baseurl`] . '?p=admin";</script>';
                } else {
                    echo '<script>alert("Gagal Menambahkan data Penerbit"); window.location.href = "' . $config[`baseurl`] . '?p=admin";</script>';
                }
            } else {
                echo '<script>alert("data yang diberikan tidak valid"); window.location.href = "' . $config[`baseurl`] . '?p=admin";</script>';
            }
        } elseif ($mode == 'edit') {
            $error = [];
            if (empty($_POST['inpenerbit'])) {
                $error['id_penerbit'] = 'id penerbit kosong';
            } else {
                $input_penerbit = $_POST['inpenerbit'];
            }

            if (empty($_POST['innama'])) {
                $error['id_nama'] = 'Nama Penerbit Kosong';
            } else {
                $input_nama = $_POST['innama'];
            }
            if (empty($_POST['inalamat'])) {
                $error['id_alamat'] = 'Alamat Penerbit Kosong';
            } else {
                $input_alamat = $_POST['inalamat'];
            }
            if (empty($_POST['inkota'])) {
                $error['id_kota'] = 'Kota Penerbit Kosong';
            } else {
                $input_kota = $_POST['inkota'];
            }
            if (empty($_POST['intelepon'])) {
                $error['id_telepon'] = 'Telepon Penerbit Kosong';
            } else {
                $input_telepon = $_POST['intelepon'];
            }

            if (empty($error)) {
                if ($admin->editpenerbit($input_penerbit, $input_nama, $input_alamat, $input_kota, $input_telepon) == 'oke') {
                    echo '<script>alert("Berhasil Merubah data Penerbit"); window.location.href = "' . $config[`baseurl`] . '?p=admin";</script>';
                } else {
                    echo '<script>alert("Gagal Merubah data Penerbit"); window.location.href = "' . $config[`baseurl`] . '?p=admin";</script>';
                }
            } else {
                echo '<script>alert("data yang diberikan tidak valid"); window.location.href = "' . $config[`baseurl`] . '?p=admin";</script>';
            }
        } elseif ($mode == 'hapus') {
            $error = [];
            if (empty($_POST['inpenerbit'])) {
                $error['id_penerbit'] = 'id penerbit kosong';
            } else {
                $input_penerbit = $_POST['inpenerbit'];
            }

            if (empty($_POST['innama'])) {
                $error['id_nama'] = 'Nama Penerbit Kosong';
            } else {
                $input_nama = $_POST['innama'];
            }
            if (empty($_POST['inalamat'])) {
                $error['id_alamat'] = 'Alamat Penerbit Kosong';
            } else {
                $input_alamat = $_POST['inalamat'];
            }
            if (empty($_POST['inkota'])) {
                $error['id_kota'] = 'Kota Penerbit Kosong';
            } else {
                $input_kota = $_POST['inkota'];
            }
            if (empty($_POST['intelepon'])) {
                $error['id_telepon'] = 'Telepon Penerbit Kosong';
            } else {
                $input_telepon = $_POST['intelepon'];
            }

            if (empty($error)) {
                if ($admin->hapuspenerbit($input_penerbit) == 'oke') {
                    echo '<script>alert("Berhasil Menghapus data Penerbit"); window.location.href = "' . $config[`baseurl`] . '?p=admin";</script>';
                } else {
                    echo '<script>alert("Gagal Menghapus data Penerbit"); window.location.href = "' . $config[`baseurl`] . '?p=admin";</script>';
                }
            } else {
                echo '<script>alert("data yang diberikan tidak valid"); window.location.href = "' . $config[`baseurl`] . '?p=admin";</script>';
            }
        } else {
            echo '<script>alert("not found 404"); window.location.href = "' . $config[`baseurl`] . '?p=admin";</script>';
        }
    } else {
        echo '<script>alert("not found 404"); window.location.href = "' . $config[`baseurl`] . '?p=admin";</script>';
    }
}
?>

<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UNIBOOKSTORE - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href='https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
    <link href='https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
</head>

<body>
    <div class="container">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
            <a href="<?php echo $config['base_url']; ?>/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <span class="fs-4">UNIBOOKSTORE</span>
            </a>

            <ul class="nav nav-pills">
                <li class="nav-item"><a href="<?php echo $config['base_url']; ?>/" class="nav-link" aria-current="page">Home</a></li>
                <li class="nav-item"><a href="<?php echo $config['base_url']; ?>?p=admin" class="nav-link active">Admin</a></li>
                <li class="nav-item"><a href="<?php echo $config['base_url']; ?>?p=pengadaan" class="nav-link">Pengadaan</a></li>
            </ul>
        </header>
        <ul class="nav nav-pills mb-3" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="pills-buku-tab" data-bs-toggle="pill" data-bs-target="#pills-buku" type="button" role="tab" data-toggle="tab" href="#buku" aria-controls="pills-buku" aria-selected="true">Data Buku</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="pills-penerbit-tab" data-bs-toggle="pill" data-bs-target="#pills-penerbit" type="button" role="tab" data-toggle="tab" href="#penerbit" aria-controls="pills-penerbit" aria-selected="false">Data Penerbit</a>
            </li>

        </ul>

        <div class="tab-content" id="pills-tabContent">
            <!-- bagian buku -->
            <div class="tab-pane fade show active" id="pills-buku" role="tabpanel" aria-labelledby="pills-buku-tab" tabindex="0">
                <div class="container text-center">
                    <div class="row align-items-start">
                        <div class="col text-start">
                            <h2>List buku</h2>
                        </div>
                        <div class="col">

                        </div>
                        <div class="col text-end">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaltambahbuku">
                                Tambah
                            </button>
                        </div>
                    </div>
                </div>

                <table id='tlbuku' class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">ID Buku</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Nama Buku</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Stok</th>
                            <th scope="col">Penerbit</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($admin->lbuku() as $dbuku) {
                        ?>
                            <tr>
                                <th scope="row"><?php out($dbuku['Id_buku']); ?></th>
                                <td><?php out($dbuku['Kategori']); ?></td>
                                <td><?php out($dbuku['Nama_Buku']); ?></td>
                                <td><?php out(rp($dbuku['Harga'])); ?></td>
                                <td><?php out($dbuku['Stok']); ?></td>
                                <td><?php out($dbuku['Nama']); ?></td>
                                <td>
                                    <div class="row align-items-start">
                                        <div class="col text-center">
                                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#Modaleditbuku" idbuku="<?php out($dbuku['Id_buku']); ?>" kat="<?php out($dbuku['Kategori']); ?>" nama="<?php out($dbuku['Nama_Buku']); ?>" stok="<?php out($dbuku['Stok']); ?>" penerbit="<?php out($dbuku['Nama']); ?>" harga="<?php out($dbuku['Harga']); ?>">
                                                <i class="fa-solid fa-pen-to-square"></i></button>
                                        </div>
                                        <div class="col text-center">
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Modalhapusbuku" idbuku="<?php out($dbuku['Id_buku']); ?>" kat="<?php out($dbuku['Kategori']); ?>" nama="<?php out($dbuku['Nama_Buku']); ?>" stok="<?php out($dbuku['Stok']); ?>" penerbit="<?php out($dbuku['Nama']); ?>" harga="<?php out($dbuku['Harga']); ?>">
                                                <i class="fa-solid fa-eraser"></i></button>
                                        </div>
                                    </div>


                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

                <!-- Modal tambah buku-->
                <div class="modal fade" id="modaltambahbuku" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="<?php echo $config['base_url']; ?>?p=admin&t=buku&m=add" method="post">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Buku</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="idbuku" class="form-label">ID Buku</label>
                                        <input type="text" name="inidbuku" class="form-control" id="idbuku" placeholder="ID Buku" required maxlength="5">
                                    </div>
                                    <div class="mb-3">
                                        <label for="inkategori" class="form-label">Kategori</label>
                                        <input type="text" name="inkategori" list="kategorilist" class="form-control" id="inkategori" placeholder="Kategori [masukan jika tidak tersedia]" required>
                                        <datalist id="kategorilist">
                                            <?php foreach ($admin->shkategori() as $dkat) { ?>
                                                <option value="<?php out($dkat); ?>"></option>
                                            <?php } ?>
                                        </datalist>
                                    </div>
                                    <div class="mb-3">
                                        <label for="innama_buku" class="form-label">Nama Buku</label>
                                        <input type="text" name="innama" class="form-control" id="innama_buku" placeholder="Nama Buku" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="inharga" class="form-label">Harga</label>
                                        <input type="number" name="inharga" class="form-control" id="inharga" placeholder="Harga" required maxlength="11">
                                    </div>
                                    <div class="mb-3">
                                        <label for="instok" class="form-label">Stok</label>
                                        <input type="number" name="instok" class="form-control" id="instok" placeholder="Stok" required maxlength="11">
                                    </div>
                                    <div class="mb-3">
                                        <label for="inpenerbit" class="form-label">Penerbit</label>
                                        <select name="inpenerbit" class="form-control" id="inpenerbit" required maxlength="5">
                                            <?php foreach ($admin->shpenerbit() as $dpen) { ?>
                                                <option value="<?php out($dpen['Nama']); ?>"><?php out($dpen['Nama']); ?></option>
                                            <?php } ?>
                                        </select>

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- modal edit buku -->
                <div class="modal fade" id="Modaleditbuku" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form id="editbuku" action="<?php echo $config['base_url']; ?>?p=admin&t=buku&m=edit" method="post">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Buku</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="idbuku" class="form-label">ID Buku</label>
                                        <input type="text" name="inidbuku" class="form-control" id="idbuku" placeholder="ID Buku" required readonly maxlength="5">
                                    </div>
                                    <div class="mb-3">
                                        <label for="inkategori" class="form-label">Kategori</label>
                                        <input type="text" name="inkategori" list="kategorilist" class="form-control" id="inkategori" placeholder="Kategori [masukan jika tidak tersedia]" required>
                                        <datalist id="kategorilist">
                                            <?php foreach ($admin->shkategori() as $dkat) { ?>
                                                <option value="<?php out($dkat); ?>"></option>
                                            <?php } ?>
                                        </datalist>
                                    </div>
                                    <div class="mb-3">
                                        <label for="innama_buku" class="form-label">Nama Buku</label>
                                        <input type="text" name="innama" class="form-control" id="innama_buku" placeholder="Nama Buku" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="inharga" class="form-label">Harga</label>
                                        <input type="number" name="inharga" class="form-control" id="inharga" placeholder="Harga" required maxlength="11">
                                    </div>
                                    <div class="mb-3">
                                        <label for="instok" class="form-label">Stok</label>
                                        <input type="number" name="instok" class="form-control" id="instok" placeholder="Stok" required maxlength="11">
                                    </div>
                                    <div class="mb-3">
                                        <label for="inpenerbit" class="form-label">Penerbit</label>
                                        <select name="inpenerbit" class="form-control" id="inpenerbit" required maxlength="5">
                                            <?php foreach ($admin->shpenerbit() as $dpen) { ?>
                                                <option value="<?php out($dpen['Nama']); ?>"><?php out($dpen['Nama']); ?></option>
                                            <?php } ?>
                                        </select>

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- modal hapus buku -->
                <div class="modal fade" id="Modalhapusbuku" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form id="hapusbuku" action="<?php echo $config['base_url']; ?>?p=admin&t=buku&m=hapus" method="post">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Buku</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="idbuku" class="form-label">ID Buku</label>
                                        <input type="text" name="inidbuku" class="form-control" id="idbuku" placeholder="ID Buku" required readonly maxlength="5">
                                    </div>
                                    <div class="mb-3">
                                        <label for="inkategori" class="form-label">Kategori</label>
                                        <input type="text" name="inkategori" list="kategorilist" class="form-control" id="inkategori" placeholder="Kategori [masukan jika tidak tersedia]" required readonly>
                                        <datalist id="kategorilist">
                                            <?php foreach ($admin->shkategori() as $dkat) { ?>
                                                <option value="<?php out($dkat); ?>"></option>
                                            <?php } ?>
                                        </datalist>
                                    </div>
                                    <div class="mb-3">
                                        <label for="innama_buku" class="form-label">Nama Buku</label>
                                        <input type="text" name="innama" class="form-control" id="innama_buku" placeholder="Nama Buku" required readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="inharga" class="form-label">Harga</label>
                                        <input type="number" name="inharga" class="form-control" id="inharga" placeholder="Harga" required readonly maxlength="11">
                                    </div>
                                    <div class="mb-3">
                                        <label for="instok" class="form-label">Stok</label>
                                        <input type="number" name="instok" class="form-control" id="instok" placeholder="Stok" required readonly maxlength="11">
                                    </div>
                                    <div class="mb-3">
                                        <label for="inpenerbit" class="form-label">Penerbit</label>
                                        <input type="text" name="inpenerbit" class="form-control" id="inpenerbit" placeholder="Penerbit" required readonly maxlength="5">
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" onchange="document.getElementById('setuju').disabled = !this.checked;" id="flexCheckIndeterminate">
                                        <label class="form-check-label" for="flexCheckIndeterminate">
                                            <p class="text-uppercase p-3 text-danger-emphasis bg-danger-subtle border border-danger-subtle rounded-3">
                                                Harap menyetujui ini untuk melakukan penghapusan</p>
                                        </label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger" id="setuju" disabled>Hapus</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <!-- bagian penerbit -->
            <div class="tab-pane fade" id="pills-penerbit" role="tabpanel" aria-labelledby="pills-penerbit-tab" tabindex="0">
                <div class="container text-center">
                    <div class="row align-items-start">
                        <div class="col text-start">
                            <h2>List Penerbit</h2>
                        </div>
                        <div class="col">
                        </div>
                        <div class="col text-end">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalPenerbit">
                                Tambah
                            </button>
                        </div>
                    </div>
                </div>
                <table id='tlpenerbit' class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">ID Penerbit</th>
                            <th scope="col">nama Penerbit</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Kota</th>
                            <th scope="col">Telepon</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($admin->lpenerbit() as $dpenerbit) {
                        ?>
                            <tr>
                                <th scope="row"><?php out($dpenerbit['id_penerbit']); ?></th>
                                <td><?php out($dpenerbit['Nama']); ?></td>
                                <td><?php out($dpenerbit['Alamat']); ?></td>
                                <td><?php out($dpenerbit['Kota']); ?></td>
                                <td><?php out($dpenerbit['Telepon']); ?></td>
                                <td>
                                    <div class="row align-items-start">
                                        <div class="col text-center">
                                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#Modaleditpenerbit" idpen="<?php out($dpenerbit['id_penerbit']); ?>" nama="<?php out($dpenerbit['Nama']); ?>" alamat="<?php out($dpenerbit['Alamat']); ?>" kota="<?php out($dpenerbit['Kota']); ?>" telepon="<?php out($dpenerbit['Telepon']); ?>">
                                                <i class="fa-solid fa-pen-to-square"></i></button>
                                        </div>
                                        <div class="col text-center">
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Modalhapuspenerbit" idpen="<?php out($dpenerbit['id_penerbit']); ?>" nama="<?php out($dpenerbit['Nama']); ?>" alamat="<?php out($dpenerbit['Alamat']); ?>" kota="<?php out($dpenerbit['Kota']); ?>" telepon="<?php out($dpenerbit['Telepon']); ?>">
                                                <i class="fa-solid fa-eraser"></i></button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

                <!-- Modal tambah penerbit-->
                <div class="modal fade" id="ModalPenerbit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Penerbit</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="<?php echo $config['base_url']; ?>?p=admin&t=penerbit&m=add" method="post">
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="inpenerbit" class="form-label">Id Penerbit</label>
                                        <input type="text" name="inpenerbit" class="form-control" id="inpenerbit" placeholder="Id Penerbit" required maxlength="5">
                                    </div>
                                    <div class="mb-3">
                                        <label for="innama" class="form-label">Nama Penerbit</label>
                                        <input type="text" name="innama" class="form-control" id="innama" placeholder="Nama Penerbit" required maxlength="20">
                                    </div>
                                    <div class="mb-3">
                                        <label for="inalamat" class="form-label">Alamat</label>
                                        <input type="text" name="inalamat" class="form-control" id="inalamat" placeholder="Alamat" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="inkota" class="form-label">Kota</label>
                                        <input type="text" name="inkota" class="form-control" id="inkota" placeholder="Kota" required maxlength="10">
                                    </div>
                                    <div class="mb-3">
                                        <label for="intelepon" class="form-label">Telepon</label>
                                        <input type="text" name="intelepon" class="form-control" id="intelepon" placeholder="Telepon" required maxlength="20">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- modal edit penerbit -->
                <div class="modal fade" id="Modaleditpenerbit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">edit Penerbit</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="editpenerbit" action="<?php echo $config['base_url']; ?>?p=admin&t=penerbit&m=edit" method="post">
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="inpenerbit" class="form-label">Id Penerbit</label>
                                            <input type="text" name="inpenerbit" class="form-control" id="inpenerbit" placeholder="Id Penerbit" required readonly maxlength="5">
                                        </div>
                                        <div class="mb-3">
                                            <label for="innama" class="form-label">Nama Penerbit</label>
                                            <input type="text" name="innama" class="form-control" id="innama" placeholder="Nama Penerbit" required maxlength="20">
                                        </div>
                                        <div class="mb-3">
                                            <label for="inalamat" class="form-label">Alamat</label>
                                            <input type="text" name="inalamat" class="form-control" id="inalamat" placeholder="Alamat" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="inkota" class="form-label">Kota</label>
                                            <input type="text" name="inkota" class="form-control" id="inkota" placeholder="Kota" required maxlength="20">
                                        </div>
                                        <div class="mb-3">
                                            <label for="intelepon" class="form-label">Telepon</label>
                                            <input type="text" name="intelepon" class="form-control" id="intelepon" placeholder="Telepon" required maxlength="20">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- modal hapus penerbit -->
                <div class="modal fade" id="Modalhapuspenerbit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Penerbit</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="hapuspenerbit" action="<?php echo $config['base_url']; ?>?p=admin&t=penerbit&m=hapus" method="post">
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="inpenerbit" class="form-label">Id Penerbit</label>
                                            <input type="text" name="inpenerbit" class="form-control" id="inpenerbit" placeholder="Id Penerbit" required readonly maxlength="5">
                                        </div>
                                        <div class="mb-3">
                                            <label for="innama" class="form-label">Nama Penerbit</label>
                                            <input type="text" name="innama" class="form-control" id="innama" placeholder="Nama Penerbit" required readonly maxlength="20">
                                        </div>
                                        <div class="mb-3">
                                            <label for="inalamat" class="form-label">Alamat</label>
                                            <input type="text" name="inalamat" class="form-control" id="inalamat" placeholder="Alamat" required readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="inkota" class="form-label">Kota</label>
                                            <input type="text" name="inkota" class="form-control" id="inkota" placeholder="Kota" required readonly maxlength="10">
                                        </div>
                                        <div class="mb-3">
                                            <label for="intelepon" class="form-label">Telepon</label>
                                            <input type="text" name="intelepon" maxlength="20" class="form-control" id="intelepon" placeholder="Telepon" required readonly>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" onchange="document.getElementById('setuju').disabled = !this.checked;" id="flexCheckIndeterminate">
                                            <label class="form-check-label" for="flexCheckIndeterminate">
                                                <p class="text-uppercase p-3 text-danger-emphasis bg-danger-subtle border border-danger-subtle rounded-3">
                                                    Harap menyetujui ini, dikarenakan memungkinkan data buku ikut terhapus.</p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" id="setuju" class="btn btn-danger" disabled>Hapus</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
            <script>
                $('#Modaleditbuku').on('show.bs.modal', function(e) {
                    var opener = e.relatedTarget;

                    var idbuku = $(opener).attr('idbuku');
                    var kategori = $(opener).attr('kat');
                    var nama = $(opener).attr('nama');
                    var harga = $(opener).attr('harga');
                    var stok = $(opener).attr('stok');
                    var penerbit = $(opener).attr('penerbit');

                    $('#editbuku').find('[name="inidbuku"]').val(idbuku);
                    $('#editbuku').find('[name="inkategori"]').val(kategori);
                    $('#editbuku').find('[name="innama"]').val(nama);
                    $('#editbuku').find('[name="inharga"]').val(harga);
                    $('#editbuku').find('[name="instok"]').val(stok);
                    $('#editbuku').find('[name="inpenerbit"]').val(penerbit);
                });
                $('#Modalhapusbuku').on('show.bs.modal', function(e) {
                    var opener = e.relatedTarget;

                    var idbuku = $(opener).attr('idbuku');
                    var kategori = $(opener).attr('kat');
                    var nama = $(opener).attr('nama');
                    var harga = $(opener).attr('harga');
                    var stok = $(opener).attr('stok');
                    var penerbit = $(opener).attr('penerbit');

                    $('#hapusbuku').find('[name="inidbuku"]').val(idbuku);
                    $('#hapusbuku').find('[name="inkategori"]').val(kategori);
                    $('#hapusbuku').find('[name="innama"]').val(nama);
                    $('#hapusbuku').find('[name="inharga"]').val(harga);
                    $('#hapusbuku').find('[name="instok"]').val(stok);
                    $('#hapusbuku').find('[name="inpenerbit"]').val(penerbit);
                });

                $('#Modaleditpenerbit').on('show.bs.modal', function(e) {
                    var opener = e.relatedTarget;

                    var idpen = $(opener).attr('idpen');
                    var nama = $(opener).attr('nama');
                    var alamat = $(opener).attr('alamat');
                    var kota = $(opener).attr('kota');
                    var telepon = $(opener).attr('telepon');


                    $('#editpenerbit').find('[name="inpenerbit"]').val(idpen);
                    $('#editpenerbit').find('[name="innama"]').val(nama);
                    $('#editpenerbit').find('[name="inalamat"]').val(alamat);
                    $('#editpenerbit').find('[name="inkota"]').val(kota);
                    $('#editpenerbit').find('[name="intelepon"]').val(telepon);

                });
                $('#Modalhapuspenerbit').on('show.bs.modal', function(e) {
                    var opener = e.relatedTarget;

                    var idpen = $(opener).attr('idpen');
                    var nama = $(opener).attr('nama');
                    var alamat = $(opener).attr('alamat');
                    var kota = $(opener).attr('kota');
                    var telepon = $(opener).attr('telepon');


                    $('#hapuspenerbit').find('[name="inpenerbit"]').val(idpen);
                    $('#hapuspenerbit').find('[name="innama"]').val(nama);
                    $('#hapuspenerbit').find('[name="inalamat"]').val(alamat);
                    $('#hapuspenerbit').find('[name="inkota"]').val(kota);
                    $('#hapuspenerbit').find('[name="intelepon"]').val(telepon);

                });
            </script>
            <script>
                $(function() {
                    $('a[data-toggle="tab"]').on('click', function(e) {
                        window.localStorage.setItem('activeTab', $(e.target).attr('href'));
                    });
                    var activeTab = window.localStorage.getItem('activeTab');
                    if (activeTab) {
                        $('#myTab a[href="' + activeTab + '"]').tab('show');
                    }
                });
            </script>
            <script>
                $(document).ready(function() {
                    $('#tlbuku').DataTable({
                        lengthMenu: [
                            [10, 20, 50, -1],
                            [10, 20, 50, "All"]
                        ],
                        columns: [{
                                searchable: false
                            },
                            {
                                searchable: false
                            },
                            {
                                searchable: true
                            },
                            {
                                searchable: false
                            },
                            {
                                searchable: false
                            },
                            {
                                searchable: false
                            },
                            {
                                searchable: false
                            }
                        ]
                    });

                    $('#tlpenerbit').DataTable({
                        lengthMenu: [
                            [10, 20, 50, -1],
                            [10, 20, 50, "All"]
                        ],
                        columns: [{
                                searchable: false
                            },
                            {
                                searchable: false
                            },
                            {
                                searchable: true
                            },
                            {
                                searchable: false
                            },
                            {
                                searchable: false
                            },
                            {
                                searchable: false
                            }
                        ]
                    });
                });
            </script>
</body>

</html>