<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tukang - Deran Kusen</title>
        <?php $this->load->view('navigator/topscript.php'); ?>
    </head>
    <body class="sb-nav-fixed">
        
        <!-- start top nav -->

        <?php $this->load->view('navigator/topnav.php'); ?>

        <!-- end top nav -->

        <div id="layoutSidenav">
            
            <!-- start navigator -->
                <?php $this->load->view('navigator/mainnav.php'); ?>
            <!-- send navigator -->


            <div id="layoutSidenav_content">
                <main>
                    
                    <!-- the content -->
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Edit Pekerja</h1>
                    </div>
                    
                    <div class="card-body">
                        <form action="<?= base_url('index.php/tukang/'.$tukang->id.'/hitedit') ?>" method="POST" >
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">                                    
                                        <input class="form-control" id="inputFirstName" name="id" type="text" uniqid="<?= $tukang->id ?>" placeholder="Input Id Barang" title="otomatis di buat" readonly="readonly">
                                        <label for="inputFirstName">Id</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input class="form-control" id="inputLastName" name="nama" type="text" value="<?= $tukang->nama ?>" placeholder="Input Nama Orang">
                                        <label for="inputLastName">Nama Orang</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <select name='gender' class="form-select" aria-label="Default select example">
                                          <option selected>Pilih Jenis Kelamin</option>
                                          <?php
                                            foreach ($jeniskelamin as $key => $value) {
                                                $selected = "";
                                                if($key == $tukang->gender) {
                                                  $selected = "selected";
                                                }
                                                echo "<option value='$key' $selected>$value</option>";
                                            }
                                          ?>
                                        </select>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row mb-3">
                            
                            <div class="form-group">
                              <label for="exampleFormControlTextarea1">Alamat</label>
                              <textarea class="form-control" id="inputHargaBarang" name="alamat" type="text" placeholder="Input Alamat"><?= $tukang->alamat ?></textarea>
                            </div>
                            
                            <div class="form-group">
                              <label for="exampleFormControlTextarea1">No Telepon</label>
                              <textarea class="form-control" id="inputHargaBarang" name="no_telp" type="text" placeholder="Input Telepon"><?= $tukang->no_telp ?></textarea>
                            </div>
                            
                            <div class="mt-4 mb-0">
                                <div class="d-grid">
                                  <input class="btn btn-primary btn-block" type='submit' value='Ubah'>
                                  <a href="javascript:formSubmit('<?= $tukang->id ?>');" class="btn btn-danger btn-block">Hapus</a>
                                </div>
                            </div>
                            
                        </form>
                        
                
                        <form id="formdel_<?= $tukang->id ?>" action='<?= base_url('index.php/tukang/'.$tukang->id.'/hitremove')?>' method='POST'>
                            <input type='hidden' name='aksi' value="delete" >
                            <input type='hidden' name='id' value="<?= $tukang->id ?>" >
                        </form>
                    </div>
                    
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <?php $this->load->view('pages/footer.php'); ?>
                </footer>
            </div>
        </div>
        
        <script>
            function formSubmit(id) {
                $('form#formdel_'+id).submit();
            }
        </script>
        
        <?php $this->load->view('navigator/bottomscript.php'); ?>

    </body>
</html>
