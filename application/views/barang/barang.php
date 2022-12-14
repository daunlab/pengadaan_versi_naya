<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Barang - Deran Kusen</title>
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
                        <h1 class="mt-4">Daftar Barang</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">(Barang Mentah & Jadi)</li>
                        </ol>
                           
                        <ol>
                            
                        <div class="card mb-4">
                            <div class="card-header">
                            <div class="container">
                            <div class="container mt-3">
                            <a class="btn btn-primary" href="<?= base_url('index.php/barang/tambah'); ?>">Tambah Barang yang Dijual</a>
                        </div>
                        <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>ID Barang </th>
                                            <th>Nama Barang </th>
                                            <th>Satuan </th>
                                            <th>Harga </th>
                                            <th>stok</th>
                                            <th>jenis</th>
                                            <th class="text-center">aksi</th>
                                            
                                        </tr>
                                    </thead>                                 
                                    <tbody>
                                    
                                        <?php foreach ($barang as $i) { ?>
                                        <tr>
                                            <td><?= $i->id ?></td>
                                            <td><?= $i->nama?></td>
                                            <td><?= $i->satuan?></td>
                                            <td><?= $i->harga?></td>
                                            <td><?= $i->stok?></td>
                                            <td><?= $i->jenis?></td>
                                            <td class="text-center">
                                                <form id="formdel_<?= $i->id ?>" action='<?= base_url('index.php/barang/'.$i->id.'/hitremove')?>' method='POST'>
                                                    <input type='hidden' name='aksi' value="delete" >
                                                    <input type='hidden' name='id' value="<?= $i->id ?>" >
                                                </form>
                                                <a href="<?= base_url('index.php/barang/'.$i->id.'/edit') ?>" class="btn btn-warning btn-sm">Edit</a>
                                                <a href="javascript:formSubmit('<?= $i->id ?>');" class="btn btn-danger btn-sm">Hapus</a>
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
                        <input type="text" name="id" placeholder="id barang" class="form-control">
                        <br>
                        <input type="text" name="namabarang" placeholder="nama barang" class="form-control">
                        <br>
                        <input type="text" name="harga" placeholder="harga" class="form-control">
                        <br>
                        <input type="text" name="stok" placeholder="stok" class="form-control">
                        <br>
                        <input type="text" name="jenis" placeholder="jenis" class="form-control">
                        <br>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        </div>
                        </form>

                </main>
                <footer class="py-4 bg-light mt-auto">
                    <?php $this->load->view('pages/footer'); ?>
                </footer>
            </div>
        </div>
        
        <script>
            function formSubmit(id) {
                // alert(id)
                $('form#formdel_'+id).submit();
            }
        </script>
        
        <?php $this->load->view('navigator/bottomscript'); ?>

    </body>
</html>
