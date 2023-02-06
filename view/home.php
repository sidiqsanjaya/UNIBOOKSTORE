<?php
if (!defined('MyConst')) {
    die('Direct access not permitted');
}
if (debug == FALSE) {
    error_reporting(0);
}
?>

<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UNIBOOKSTORE - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href='https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
    <link href='https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css' rel='stylesheet' type='text/css'>

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
                <li class="nav-item"><a href="<?php echo $config['base_url']; ?>/" class="nav-link active" aria-current="page">Home</a></li>
                <li class="nav-item"><a href="<?php echo $config['base_url']; ?>?p=admin" class="nav-link">Admin</a></li>
                <li class="nav-item"><a href="<?php echo $config['base_url']; ?>?p=pengadaan" class="nav-link">Pengadaan</a></li>
            </ul>
        </header>
    </div>
    <div class="container">
        <br><br>
        <h2>List buku</h2>
        <table id='thome' class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID Buku</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Nama Buku</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Penerbit</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach (home() as $dhome) {
                ?>
                    <tr>
                        <th scope="row"><?php out($dhome['Id_buku']); ?></th>
                        <td><?php out($dhome['Kategori']); ?></td>
                        <td><?php out($dhome['Nama_Buku']); ?></td>
                        <td><?php out(rp($dhome['Harga'])); ?></td>
                        <td><?php out($dhome['Nama']); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#thome').DataTable({
                lengthMenu: [
                    [10, 20, 50, -1],
                    [10, 20, 50, "All"]
                ],
                columns: [{
                        searchable: false //id buku
                    },
                    {
                        searchable: false //kategori
                    },
                    {
                        searchable: true //nama buku
                    },
                    {
                        searchable: false //harga
                    },
                    {
                        searchable: false //penerbit
                    }
                ]
            });
        });
    </script>
</body>

</html>