<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Barang Masuk- DeranKusen</title>
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
                        <h1 class="mt-4">Laporan</h1>
                         <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">- some laporan</li>
                        </ol>
                      
                        <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
                          <div class="col">
                            <div class="card mb-4 rounded-3 shadow-sm">
                              <div class="card-header py-3">
                                <h4 class="my-0 fw-normal">Barang</h4>
                              </div>
                              <div class="card-body">
                                <h1 class="card-title pricing-card-title">Barang<small class="text-muted fw-light">/barang</small></h1>
                                <ul class="list-unstyled mt-3 mb-4">
                                  <li>detail info daftar barang</li>
                                </ul>
                                <a target='_blank' href="<?= base_url('index.php/laporan/cetak/barang2') ?>" class="w-100 btn btn-lg btn-outline-primary">Cetak daftar barang</a>
                              </div>
                            </div>
                          </div>
                          <div class="col">
                            <div class="card mb-4 rounded-3 shadow-sm">
                              <div class="card-header py-3">
                                <h4 class="my-0 fw-normal">Transkasi Masuk, Keluar & Perubahan</h4>
                              </div>
                              <div class="card-body">
                                <h1 class="card-title pricing-card-title">Transaksi<small class="text-muted fw-light" style="font-size:15pt;">/masuk, keluar, perubahan</small></h1>
                                <ul class="list-unstyled mt-3 mb-4">
                                  <li>Transaksi Masuk</li>
                                  <li>Transkasi Keluar</li>
                                  <li>Transaksi Perubahan</li>
                                </ul>
                                <a target='_blank' href="<?= base_url('index.php/laporan/cetak/masuk') ?>" class="w-100 btn btn-lg btn-outline-primary">Cetak Masuk</a>
                                <a target='_blank' href="<?= base_url('index.php/laporan/cetak/keluar') ?>" class="w-100 btn btn-lg btn-outline-primary">Cetak Keluar</a>
                                <a target='_blank' href="<?= base_url('index.php/laporan/cetak/perubahan') ?>" class="w-100 btn btn-lg btn-outline-primary">Cetak Perubahan</a>
                              </div>
                            </div>
                          </div>
                          <div class="col">
                          <div class="card mb-4 rounded-3 shadow-sm">
                              <div class="card-header py-3">
                                <h4 class="my-0 fw-normal">Pekerja</h4>
                              </div>
                              <div class="card-body">
                                <h1 class="card-title pricing-card-title">Pekerja<small class="text-muted fw-light" style="font-size:15pt;">/petugas</small></h1>
                                <ul class="list-unstyled mt-3 mb-4">
                                  <li>Daftar Pekerja</li>
                                </ul>
                                <a target='_blank' href="<?= base_url('index.php/laporan/cetak/petugas') ?>" class="w-100 btn btn-lg btn-outline-primary">Cetak Daftar pekerja</a>
                               
                              </div>
                            </div>
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
                          <li>Nama Suplier : <span id='suplier_nama'></span> dari Perusahaan : <span id='suplier_perusahaan'></span></li>
                          <li>Keterangan : <span id='keterangan_trx'></li>
                          <li>Tanggal : <span id='tanggal_trx'></li>
                        </ul>
                        <hr/>
                        <h5>Daftar Barang</h5>
                        <table id='det_brg_trx' class='table'>
                          <tr>
                            <td>Nama Barang</td>
                            <td>Harga</td>
                            <td>Jumlah Barang Masuk</td>
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
                url: "<?= base_url() ?>index.php/api/masuk/"+id+"/getdetail",
                type: 'GET',
                dataType: 'json', // added data type
                success: function(res) {
                    
                    val = res[0];
                    
                    $("#id_trx").html(val.id)
                    $("#suplier_nama").html(val.nama_suplier)
                    $("#suplier_perusahaan").html(val.nama_perusahaan)
                    $("#keterangan_trx").html(val.keterangan)
                    $("#tanggal_trx").html(val.tanggal)
                    
                    var detailBrg = "";
                    for (let index = 0; index < res.length; index++) {
                      const el = res[index];
                      
                      // console.log(el);
                      detailBrg = detailBrg + "<tr>" + "<td>"+el.nama_barang+"</td>" + "<td>"+el.harga+"</td>" + "<td>"+el.jumlah+"</td>" + "</tr>";
                      
                    }
                    
                    $("#det_brg_trx").html("<tr><td>Nama Barang</td><td>Harga</td><td>Jumlah Barang Masuk</td></tr>"+detailBrg);
                    
                    //TRANSAKSI
                    
                },
            });
              
              $('#detailModal').modal('toggle');
              
            }
        </script>
        
        <?php $this->load->view('navigator/bottomscript') ?>
    
    </body>
</html>
