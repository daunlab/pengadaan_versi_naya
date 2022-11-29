             <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">

                    <div class="sb-sidenav-menu">
                        <div class="nav">                            
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="<?php echo base_url('index.php/dashboard');?>">
                            <i class="fa fa-dashboard"></i>
                            <i style="font-size:10px" class="fa">&#xf0e4;</i>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Master</div>
                            <a class="nav-link" href="<?php echo base_url('index.php/barang');?>">
                            <i class='fas fa-th'></i>
                            <i style="font-size: 10px" class="fa">&#xf0e4;</i>
                                Barang
                            </a>
                            <a class="nav-link" href="<?php echo base_url('index.php/tukang') ?>">
                            <i class="fa fa-male"></i>
                            <i style="font-size: 10px" class="fa">&#xf0e4;</i>
                                Tukang/Pekerja
                            </a>
                            <div class="sb-sidenav-menu-heading">Transaksi</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <i class='fas fa-cart-arrow-down'></i>
                                <i style="font-size: 10px" class="fa">&#xf0e4;</i>
                                Barang
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?php echo base_url('index.php/suplier')?>">Suplier</a>
                                    <a class="nav-link" href="<?php echo base_url('index.php/masuk');?>">Daftar Barang Masuk</a>
                                    <a class="nav-link" href="<?php echo base_url('index.php/pembeli');?>">Pembeli</a>
                                    <a class="nav-link" href="<?php echo base_url('index.php/keluar');?>">Daftar Barang Keluar</a>
                                    <a class="nav-link" href="<?php echo base_url('index.php/perubahan');?>">Perubahan Barang</a>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="<?php echo base_url('index.php/laporan');?>">
                            <i class='fas fa-edit'></i>
                            <i style="font-size: 10px" class="fa">&#xf0e4;</i>
                                laporan
                            </a>
                            <a class="nav-link" href="<?php echo base_url('index.php/hitlogout') ?>">
                            <i class="fa fa-mail-reply"></i>
                                 <i style="font-size: 10px" class="fa">&#xf0e4;</i>
                                Logout
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        
                    </div>
                </nav>
            </div>