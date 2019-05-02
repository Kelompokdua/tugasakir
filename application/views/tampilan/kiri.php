 <div class="span3">
                        <div class="sidebar">
                            <ul class="widget widget-menu unstyled">
                                <li class="active"><?php echo "<a href='".base_url()."index.php/home'>"; ?>Beranda
                                </a></li>
                                <li><?php echo "<a href='".base_url()."index.php/poli'>"; ?>Poli</a>
                                    <?php if($this->session->userdata('logged_in')['level'] == 'admin' ||$this->session->userdata('logged_in')['level'] == 'operator' ): ?>
                                     <li><?php echo "<a href='".base_url()."index.php/obat'>"; ?>Obat</a></li>
                                      <li><?php echo "<a href='".base_url()."index.php/dokter'>"; ?>Dokter</a></li>
                                        <li><?php echo "<a href='".base_url()."index.php/pasien'>"; ?>Pasien</a></li>
                                        <li><?php echo "<a href='".base_url()."index.php/registrasi'>"; ?>List Registrasi</a></li>
                                      <?php endif; ?>   
                                     
                                        <li><?php echo "<a href='".base_url()."index.php/login/logout'>"; ?>Log out</a></li> 
                               </li>
                             </ul>
                                
          <ul class="widget widget-menu unstyled">
            <li><a class="collapsed" data-toggle="collapse" href="#togglePages3"><i class="menu-icon icon-cog"></i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right"></i>Pengaturan</a>
                <ul id="togglePages3" class="collapse unstyled">              
                  <li><?php echo "<a href='".base_url()."index.php/user/index'>"; ?><i class="menu-icon icon-wrench"></i>Pengguna</a></li>      
                    
                   
                </ul> 

           

                            <!--/.widget-nav-->
                            
                            <!--/.widget-nav-->
                           
                           
                        
                        </div>
                        <!--/.sidebar-->
                    </div>