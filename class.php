<?php
if (!defined('MyConst')) {
    die('Direct access not permitted');
}
if (debug == FALSE) {
    error_reporting(0);
}
function dbconnect()
{
    // error_reporting(0);
    global $config;
    $db = new mysqli($config['database_host'], $config['database_user'], $config['database_pass'], $config['database_name']);
    return $db;
}

function home()
{
    $db = dbconnect();
    if ($db->connect_errno == 0) {
        $sql = 'SELECT `t_buku`.*, `t_penerbit`.* FROM `t_buku` LEFT JOIN `t_penerbit` ON `t_buku`.`id_penerbit` = `t_penerbit`.`id_penerbit`';
        $res = $db->query($sql);
        if (mysqli_num_rows($res) >= 1) {
            $data = $res->fetch_all(MYSQLI_ASSOC);
            $res->free();
        } else {
            $data = array('Id_buku' => '', 'Kategori' => '', 'Nama Buku' => '', 'Harga' => '', 'Stok' => '', 'id_penerbit' => '', 'Nama' => '', 'Alamat' => '', 'Kota' => '', 'Telepon' => '');
        }
        return $data;
    }
}
function pengadaan()
{
    global $config;

    $sisa = $config['minimal'];
    $db = dbconnect();
    if ($db->connect_errno == 0) {
        $sql = "SELECT `t_buku`.*, `t_penerbit`.* FROM `t_buku` LEFT JOIN `t_penerbit` ON `t_buku`.`id_penerbit` = `t_penerbit`.`id_penerbit` WHERE `t_buku`.`Stok` <= $sisa";
        $res = $db->query($sql);
        if (mysqli_num_rows($res) >= 1) {
            $data = $res->fetch_all(MYSQLI_ASSOC);
            $res->free();
        } else {
            $data = array('Id_buku' => '', 'Kategori' => '', 'Nama Buku' => '', 'Harga' => '', 'Stok' => '', 'id_penerbit' => '', 'Nama' => '', 'Alamat' => '', 'Kota' => '', 'Telepon' => '');
        }
        return $data;
    }
}

class admin
{
    function lbuku()
    {
        $db = dbconnect();
        if ($db->connect_errno == 0) {
            $sql = 'SELECT `t_buku`.*, `t_penerbit`.* FROM `t_buku` LEFT JOIN `t_penerbit` ON `t_buku`.`id_penerbit` = `t_penerbit`.`id_penerbit`';
            $res = $db->query($sql);
            if (mysqli_num_rows($res) >= 1) {
                $data = $res->fetch_all(MYSQLI_ASSOC);
                $res->free();
            } else {
                $data = array('Id_buku' => '', 'Kategori' => '', 'Nama Buku' => '', 'Harga' => '', 'Stok' => '', 'id_penerbit' => '', 'Nama' => '', 'Alamat' => '', 'Kota' => '', 'Telepon' => '');
            }
            return $data;
        }
    }

    function lpenerbit()
    {
        $db = dbconnect();
        if ($db->connect_errno == 0) {
            $sql = 'SELECT `t_penerbit`.* FROM `t_penerbit`';
            $res = $db->query($sql);
            if (mysqli_num_rows($res) >= 1) {
                $data = $res->fetch_all(MYSQLI_ASSOC);
                $res->free();
            } else {
                $data = array('id_penerbit' => '', 'Nama' => '', 'Alamat' => '', 'Kota' => '', 'Telepon' => '');
            }
            return $data;
        }
    }

    //deretan fungsi sederhana
    function shkategori()
    {
        $db = dbconnect();
        if ($db->connect_errno == 0) {
            $sql = 'SHOW COLUMNS FROM `t_buku` WHERE FIELD = "Kategori"';
            $res = $db->query($sql);
            $data = $res->fetch_array(MYSQLI_ASSOC);
            $res->free();
            preg_match("/^enum\(\'(.*)\'\)$/", $data['Type'], $matches);
            $enum = explode("','", $matches[1]);
            return $enum;
        }
    }

    function shpenerbit()
    {
        $db = dbconnect();
        if ($db->connect_errno == 0) {
            $sql = 'SELECT `t_penerbit`.`id_penerbit`, `t_penerbit`.`Nama` FROM `t_penerbit`';
            $res = $db->query($sql);
            $data = $res->fetch_all(MYSQLI_ASSOC);
            $res->free();
            return $data;
        }
    }
    function valid($data, $mode)
    {
        $db = dbconnect();
        if ($db->connect_errno == 0) {
            if ($mode == 'buku') {
                $sql = "SELECT * FROM `t_buku` WHERE `t_buku`.`Id_buku` = '$data'";
            } elseif ($mode == 'penerbit') {
                $sql = "SELECT * FROM `t_penerbit` WHERE `t_penerbit`.`Nama` = '$data' OR `id_penerbit` = '$data'";
            }
            $res = $db->query($sql);
            if (mysqli_num_rows($res) != 0) {
                $data = $res->fetch_array(MYSQLI_ASSOC);
            } else {
                $data = 0;
            }
            $res->free();
            return $data;
        }
    }

