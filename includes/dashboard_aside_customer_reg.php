<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Pitath Electric Dashboard</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item">
    <a class="nav-link" href="Welcome.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<?php if ($utype=="Customer"){ ?>              
            <li class="nav-item active">
            <a class="nav-link" href="Customer_reg.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Customer Registration</span>
                </a>
              </li>
              <?php } 

            else if ($utype=="Engineering Consultant") { ?>              
            <li class="nav-item">
            <a class="nav-link" href="Engg_Consultant_register.php">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Engineering Consultant Registration</span>
                </a>
              </li>
              <?php } 

            else if ($utype=="Vendor"){ ?>              
                <li class="nav-item">
                <a class="nav-link" href="<?php echo $vendor_reg_path ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                 <span>Vendor Registration</span>
                </a>
              </li>
              <?php } ?>
			


</ul>
<!-- End of Sidebar -->