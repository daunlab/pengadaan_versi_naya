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
                        <h1 class="mt-4">Daftar Barang Masuk</h1>
                         <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">- Daftar Barang mentah yang masuk</li>
                        </ol>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                            <div class="container">
                            <div class="container mt-3">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                            Update Barang Masuk
                            </button>
                        </div>
                        <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>ID Masuk</th>
                                            <th>ID Barang</th>
                                            <th>Nama supplier</th>
                                            <th>Nama barang</th>
                                            <th>jumlah </th>
                                            <th>stok </th>
                                            <th>Harga </th>
                                            <th>Tanggal </th>
                                            <th class="text-center">aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($masuk as $i) { ?>
                                        <tr>
                                            <td><?= $i->id_masuk  ?></td>
                                            <td><?= $i->idbarang ?></td>
                                            <td><?= $i->nama_supplier ?></td>
                                            <td><?= $i->nama_barang ?></td>
                                            <td><?= $i->jumlah ?></td>
                                            <th><?= $i->stok ?></th>
                                            <th><?= $i->harga ?></th>
                                            <th><?= $i->tanggal ?></th>
                                            <td class="text-center">
                                                <form id="formdel_<?= $i->idbarang ?>" action='<?= base_url('index.php/masuk/'.$i->idbarang.'/hitremove')?>' method='POST'>
                                                    <input type='hidden' name='aksi' value="delete" >
                                                    <input type='hidden' name='idbarang' value="<?= $i->idbarang ?>" >
                                                </form>
                                                <a href="<?= base_url('index.php/masuk/'.$i->idbarang.'/edit') ?>" class="btn btn-danger btn-sm">Edit</a>
                                                <a href="javascript:formSubmit('<?= $i->idbarang ?>');" class="btn btn-warning btn-sm">Hapus</a>
                                                </td>
                                        </tr>
                                        <?php } ?>
                                        <tr>
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
                    <form method="post" action="<?php echo base_url("index.php/hitinsertbrgmasuk")?>">
                    <div class="modal-body">
                    <input type="text" name="id_masuk" placeholder="id_masuk" class="form-control">
                    <br/>
                    <input type="text" name="idbarang" placeholder="idbarang" class="form-control">
                    <br>
                    <input type="text" name="nama_supplier" placeholder="nama_supplier" class="form-control">
                    <br>
                    <input type="text" name="nama_barang" placeholder="nama_barang" class="form-control">
                    <br>
                    <input type="text" name="jumlah" placeholder="jumlah" class="form-control">
                    <br>
                    <input type="text" name="stok" placeholder="stok" class="form-control">
                    <br>
                    <input type="text" name="harga" placeholder="harga" class="form-control">
                    <br>
                    <input type="text" name="tanggal" placeholder="tanggal" class="form-control">
                    <br>
                    <button type="submit" class="btn btn-primary" name="addnewbarang">submit</button>
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
