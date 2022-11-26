

<div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">

                    <div class="sb-sidenav-menu">
                        <div class="nav">                            
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="<?php echo base_url('index.php/dashboard');?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Master</div>
                            <a class="nav-link" href="<?php echo base_url('index.php/barang');?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Barang
                            </a>
                            <a class="nav-link" href="<?php echo base_url('index.php/tukang') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Tukang/Pekerja
                            </a>
                            <div class="sb-sidenav-menu-heading">Transaksi</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
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
                            <a class="nav-link" href="<?php echo base_url('index.php/hitlaporan');?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                laporan
                            </a>
                            <a class="nav-link" href="<?php echo base_url('index.php/hitlogout') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Logout
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        
                    </div>
                </nav>
            </div>