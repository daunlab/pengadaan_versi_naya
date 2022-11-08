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
                        <form action="<?= base_url('index.php/masuk/'.$masuk->idbarang.'/hitedit') ?>" method="POST" >
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="inputFirstName" name="id_masuk" type="text" value="<?= $barang->idbarang ?>" placeholder="Input id_masuk">
                                        <label for="inputFirstName">Id Masuk</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input class="form-control" id="inputLastName" name="idbarang" type="text" value="<?= $barang->namabarang ?>" placeholder="input idbarang">
                                        <label for="inputLastName">Id Barang</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="inputFirstName" name="nama_supplier" type="text" value="<?= $barang->nama_konsumen ?>" placeholder="input nama_supplier">
                                        <label for="inputFirstName">Nama supplier</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input class="form-control" id="inputLastName" name="nama_barang" type="text" value="<?= $barang->nama_barang ?>" placeholder="input nama_barang ">
                                        <label for="inputLastName">Nama Barang</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="inputFirstName" name="jumlah" type="text" value="<?= $barang->jumlah ?>" placeholder="input jumlah">
                                        <label for="inputFirstName">jumlah</label>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="inputFirstName" name="stok" type="text" value="<?= $barang->harga ?>" placeholder="input stok">
                                        <label for="inputFirstName">stok</label>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="inputFirstName" name="harga" type="text" value="<?= $barang->harga ?>" placeholder="input harga">
                                        <label for="inputFirstName">harga</label>
                                <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input class="form-control" id="inputLastName" name="tanggal" type="text" value="<?= $barang->harga ?>" placeholder="tanggal ">
                                        <label for="inputLastName">tanggal</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 mb-0">
                                <div class="d-grid">
                                  <input class="btn btn-primary btn-block" type='submit' value='Ubah'>
                                  <a href="javascript:formSubmit('<?= $barang->idbarang ?>');" class="btn btn-danger btn-block">Hapus</a>
                                </div>
                            </div>
                        </form>                      
                        <form id="formdel_<?= $masuk->id_masuk ?>" action='<?= base_url('index.php/masuk/'.$barang->idbarang.'/hitremove')?>' method='POST'>
                            <input type='hidden' name='aksi' value="delete" >
                            <input type='hidden' name='idbarang' value="<?= $barang->idbarang ?>" >
                        </form>
                    </div>
                    
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
