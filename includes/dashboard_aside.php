
<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
		<!--left-fixed -navigation-->
		<aside class="sidebar-left">
      <nav class="navbar navbar-inverse">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <h1><a class="navbar-brand" href="index.html"><span class="fa fa-area-chart"></span> Glance<span class="dashboard_text">Design dashboard</span></a></h1>
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="sidebar-menu">
              <li class="header">MAIN NAVIGATION</li>
              <li class="treeview">
                <a href="index.html">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
              </li>
              <?php if ($utype=="Customer"){ ?>              
              <li class="treeview">
                <a href="index.html">
                <i class="fa fa-dashboard"></i> <span>Customer Registration</span>
                </a>
              </li>
              <?php } 

            else if ($utype=="Engineering Consultant") { ?>              
              <li class="treeview">
                <a href="index.html">
                <i class="fa fa-dashboard"></i> <span>Engineering Consultant Registration</span>
                </a>
              </li>
              <?php } 

            else if ($utype=="Vendor"){ ?>              
              <li class="treeview">
                <a href="<?php echo $vendor_reg_path ?>" >
                <i class="fa fa-dashboard"></i> <span>Vendor Registration</span>
                </a>
              </li>
              <?php } ?>
			
              
            </ul>
          </div>
          <!-- /.navbar-collapse -->
      </nav>
    </aside>
	</div>