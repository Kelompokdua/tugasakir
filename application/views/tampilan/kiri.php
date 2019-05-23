 <div class="span3">
                        <div class="sidebar">
                            <ul class="widget widget-menu unstyled">
                                <li class="active"><?php echo "<a href='".base_url()."index.php/home'>"; ?>Beranda
                                </a></li>
                                    <?php if($this->session->userdata('logged_in')['level'] == 'admin' ||$this->session->userdata('logged_in')['level'] == 'petugas' ): ?>
                                       <li><?php echo "<a href='".base_url()."index.php/poli'>"; ?>Poli</a>
                                      <li><?php echo "<a href='".base_url()."index.php/pasien'>"; ?>Pasien</a></li>
                                      <li><?php echo "<a href='".base_url()."index.php/dokter'>"; ?>Dokter</a></li>
                                       <?php endif; ?>
                                     <?php if($this->session->userdata('logged_in')['level'] == 'admin' ||$this->session->userdata('logged_in')['level'] == 'asisten' ): ?>
                                     
                                      <li><?php echo "<a href='".base_url()."index.php/registrasi'>"; ?>List Registrasi</a></li>
                                      <li><?php echo "<a href='".base_url()."index.php/rekam'>"; ?>Rekam Medis</a></li>
                                       <?php endif; ?>

                                        <?php if($this->session->userdata('logged_in')['level'] == 'admin' ||$this->session->userdata('logged_in')['level'] == 'farmasi' ): ?>
                                     <li><?php echo "<a href='".base_url()."index.php/obat'>"; ?>Obat</a></li> 
                                     <li><?php echo "<a href='".base_url()."index.php/verifikasi'>"; ?>Verifikasi</a></li> 
                                     <?php endif; ?>   

                                     <?php if($this->session->userdata('logged_in')['level'] == 'admin' ||$this->session->userdata('logged_in')['level'] == 'kasir' ): ?>   
                                      <li><?php echo "<a href='".base_url()."index.php/transaksi'>"; ?>Transaksi</a></li> 
                                     <?php endif; ?>     
                                        
                                         
                                        
                                      
                                        <li><?php echo "<a href='".base_url()."index.php/login/logout'>"; ?>Log out</a></li> 
                               </li>
                             </ul>
                           <?php if($this->session->userdata('logged_in')['level'] == 'admin' ): ?>     
          <ul class="widget widget-menu unstyled">
            <li><a class="collapsed" data-toggle="collapse" href="#togglePages3"><i class="menu-icon icon-cog"></i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right"></i>Pengaturan</a>
                <ul id="togglePages3" class="collapse unstyled">              
                  <li><?php echo "<a href='".base_url()."index.php/user/index'>"; ?><i class="menu-icon icon-wrench"></i>Pengguna</a></li>      
                    
                   
                </ul> 
                <?php endif; ?>     

           

                            <!--/.widget-nav-->
                            
                            <!--/.widget-nav-->
                           
                           
                        
                        </div>
                        <!--/.sidebar-->
                    </div>