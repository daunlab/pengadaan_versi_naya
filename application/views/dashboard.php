<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - DeranKusen</title>
        <?php include "navigator/topscript.php"; ?>
    </head>
    <body class="sb-nav-fixed">
        
        <!-- start top nav -->

        <?php include "navigator/topnav.php"; ?>

        <!-- end top nav -->

        <div id="layoutSidenav">
            
            <!-- start navigator -->
                <?php include "navigator/mainnav.php"; ?>
            <!-- send navigator -->


            <div id="layoutSidenav_content">
                <main>
                    
                    <!-- the content -->
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body" align='center'>Total Produk</div>
                                    <div class="card-body">
                                        <p align='center'><?= $tprod->TotalProduct ?> </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body" align='center'>Total Barang</div>
                                    <div class="card-body" align='center'>
                                        <p align='center'><?= $titem->TotalItem ?> </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body" align='center'>Total Transaksi Masuk</div>
                                    <div class="card-body" align='center'>
                                        <p align='center'><?= $tmsk->TotalTransaksiMasuk ?> </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body" align='center'>Total Transaksi Keluar</div>
                                    <div class="card-body" align='center'>
                                        <p align='center'><?= $tkel->TotalTransaksiKeluar ?> </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Daftar Transaksi Terakhir
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Jenis</th>
                                            <th>ID Transaksi</th>
                                            <th>Nama Barang</th>
                                            <th>stok</th>
                                            <th>Harga</th>
                                            <th>Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Jenis</th>
                                            <th>ID Transaksi</th>
                                            <th>Nama Barang</th>
                                            <th>jumlah</th>
                                            <th>Harga</th>
                                            <th>Tanggal</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php foreach ($lasttrx as $i) { ?>
                                        <tr>
                                            <td><?= ($i->jenis == "IN") ? "Barang Masuk" : "Barang Keluar" ;  ?></td>
                                            <td><?= $i->id_trx ?></td>
                                            <td><?= $i->nama_barang ?></td>
                                            <td><?= $i->jumlah?></td>
                                            <th><?= $i->harga ?></th>
                                            <th><?= $i->tanggal ?></th>
                                        </tr>
                                        <?php } ?>
                                        <tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </main>
                <footer class="py-4 bg-light mt-auto">
                    <?php include "pages/footer.php" ?>
                </footer>
            </div>
        </div>
        
        <?php include "navigator/bottomscript.php" ?>

    </body>
</html>
