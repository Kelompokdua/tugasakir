 <div class="span3">
                        <div class="sidebar">
                            <ul class="widget widget-menu unstyled">
                                <li class="active"><?php echo "<a href='".base_url()."index.php/home'>"; ?>Beranda
                                </a></li>
                                <li><?php echo "<a href='".base_url()."index.php/poli'>"; ?>Poli</a>
                                    <?php if($this->session->userdata('logged_in')['level'] == 'admin' ||$this->session->userdata('logged_in')['level'] == 'operator' ): ?>
                                     <li><?php echo "<a href='".base_url()."index.php/obat'>"; ?>Obat</a>
                                      <?php endif; ?>   
                                     <?php if($this->session->userdata('logged_in')['level'] == 'admin' || $this->session->userdata('logged_in')['level'] == 'dokter'): ?>
                                 <li><?php echo "<a href='".base_url()."index.php/pengobatan'>"; ?>Pengobatan</a></li>
                                       <?php endif; ?>  
                               
                                
                            </ul>
                            <!--/.widget-nav-->
                            
                            <!--/.widget-nav-->
                           
                           
                        
                        </div>
                        <!--/.sidebar-->
                    </div>