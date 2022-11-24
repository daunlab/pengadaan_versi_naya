<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Suplier - Deran Kusen</title>
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
                        <h1 class="mt-4">Aplikasi Pendataan</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">- JL.Petaruman, Cihampelas.</li>
                        </ol>
                            <li class="breadcrumb-item active">DAFTAR SUPLIER</li>
                        <ol>
                            
                        <div class="card mb-4">
                            <div class="card-header">
                            <div class="container">
                            <div class="container mt-3">
                            <a class="btn btn-primary" href="<?= base_url('index.php/suplier/tambah'); ?>">Tambah Suplier</a>
                        </div>
                        <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama</th>
                                            <th>Nama Perusahaan</th>
                                            <th>Alamat </th>
                                            <th>Kontak</th>
                                            <th class="text-center">aksi</th>
                                            
                                        </tr>
                                    </thead>                                 
                                    <tbody>
                                    
                                        <?php foreach ($suplier as $i) { ?>
                                        <tr>
                                            <td><?= $i->id ?></td>
                                            <td><?= $i->nama?></td>
                                            <td><?= $i->nama_perusahaan?></td>
                                            <td><?= $i->alamat?></td>
                                            <td><?= $i->kontak?></td>
                                            <td class="text-center">
                                                <form id="formdel_<?= $i->id ?>" action='<?= base_url('index.php/suplier/'.$i->id.'/hitremove')?>' method='POST'>
                                                    <input type='hidden' name='aksi' value="delete" >
                                                    <input type='hidden' name='id' value="<?= $i->id ?>" >
                                                </form>
                                                <a href="<?= base_url('index.php/suplier/'.$i->id.'/edit') ?>" class="btn btn-warning btn-sm">Edit</a>
                                                <a href="javascript:formSubmit('<?= $i->id ?>');" class="btn btn-danger btn-sm">Hapus</a>
                                                </td>
                                        
                                    
                                        </tr>
                                        <?php } ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

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
