<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - Deran Kusen</title>
        <?php $this->load->view('navigator/topscript'); ?>
    </head>
    <body class="sb-nav-fixed">
        
        <!-- start top nav -->

        <?php $this->load->view('navigator/topnav'); ?>

        <!-- end top nav -->

        <div id="layoutSidenav">
            
            <!-- start navigator -->
                <?php $this->load->view('navigator/mainnav'); ?>
            <!-- send navigator -->


            <div id="layoutSidenav_content">
                <main>
                    
                    <!-- the content -->
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Tambah Pembeli</h1>
                    </div>
                    
                    <div class="card-body">
                        <form action="<?= base_url('index.php/pembeli/hittambah') ?>" method="POST" >
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">                                    
                                        <input class="form-control" id="inputFirstName" name="id" type="text" uniqid="<?= $emptystring ?>" placeholder="Input Id">
                                        <label for="inputFirstName">Id</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input class="form-control" id="inputLastName" name="nama" type="text" value="" placeholder="Input Nama Orang">
                                        <label for="inputLastName">Nama Orang</label>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <select name='gender' class="form-select" aria-label="Default select example">
                                          <option selected>Pilih Jenis Kelamin</option>
                                          <?php
                                            foreach ($jeniskelamin as $key => $value) {
                                                echo "<option value='$key'>$value</option>";
                                            }
                                          ?>
                                        </select>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="form-group">
                              <label for="exampleFormControlTextarea1">Alamat</label>
                              <textarea class="form-control" id="inputHargaBarang" name="alamat" type="text" placeholder=""></textarea>
                            </div>
                            
                            <div class="form-group">
                              <label for="exampleFormControlTextarea1">Kontak</label>
                              <textarea class="form-control" id="inputHargaBarang" name="kontak" type="text" placeholder=""></textarea>
                            </div>
                            <div class="mt-4 mb-0">
                                <div class="d-grid">
                                    <input type="submit" class="btn btn-primary" value="Tambah">
                                </div>
                            </div>
                        </form>
                    </div>
                    
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <?php $this->load->view('pages/footer'); ?>
                </footer>
            </div>
        </div>
        
        <script>
            function formSubmit(id) {
                $('form#formdel_'+id).submit();
            }
        </script>
        
        <?php $this->load->view('navigator/bottomscript'); ?>

    </body>
</html>
