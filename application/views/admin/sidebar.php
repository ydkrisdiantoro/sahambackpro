<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url(); ?>admin" class="brand-link text-center">
        <i class="fa fa-tachometer-alt brand-logo" style="margin-left: 0.8rem;"></i>
        <span class="brand-text font-weight-light">Prediksi Saham</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <?php
                $index = "";
                $input = "";
                $chart = "";
                if ($halaman == "index") {
                    $index = "active";
                }
                if ($halaman == "input") {
                    $input = "active";
                }
                if ($halaman == "chart") {
                    $chart = "active";
                }
                ?>
                <li class="nav-item has-treeview">
                    <a href="<?= base_url('admin'); ?>" class="nav-link <?php echo $index; ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="<?= base_url('admin/input'); ?>" class="nav-link <?php echo $input; ?>">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Forms
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="<?= base_url('admin/chart'); ?>" class="nav-link <?php echo $chart; ?>">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Charts
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Tables
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>