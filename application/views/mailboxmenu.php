 <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-2">
                <div class="ibox float-e-margins">
                    <div class="ibox-content mailbox-content">
                        <div class="file-manager">
                            
                           
                            
                            <ul class="folder-list m-b-md" style="padding: 0">
                                <li><a href="<?php echo base_url();?>Mailbox"> <i class="fa fa-inbox "></i> Inbox  </a></li>
                                <li><a href="<?php echo base_url();?>Mailbox/Compose"> <i class="fa fa-envelope-o"></i> Compose</a></li>
                                <!-- <li><a href="mailbox.html"> <i class="fa fa-certificate"></i> Epic</a></li> -->
                                <li><a href="<?php echo base_url();?>Mailbox/Sentmail"> <i class="fa fa-file-text-o"></i> Sent Mail </a></li>
                                <li><a href="<?php echo base_url();?>Mailbox/Draft/<?php echo $this->session->userdata('user_name')?>/sprint"> <i class="fa fa-list-alt"></i> Draft</a></li>
                                                              
                            </ul>

                                      <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>