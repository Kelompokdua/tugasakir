        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                   
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link <?= ($menu == "home") ? "active" : "" ?>" href="<?php echo base_url() ?>index.php/home"><i class="fa fa-fw fa-user-circle"></i>Dashboard <span class="badge badge-success">6</span></a>
                                
                            </li>
                            <?php if($this->session->userdata('logged_in')['level'] == 'admin' ||$this->session->userdata('logged_in')['level'] == 'petugas' ): ?>
                            <li class="nav-item">
                                <a class="nav-link <?= ($menu == "poli") ? "active" : "" ?>" href="<?php echo base_url('index.php/poli') ?>"><i class="fa fa-fw fa-rocket"></i>Poli</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= ($menu == "pasien") ? "active" : "" ?>" href="<?php echo base_url('index.php/pasien') ?>"><i class="fas fa-fw fa-address-book"></i>Pasien</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link <?= ($menu == "dokter") ? "active" : "" ?>" href="<?php echo base_url('index.php/dokter') ?>"><i class="fab fa fa-user-md"></i>Dokter</a>
                                
                            </li>
                             <?php endif; ?>
                             <?php if($this->session->userdata('logged_in')['level'] == 'admin' ||$this->session->userdata('logged_in')['level'] == 'asisten' ): ?>
                            <li class="nav-item">
                                <a class="nav-link <?= ($menu == "registrasi") ? "active" : "" ?>" href="<?php echo base_url('index.php/registrasi') ?>"><i class="fas fa-fw fa-table"></i>List Registrasi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= ($menu == "rekam") ? "active" : "" ?>" href="<?php echo base_url('index.php/rekam') ?>"><i class="fas fa-fa fa-heartbeat"></i>Rekam Medis</a>
                            </li>
                            
                            <?php endif; ?>
                             <?php if($this->session->userdata('logged_in')['level'] == 'admin' ||$this->session->userdata('logged_in')['level'] == 'farmasi' ): ?>
                             <li class="nav-item">
                                <a class="nav-link <?= ($menu == "obat") ? "active" : "" ?>" href="<?php echo base_url('index.php/obat') ?>"><i class="fas fa-fw fa-medkit"></i>Obat</a>
                            </li>
                             <li class="nav-item">
                                <a class="nav-link <?= ($menu == "verifikasi") ? "active" : "" ?>" href="<?php echo base_url('index.php/verifikasi') ?>"><i class="fas fa-fw fa-check-square"></i>Verifikasi</a>
                            </li>
                             <?php endif; ?>
                              <?php if($this->session->userdata('logged_in')['level'] == 'admin' ||$this->session->userdata('logged_in')['level'] == 'kasir' ): ?>  
                             <li class="nav-item">
                                <a class="nav-link <?= ($menu == "transaksi") ? "active" : "" ?>" href="<?php echo base_url('index.php/transaksi') ?>"><i class="fas fa-fw fa-calculator"></i>Transaksi</a>
                            </li>
                            <?php endif; ?> 
                              <?php if($this->session->userdata('logged_in')['level'] == 'admin' ): ?>   
                            <li class="nav-divider">
                                Pengaturan
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-6" aria-controls="submenu-6"><i class="fas fa-fw fa-wrench"></i>Pengaturan </a>
                                <div id="submenu-6" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link <?= ($menu == "user") ? "active" : "" ?>" href="<?php echo base_url('index.php/user/index') ?>">Pengguna</a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </li>
                            <?php endif; ?> 
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url('index.php/login/logout') ?>" ><i class="fas fa-fw fa-inbox"></i>Logout <span class="badge badge-secondary">New</span></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>