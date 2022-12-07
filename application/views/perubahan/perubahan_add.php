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
        <style>
          .sidebyside {
            padding: 20px 0px;
          }
        </style>
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
                        <h1 class="mt-4">Tambah Perubahan Barang</h1>
                    </div>
                    
                    <div class="card-body">
                        <form action="<?= base_url('index.php/perubahan/hittambah') ?>" method="POST" >
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">                                    
                                        <input class="form-control" id="Perubahan Barang" name="id" type="text" uniqid="<?= $emptystring ?>" placeholder="Input Id Perubahan Barang">
                                        <label for="Perubahan Barang">Id Perubahan Barang</label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="row">                                    
                                        <div class="col-md-3">
                                        <div class="col-md-9">
                                          <input id="inputTanggal" name="tanggal" type="text" value="" placeholder="Input Tanggal" style="height: 35px;width: 225px;">
                                          <label for="inputTanggal">Tanggal</label>
                                        </div>
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
                            
                            <div class='row'>
                              <div class='col-md-12 text-center'>
                                <h5 class='text-center'>Daftar Pekerja / Tukang / Petugas</h5>
                                
                                <table id='list_petugas' class="table-responsive col-md-12">
                                  <tr>
                                    <td>No</td>
                                    <td>Nama</td>
                                    <td>Gender</td>
                                    <td>Hp</td>
                                    <td>Alamat</td>
                                  </tr>
                                </table>
                                
                                <br/>
                                
                                <button id='btn_add_barang_mentah' class='btn btn-success col-md-8' type="button" data-bs-toggle="modal" data-bs-target="#modalPetugas">Tambah Pekerja / Tukang / Petugas</button>
                                
                              </div>
                            </div>
                            
                            
                            
                            <div class='row'>
                              <div class='col-md-6 sidebyside'>
                                <h5 class='text-center'>Daftar Barang Mentah</h5>
                              </div>
                              <div class='col-md-6 sidebyside'>
                                <h5 class='text-center'>Daftar Barang Jadi</h5>
                              </div>
                            </div>
                            
                            <div class="row">
                              <div class='col-md-6 sidebyside text-center'>
                                <table id='list_mentah' class="table-responsive col-md-10">
                                  <tr>
                                    <td>No</td>
                                    <td>Nama</td>
                                    <td>Jumlah Barang Terpakai</td>
                                    <td>Action</td>
                                  </tr>
                                </table>
                              </div>
                              <div class='col-md-6 sidebyside text-center'>
                                <table id='list_jadi' class="table-responsive col-md-10">
                                  <tr>
                                    <td>No</td>
                                    <td>Nama</td>
                                    <td>Jumlah Barang Hasil</td>
                                    <td>Action</td>
                                  </tr>
                              </table>
                              </div>
                            
                            </div>
                            
                            <div class="row">
                              <div class='col-md-6 sidebyside text-center' >
                                <button id='btn_add_barang_mentah' class='btn btn-success col-md-8' type="button" data-bs-toggle="modal" data-bs-target="#modalMentah">Tambah Barang Mentah</button>
                              </div>
                              <div class='col-md-6 sidebyside text-center' >
                                <button id='btn_add_barang_jadi' class='btn btn-success col-md-8' type="button" data-bs-toggle="modal" data-bs-target="#modalJadi">Tambah Barang Jadi</button>
                              </div>
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
        
        
        
        <!-- Modal Petugas -->
        <div class="modal fade" id="modalPetugas">
          <div class="modal-dialog">
            <div class="modal-content">
    
            <!-- Petugas Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Tambah Petugas/Tukang/Perja</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>
        
              <!-- Petugas Modal body -->
                <div class="modal-body">
                  <select id='select_id_petugas' name='id_petugas' onchange="changeFunc('petugas');" class="form-select" aria-label="Default select example">
                    <option selected>Pilih Barang</option>
                    <?php
                      foreach ($petugas as $key => $v) {
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
                      <td><p id="nama_petugas" name="nama_petugas" placeholder="nama barang"><p></td>
                    </tr>
                    <tr>
                      <td>Gender</td>
                      <td><p id="gender_petugas" name="gender_petugas" placeholder="gender"><p></td>
                    </tr>
                    <tr>
                      <td>Hp</td>
                      <td><p id="hp_petugas" name="hp_petugas" placeholder="hp"><p></td>
                    </tr>
                    <tr>
                      <td>Alamat</td>
                      <td><p id="alamat_petugas" name="alamat_petugas" placeholder="alamat"><p></td>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
      
                  </table>
                  <input type="button" class="btn btn-primary" value="Tambah" onclick="clickMy('petugas')">
                </div>
              </div> <!-- end modal content -->
            </div> <!-- end modal dialog -->
          </div> <!-- end modal -->
          
          
        <!-- Modal Barang Mentah -->
        <div class="modal fade" id="modalMentah">
          <div class="modal-dialog">
            <div class="modal-content">
    
              <!-- Barang Mentah Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Tambah Barang Mentah</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>
        
              <!-- Barang Mentah Modal body -->
                <div class="modal-body">
                  <select id='select_id_mentah' name='id_mentah' onchange="changeFunc('mentah');" class="form-select" aria-label="Default select example">
                    <option selected>Pilih Barang</option>
                    <?php
                      foreach ($barang_mentah as $key => $v) {
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
                        <td><p id="nama_mentah" name="nama_mentah" placeholder="nama barang"><p></td>
                      </tr>
                      <tr>
                        <td>Harga</td>
                        <td><p id="harga_mentah" name="harga_mentah" placeholder="harga"><p></td>
                      </tr>
                      <tr>
                        <td>Stok</td>
                        <td><p id="stok_mentah" name="stok_mentah" placeholder="stok"><p></td>
                      </tr>
                      <tr>
                        <td>Jenis</td>
                        <td><p id="jenis_mentah" name="jenis_mentah" placeholder="jenis"><p></td>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
      
                  </table>
                  <input type="button" class="btn btn-primary" value="Tambah" onclick="clickMy('mentah')">
                </div>
              
              </div> <!-- end modal content -->
            </div> <!-- end modal dialog -->
          </div> <!-- end modal -->
          
          
          
          <!-- Modal Barang Jadi -->
        <div class="modal fade" id="modalJadi">
          <div class="modal-dialog">
            <div class="modal-content">
    
              <!-- Barang Jadi Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Tambah Barang Jadi</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>
        
              <!-- Barang Jadi Modal body -->
                <div class="modal-body">
                  <select id='select_id_jadi' name='id_jadi' onchange="changeFunc('jadi');" class="form-select" aria-label="Default select example">
                    <option selected>Pilih Barang</option>
                    <?php
                      foreach ($barang_jadi as $key => $v) {
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
                        <td><p id="nama_jadi" name="nama_jadi" placeholder="nama barang"><p></td>
                      </tr>
                      <tr>
                        <td>Harga</td>
                        <td><p id="harga_jadi" name="harga_jadi" placeholder="harga"><p></td>
                      </tr>
                      <tr>
                        <td>Stok</td>
                        <td><p id="stok_jadi" name="stok_jadi" placeholder="stok"><p></td>
                      </tr>
                      <tr>
                        <td>Jenis</td>
                        <td><p id="jenis_jadi" name="jenis_jadi" placeholder="jenis"><p></td>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
      
                  </table>
                  <input type="button" class="btn btn-primary" value="Tambah" onclick="clickMy('jadi')">
                </div>
              
              </div> <!-- end modal content -->
            </div> <!-- end modal dialog -->
          </div> <!-- end modal -->
        
        
        
        
        
        
        
        
        
        
        
        
        <!-- The Modal example -->
        <div class="modal fade" id="myModal">
        <div class="modal-dialog">
        <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Tambah Barang Masuk</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
  
        <!-- Modal body -->
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
                <td><p id="nama_mentah" name="nama_mentah" placeholder="nama barang"><p></td>
              </tr>
              <tr>
                <td>Harga</td>
                <td><p id="harga_mentah" name="harga_mentah" placeholder="harga"><p></td>
              </tr>
              <tr>
                <td>Stok</td>
                <td><p id="stok_mentah" name="stok_mentah" placeholder="stok"><p></td>
              </tr>
              <tr>
                <td>Jenis</td>
                <td><p id="jenis_mentah" name="jenis_mentah" placeholder="jenis"><p></td>
              </tr>
              </thead>
              <tbody>
              </tbody>

            </table>
            <input type="button" class="btn btn-primary" value="Tambah" onclick="clickMy()">
          </div>
        
        <script>
        
          initDeskyCalendar("inputTanggal");
        
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
          
          function clickMy(context) {
            var selectBox = document.getElementById("select_id_"+context);
            var idselected = selectBox.options[selectBox.selectedIndex].value;
            
            if(context == "petugas"){
              selectedurl = "<?= base_url() ?>index.php/api/petugas/"+idselected+"/get";
            } else {
              selectedurl = "<?= base_url() ?>index.php/api/barang/"+idselected+"/get";
            }
            
            $.ajax({
                url: selectedurl,
                type: 'GET',
                dataType: 'json', // added data type
                success: function(res) {
                  val = res[0];
                    
                  if(context=="petugas") {
                  
                    var arrgender = [];
                  
                    arrgender["L"] = "Laki Laki";
                    arrgender["P"] = "Perempuan";
                    arrgender["N"] = "Tidak Disebut";
                    
                    var gender = arrgender[val.gender];
                    
                    $('#list_petugas tr:last').after("<tr id=\"tr_petugas_"+val.id+"\"><td>#<input type='hidden' name=perubahan_petugas[] value='"+val.id+"'></td><td>"+val.nama+"</td><td>"+gender+"</td><td>"+val.no_telp+"</td><td>"+val.alamat+"</td><td><button class='btn btn-danger btn-sm' type='button' onclick=\"dodeltr(\'"+val.id+"\')\">delete</button></td></tr>");
                    
                    $('#modalPetugas').modal('toggle');
                  } else  {
                  
                    var arrjenisbrg = [];
                    
                    arrjenisbrg["MH"] = "Mentah";
                    arrjenisbrg["JI"] = "Jadi";
                    
                    var jenisbrg = arrjenisbrg[val.jenis];
                    
                    if(context=="mentah") {
                      $('#list_mentah tr:last').after("<tr id=\"tr_mentah_"+val.id+"\"><td>#<input type='hidden' name=perubahan_mentah[] value='"+val.id+"'></td><td>"+val.nama+"</td><td><input type='text' name='perubahan_mentah_jml[]' value='1'> <span class='text-muted'>stok saat ini: "+val.stok+"</span></td><td><button class='btn btn-danger btn-sm' type='button' onclick=\"dodeltr(\'"+val.id+"\')\">delete</button></td></tr>");
                      
                      $('#modalMentah').modal('toggle');
                    } else if (context=="jadi") {
                      $('#list_jadi tr:last').after("<tr id=\"tr_jadi_"+val.id+"\"><td>#<input type='hidden' name=perubahan_jadi[] value='"+val.id+"'></td><td>"+val.nama+"</td><td><input type='text' name='perubahan_jadi_jml[]' value='1'> <span class='text-muted'>stok saat ini: "+val.stok+"</span></td><td><button class='btn btn-danger btn-sm' type='button' onclick=\"dodeltr(\'"+val.id+"\')\">delete</button></td></tr>");
                      
                      $('#modalJadi').modal('toggle');
                    }
                    
                  }      
                    
                    
                }
            });
            
          }
          
          function changeFunc(context) {
            var selectBox = document.getElementById("select_id_"+context);
            var idselected = selectBox.options[selectBox.selectedIndex].value;
            
            var selectedurl = "";
            
            if(context == "petugas"){
              selectedurl = "<?= base_url() ?>index.php/api/petugas/"+idselected+"/get";
            } else {
              selectedurl = "<?= base_url() ?>index.php/api/barang/"+idselected+"/get";
            }
            
            $.ajax({
                url: selectedurl,
                type: 'GET',
                dataType: 'json', // added data type
                success: function(res) {
                    
                    val = res[0];
                    
                    if(context=="petugas") {
                    
                      var arrgender = [];
                    
                      arrgender["L"] = "Laki Laki";
                      arrgender["P"] = "Perempuan";
                      arrgender["N"] = "Tidak Disebut";
                      
                      var gender = arrgender[val.gender];
                    
                      $("#nama_"+context).html(val.nama)
                      $("#gender_"+context).html(gender)
                      $("#hp_"+context).html(val.no_telp)
                      $("#alamat_"+context).html(val.alamat)                    
                    
                    } else {
                    
                      var arrjenisbrg = [];
                    
                      arrjenisbrg["MH"] = "Mentah";
                      arrjenisbrg["JI"] = "Jadi";
                      
                      var jenisbrg = arrjenisbrg[val.jenis];
                    
                      $("#nama_"+context).html(val.nama)
                      $("#harga_"+context).html(val.harga)
                      $("#stok_"+context).html(val.stok)
                      $("#jenis_"+context).html(jenisbrg)
                    }                   
                    
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