    //fungsi tambah buku
    function tambahbook($id, $kat, $nama, $harga, $stok, $penerbit)
    {
        $db = dbconnect();
        if ($db->connect_errno == 0) {
            if (array_search($kat, self::shkategori()) == false) {
                $artstr = implode("', '", self::shkategori());
                $build = "ALTER TABLE `t_buku` CHANGE `Kategori` `Kategori` ENUM('" . $artstr . "', '$kat')";
                $db->query($build);
            }

            $sql = "INSERT INTO `t_buku` (`Id_buku`, `Kategori`, `Nama_Buku`, `Harga`, `Stok`, `id_penerbit`) VALUES ('$id', '$kat', '$nama', $harga, $stok, '$penerbit')";
            $res = $db->query($sql);

            if ($res) {
                $back = 'oke';
            } else {
                $back = 'nope';
            }
            return $back;
        }
    }
    //fungsi edit buku
    function editbook($id, $kat, $nama, $harga, $stok, $penerbit)
    {
        $db = dbconnect();
        if ($db->connect_errno == 0) {
            if (array_search($kat, self::shkategori()) == false) {
                $artstr = implode("', '", self::shkategori());
                $build = "ALTER TABLE `t_buku` CHANGE `Kategori` `Kategori` ENUM('" . $artstr . "', '$kat')";
                $db->query($build);
            }

            $sql = "UPDATE `t_buku` SET `Kategori` = '$kat', `Nama_Buku` = '$nama', `Harga` = $harga, `Stok` = $stok, `id_penerbit` = '$penerbit' WHERE `t_buku`.`Id_buku` = '$id'";
            $res = $db->query($sql);

            if ($res) {
                $back = 'oke';
            } else {
                $back = 'nope';
            }
            return $back;
        }
    }
    //fungsi hapus buku
    function hapusbook($id)
    {
        $db = dbconnect();
        if ($db->connect_errno == 0) {
            $sql = "DELETE FROM `t_buku` WHERE `t_buku`.`Id_buku` = '$id'";
            $res = $db->query($sql);
            if ($res) {
                $back = 'oke';
            } else {
                $back = 'nope';
            }
            return $back;
        }
    }


    //fungsi tambah penerbit
    function tambahpenerbit($id, $nama, $alamat, $kota, $telepon)
    {
        $db = dbconnect();
        if ($db->connect_errno == 0) {
            $sql = "INSERT INTO `t_penerbit` (`id_penerbit`, `Nama`, `Alamat`, `Kota`, `Telepon`) VALUES ('$id', '$nama', '$alamat', '$kota', '$telepon')";
            $res = $db->query($sql);
            if ($res) {
                $back = 'oke';
            } else {
                $back = 'nope';
            }
            return $back;
        }
    }

    //fungsi edit penerbit
    function editpenerbit($id, $nama, $alamat, $kota, $telepon)
    {
        $db = dbconnect();
        if ($db->connect_errno == 0) {
            $sql = "UPDATE `t_penerbit` SET `Nama` = '$nama', `Alamat` = '$alamat', `Kota` = '$kota', `Telepon` = '$telepon' WHERE `t_penerbit`.`id_penerbit` = '$id'";
            $res = $db->query($sql);
            if ($res) {
                $back = 'oke';
            } else {
                $back = 'nope';
            }
            return $back;
        }
    }

    //fungsi hapus penerbit
    function hapuspenerbit($id)
    {
        $db = dbconnect();
        if ($db->connect_errno == 0) {
            $sql = "DELETE FROM `t_penerbit` WHERE `t_penerbit`.`id_penerbit` = '$id'";
            $res = $db->query($sql);
            if ($res) {
                $back = 'oke';
            } else {
                $back = 'nope';
            }
            return $back;
        }
    }
}

function redirect($data)
{
    global $config;
    print_r($config);
    $baseurl = $config['base_url'];
    echo $baseurl;
    header("location: $baseurl$data");
}

//function yang sering digunakan
function out($data)
{
    echo htmlspecialchars($data);
}

function rp($angka)
{
    $hasil = "Rp " . number_format($angka, 0, ',', '.');
    return $hasil;
}
