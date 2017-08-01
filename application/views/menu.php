  <?php  $data=$this->session->userdata('first_level_menu');
  /* echo ('========='.$data['menu_name'][1]);
  echo ("<pre>");
  print_r($data);
  echo("</pre>");  */
  ?>
  <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="<?php echo(base_url()."./uploads/"."display_logo.jpg");?>" />
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">Agile Tech</strong>
                             </span> <span class="text-muted text-xs block"> </span> </span> </a>
                       
                    </div>
                    <div class="logo-element">
                        Scrum
                    </div>
                </li>
               
               <?php foreach ($data['menu_name'] as $item):?>

				<?php echo $item;?>
				
				<?php endforeach;?>
         </ul>      
        </div>
    </nav>