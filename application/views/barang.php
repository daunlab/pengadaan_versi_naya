<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - Deran Kusen</title>
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
                        <h1 class="mt-4">Aplikasi Pendataan</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">- JL.Petaruman, Cihampelas.</li>
                        </ol>
                            <li class="breadcrumb-item active">DAFTAR BARANG YANG DI JUAL DI DERAN JAYA KUSEN</li>
                        <ol>
                            
                        <div class="card mb-4">
                            <div class="card-header">
                            <div class="container">
                            <div class="container mt-3">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                            Tambah Barang yang Dijual
                            </button>
                        </div>
                        <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>ID Barang </th>
                                            <th>Nama Barang </th>
                                            <th>Harga </th>
                                            <th>stok</th>
                                            <th class="text-center">aksi</th>
                                            
                                        </tr>
                                    </thead>                                 
                                    <tbody>
                                    
                                        <?php foreach ($barang as $i) { ?>
                                        <tr>
                                            <td><?= $i->idbarang ?></td>
                                            <td><?= $i->namabarang?></td>
                                            <td><?= $i->harga?></td>
                                            <td><?= $i->stok?></td>
                                            <td class="text-center">
                                                <form id="formdel_<?= $i->idbarang ?>" action='<?= base_url('index.php/barang/'.$i->idbarang.'/hitremove')?>' method='POST'>
                                                    <input type='hidden' name='aksi' value="delete" >
                                                    <input type='hidden' name='idbarang' value="<?= $i->idbarang ?>" >
                                                </form>
                                                <a href="<?= base_url('index.php/barang/'.$i->idbarang.'/edit') ?>" class="btn btn-danger btn-sm">Edit</a>
                                                <a href="javascript:formSubmit('<?= $i->idbarang ?>');" class="btn btn-warning btn-sm">Hapus</a>
                                                </td>
                                        
                                    
                                        </tr>
                                        <?php } ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- The Modal -->
                        <div class="modal fade" id="myModal">
                        <div class="modal-dialog">
                        <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                        <h4 class="modal-title">Tambah Barang</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                  
                        <!-- Modal body -->
                        <form method="post" action="<?php echo base_url("index.php/hitinsertbrg")?>">
                        <div class="modal-body">
                        <input type="text" name="idbarang" placeholder="id barang" class="form-control">
                        <br>
                        <input type="text" name="namabarang" placeholder="nama barang" class="form-control">
                        <br>
                        <input type="text" name="harga" placeholder="harga" class="form-control">
                        <br>
                        <input type="text" name="stok" placeholder="stok" class="form-control">
                        <br>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        </div>
                        </form>

                </main>
                <footer class="py-4 bg-light mt-auto">
                    <?php include "pages/footer.php" ?>
                </footer>
            </div>
        </div>
        
        <script>
            function formSubmit(id) {
                $('form#formdel_'+id).submit();
            }
        </script>
        
        <?php include "navigator/bottomscript.php" ?>

    </body>
</html>
