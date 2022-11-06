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
                        <h1 class="mt-4">Ubah</h1>
                    </div>
                    
                    <div class="card-body">
                        <form action="<?= base_url('index.php/barang/'.$barang->idbarang.'/hitedit') ?>" method="POST" >
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="inputFirstName" name="idbarang" type="text" value="<?= $barang->idbarang ?>" placeholder="Input Id Barang">
                                        <label for="inputFirstName">Id Barang</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input class="form-control" id="inputLastName" name="namabarang" type="text" value="<?= $barang->namabarang ?>" placeholder="Input Nama Barang">
                                        <label for="inputLastName">Nama Barang</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="inputFirstName" name="harga" type="text" value="<?= $barang->harga ?>" placeholder="Input Harga Barang">
                                        <label for="inputFirstName">Harga Barang</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input class="form-control" id="inputLastName" name="stok" type="text" value="<?= $barang->stok ?>" placeholder="Input Stok Barang">
                                        <label for="inputLastName">Stok</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 mb-0">
                                <div class="d-grid">
                                  <input class="btn btn-primary btn-block" type='submit' value='Ubah'>
                                  <a href="<?= base_url('index.php/barang/'.$barang->idbarang.'/hitremove') ?>" class="btn btn-danger btn-block">Hapus</a>
                                </div>
                            </div>
                        </form>
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
