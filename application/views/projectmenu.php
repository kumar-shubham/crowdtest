 <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-2">
                <div class="ibox float-e-margins">
                    <div class="ibox-content mailbox-content">
                        <div class="file-manager">
                            
                           
                            
                            <ul class="folder-list m-b-md" style="padding: 0">
                                <li><a href="<?php echo base_url();?>Menus/SubMenu/<?php echo $this->session->userdata('project_id')?>/dashboard"> <i class="fa fa-inbox "></i> Scrum Dashboard  </a></li>
                                <li><a href="<?php echo base_url();?>Menus/SubMenu/<?php echo $this->session->userdata('project_id')?>/issues"> <i class="fa fa-envelope-o"></i> Issues</a></li>
                                <!-- <li><a href="mailbox.html"> <i class="fa fa-certificate"></i> Epic</a></li> -->
                                <li><a href="<?php echo base_url();?>Menus/SubMenu/<?php echo $this->session->userdata('project_id')?>/stories"> <i class="fa fa-file-text-o"></i> Story </a></li>
                                <li><a href="<?php echo base_url();?>Menus/SubMenu/<?php echo $this->session->userdata('project_id')?>/sprint"> <i class="fa fa-list-alt"></i> Sprint</a></li>
                               <li><a href="<?php echo base_url();?>Menus/SubMenu/<?php echo $this->session->userdata('project_id')?>/timesheet"> <i class="fa fa-clock-o"></i> Timesheets </a></li>
                                <li><a href="<?php echo base_url();?>Menus/SubMenu/<?php echo $this->session->userdata('project_id')?>/reports"> <i class="fa fa-line-chart"></i> Reports</a></li>
                               
                            </ul>

                                      <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>