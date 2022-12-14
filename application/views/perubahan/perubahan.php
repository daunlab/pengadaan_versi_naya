<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Perubahan - DeranKusen</title>
        <?php $this->load->view('navigator/topscript') ?>
    </head>
    <body class="sb-nav-fixed">
        
        <!-- start top nav -->

        <?php $this->load->view('navigator/topnav') ?>

        <!-- end top nav -->

        <div id="layoutSidenav">
            
            <!-- start navigator -->
                <?php $this->load->view('navigator/mainnav') ?>
            <!-- send navigator -->


            <div id="layoutSidenav_content">
                <main>
                    
                    <!-- the content -->
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Perubahan</h1>
                         <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"> Perubahan barang ya dikerjakan petugas</li>
                        </ol>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                            <div class="container">
                            <div class="container mt-3">
                            <a class="btn btn-primary" href="<?= base_url('index.php/perubahan/tambah'); ?>">Tambah Perubahan</a>
                        </div>
                        <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>ID Perubahan</th>
                                            <th>Keterangan</th>
                                            <th>Tanggal </th>
                                            <th class="text-center">aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($perubahan as $i) { ?>
                                        <tr>
                                            <td><?= $i->id  ?></td>
                                            <td><?= $i->keterangan ?></td>
                                            <th><?= $i->tanggal ?></th>
                                            <td class="text-center">
                                                <form id="formdel_<?= $i->id ?>" action='<?= base_url('index.php/perubahan/'.$i->id.'/hitremove')?>' method='POST'>
                                                    <input type='hidden' name='aksi' value="delete" >
                                                    <input type='hidden' name='id' value="<?= $i->id ?>" >
                                                </form>
                                                <button class='btn btn-info btn-sm' type="button" onclick="showDetail('<?= $i->id ?>')">Info</button>
                                                <!-- <a href="<?= base_url('index.php/perubahan/'.$i->id.'/edit') ?>" class="btn btn-warning btn-sm">Edit</a> -->
                                                <a href="javascript:formSubmit('<?= $i->id ?>');" class="btn btn-danger btn-sm">Hapus</a>
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
                    <div class="modal fade" id="detailModal">
                    <div class="modal-dialog">
                    <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                    <h4 class="modal-title">Detail Transaksi</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
              
                    <!-- Modal body -->
                    
                    <div class="modal-body">
                      <div>
                        <h5>Transaksi</h5>
                        <ul>
                          <li>Kode Transaksi : <span id='id_trx'></span></li>
                          <li>Keterangan : <span id='keterangan_trx'></li>
                          <li>Tanggal : <span id='tanggal_trx'></li>
                        </ul>
                        <hr/>
                        <h5>Daftar Petugas</h5>
                        <table id='det_petugas' class='table'>
                          <tr>
                            <td>Nama</td>
                            <td>No hp</td>
                            <td>alamat</td>
                          </tr>
                        </table>
                        <hr/>
                        <h5>Daftar Barang Mentah</h5>
                        <table id='det_mentah' class='table'>
                          <tr>
                            <td>Nama Barang</td>
                            <td>Jumlah Pemakaian</td>
                          </tr>
                        </table>
                        <hr/>
                        <h5>Daftar Barang Jadi</h5>
                        <table id='det_jadi' class='table'>
                          <tr>
                            <td>Nama Barang</td>
                            <td>Jumlah Jadi</td>
                          </tr>
                        </table>
                      </div>
                    </div>

                </main>
                <footer class="py-4 bg-light mt-auto">
                    <?php $this->load->view('pages/footer') ?>
                </footer>
            </div>
        </div>
        <script>

            function formSubmit(id) {
                $('form#formdel_'+id).submit();
            }
            
            function showDetail(id) {
              $.ajax({
                url: "<?= base_url() ?>index.php/api/perubahan/"+id+"/getinfo",
                type: 'GET',
                dataType: 'json', // added data type
                success: function(res) {
                    
                    val = res[0];
                    
                    $("#id_trx").html(val.id)
                    $("#keterangan_trx").html(val.keterangan)
                    $("#tanggal_trx").html(val.tanggal)
                    
                },
              });
              
              $.ajax({
                url: "<?= base_url() ?>index.php/api/perubahan/"+id+"/getpetugas",
                type: 'GET',
                dataType: 'json', // added data type
                success: function(res) {
                    
                    var detailPetugas = "";
                    for (let index = 0; index < res.length; index++) {
                      const el = res[index];
                      detailPetugas = detailPetugas + "<tr>" + "<td>"+el.nama+"</td>" + "<td>"+el.no_telp+"</td>" + "<td>"+el.alamat+"</td>" + "</tr>";
                    }
                    
                    $("#det_petugas").html("<tr><td>Nama</td><td>No Hp</td><td>Alamat</td></tr>"+detailPetugas);
                },
              });
              
              $.ajax({
                url: "<?= base_url() ?>index.php/api/perubahan/"+id+"/getmentah",
                type: 'GET',
                dataType: 'json', // added data type
                success: function(res) {
                    
                    var detailBrg = "";
                    for (let index = 0; index < res.length; index++) {
                      const el = res[index];
                      detailBrg = detailBrg + "<tr>" + "<td>"+el.nama_barang+"</td>" + "<td>"+el.jumlah+"</td>" + "</tr>";
                    }
                    
                    $("#det_mentah").html("<tr><td>Nama Barang</td><td>Jumlah Perubahan</td></tr>"+detailBrg);
                },
              });
              
              $.ajax({
                url: "<?= base_url() ?>index.php/api/perubahan/"+id+"/getjadi",
                type: 'GET',
                dataType: 'json', // added data type
                success: function(res) {
                    
                    var detailBrg = "";
                    for (let index = 0; index < res.length; index++) {
                      const el = res[index];
                      detailBrg = detailBrg + "<tr>" + "<td>"+el.nama_barang+"</td>" + "<td>"+el.jumlah+"</td>" + "</tr>";
                    }
                    
                    $("#det_jadi").html("<tr><td>Nama Barang</td><td>Jumlah Perubahan</td></tr>"+detailBrg);
                },
              });
              
              $('#detailModal').modal('toggle');
              
            }
        </script>
        
        <?php $this->load->view('navigator/bottomscript') ?>

    </body>
</html>
