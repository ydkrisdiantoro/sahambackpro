<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link text-danger" href="<?php echo base_url(); ?>admin/logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </li>
    </ul>
</nav>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php base_url(); ?>admin" class="brand-link text-center">
        <!-- <img src="<?php base_url(); ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
        <i class="fa fa-tachometer-alt" style="margin-left: 0.8rem;"></i>
        <span class="brand-text font-weight-light">Administrator</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <?php
                $active = "";
                $halaman = $p;
                $halaman_nama = "index";
                $badge = "badge-light";
                for ($i = 0; $i < count($sidebar_nama); $i++) {
                    // echo $sidebar_nama[$i], $sidebar_url[$i];
                    $no = $i + 1;
                    if ($halaman == $sidebar_url[$i]) {
                        $active = "active";
                        $badge = "badge-light";
                        $halaman_nama = $sidebar_nama[$i];
                    } else {
                        $active = "";
                        $badge = "badge-primary";
                    }
                ?>
                    <li class="nav-item">
                        <a href="<?php echo base_url() . "admin/dashboard/" . $sidebar_url[$i]; ?>" class="nav-link <?php echo $active; ?>">
                            <!-- <i class="nav-icon fas fa-th"></i> -->
                            <span class="badge badge-pill <?php echo $badge; ?>"><?php echo $no; ?></span>
                            <p>
                                <?php echo $sidebar_nama[$i]; ?>
                                <!-- <span class="right badge badge-danger">New</span> -->
                            </p>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </nav>
    </div>
</aside>