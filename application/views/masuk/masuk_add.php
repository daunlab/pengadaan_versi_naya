<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Barang Masuk - Deran Kusen</title>
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
                        <h1 class="mt-4">Transaksi Barang Masuk</h1>
                    </div>
                    
                    <div class="card-body">
                        <form action="<?= base_url('index.php/masuk/hittambah') ?>" method="POST" >
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">                                    
                                        <input class="form-control" id="Barang Masuk" name="id" type="text" uniqid="<?= $emptystring ?>" placeholder="Input Id Barang Masuk">
                                        <label for="Barang Masuk">Id Barang Masuk</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                            <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <select name='id_suplier' class="form-select" aria-label="Default select example">
                                          <option selected>Pilih Penyuplai</option>
                                          <?php
                                            foreach ($suplier as $key => $value) {
                                              
                                                echo "<option value='".$value->id."'>".$value->nama." | <span class='text-bold'>".$value->nama_perusahaan."</span></option>";
                                            }
                                          ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input class="form-control" id="inputTanggal" name="tanggal" type="text" value="" placeholder="Input Tanggal">
                                        <label for="inputTanggal">Tanggal</label>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">
                                      <textarea class="form-control" name='keterangan' placeholder="tambahkan keterangan anda" id="keterangan" style="height: 100px"></textarea>
                                      <label for="keterangan">Keterangan</label>

                                    </div>
                                </div>
                            </div>
                            
                            <hr/>
                            <h5>Daftar Barang Masuk</h5>
                            
                            <table id='list_barang' class="table">
                              <tr>
                                <td>No</td>
                                <td>Nama</td>
                                <td>Harga</td>
                                <td>Jumlah Barang Masuk</td>
                                <td>Action</td>
                              </tr>
                            </table>
                            
                            <button id='btn_add_barang' class='btn btn-success' type="button" data-bs-toggle="modal" data-bs-target="#myModal">Tambah Barang Masuk</button>
                            
                            
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
        
        <!-- The Modal -->
        <div class="modal fade" id="myModal">
        <div class="modal-dialog">
        <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
        <h4 class="modal-title">Tambah Barang Masuk</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
  
        <!-- Modal body -->
        <!-- <form method="post" action="<?php echo base_url("index.php/hitinsertbrg")?>"> -->
          <div class="modal-body">
            <select id='select_id_barang' name='id_barang' onchange="changeFunc();" class="form-select" aria-label="Default select example">
              <option selected>Pilih Barang</option>
              <?php
                foreach ($barang as $key => $v) {
                    echo "<option value='".$v->id."'>".$v->nama."</option>";
                }
              ?>
            </select>
            
            <table class='table'>
              <thead>
              <tr>
                <td>Infomasi</td>
                <td>Value</td>
              </tr>
              <tr>
                <td>Nama</td>
                <td><p id="nama" name="nama" placeholder="nama barang"><p></td>
              </tr>
              <tr>
                <td>Harga</td>
                <td><p id="harga" name="harga" placeholder="harga"><p></td>
              </tr>
              <tr>
                <td>Stok</td>
                <td><p id="stok" name="stok" placeholder="stok"><p></td>
              </tr>
              <tr>
                <td>Jenis</td>
                <td><p id="jenis" name="jenis" placeholder="jenis"><p></td>
              </tr>
              </thead>
              <tbody>
              </tbody>

            </table>
            <input type="button" class="btn btn-primary" value="Tambah" onclick="clickMy()">
          </div>
        
        <script>
        
          function formSubmit(id) {
              $('form#formdel_'+id).submit();
          }
          
          function setBarangInfo(nama, harga, stok, jenis) {
            alert(nama);
            // $('#nama').value(nama);
          }
          
          function dodeltr(id){
            $('#tr_brg_'+id).remove();
          }
          
          function clickMy() {
            var selectBox = document.getElementById("select_id_barang");
            var idbarang = selectBox.options[selectBox.selectedIndex].value;
            // alert(idbarang);
            
            $.ajax({
                url: "<?= base_url() ?>index.php/api/barang/"+idbarang+"/get",
                type: 'GET',
                dataType: 'json', // added data type
                success: function(res) {
                    // console.log(res);
                    val = res[0];
                    
                    console.log(val.nama)
                    // alert(res);
                    
                    $("#nama").html(val.nama)
                    $("#harga").html(val.harga)
                    $("#stok").html(val.stok)
                    $("#jenis").html(val.jenis)
                    
                    
                    
                    $('#list_barang tr:last').after("<tr id=\"tr_brg_"+val.id+"\"><td>#<input type='hidden' name=masuk_barang[] value='"+val.id+"'></td><td>"+val.nama+"</td><td><input type='text' name='masuk_barang_hrg[]' value='"+val.harga+"'></td><td><input type='text' name='masuk_barang_jml[]' value='1'> <span class='text-muted'>stok saat ini: "+val.stok+"</span></td><td><button class='btn btn-danger btn-sm' type='button' onclick=\"dodeltr(\'"+val.id+"\')\">delete</button></td></tr>");
                    
                    
                }
            });
            
            
            
            
            $('#myModal').modal('toggle');
            
          }
          
          function changeFunc() {
            var selectBox = document.getElementById("select_id_barang");
            var idbarang = selectBox.options[selectBox.selectedIndex].value;
            // alert(idbarang);
            
            
            $.ajax({
                url: "<?= base_url() ?>index.php/api/barang/"+idbarang+"/get",
                type: 'GET',
                dataType: 'json', // added data type
                success: function(res) {
                    // console.log(res);
                    val = res[0];
                    
                    console.log(val.nama)
                    // alert(res);
                    
                    $("#nama").html(val.nama)
                    $("#harga").html(val.harga)
                    $("#stok").html(val.stok)
                    $("#jenis").html(val.jenis)
                    
                    
                }
            });
            
            
          }
          
        
          $(function() {
            // $( "#btn_add_barang" ).click(function() {
            //   alert( "Handler for .click() called." );
            // });
            
            
          });
          
        
        </script>
            
            
            
        
        <?php $this->load->view('navigator/bottomscript'); ?>

    </body>
</html>
