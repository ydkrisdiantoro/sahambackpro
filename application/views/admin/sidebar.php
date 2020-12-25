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
                $nhalaman = array("Dashboard", "Input Data", "Unggah Berkas", "Chart Page");
                $data_sidebar = array("index", "input", "unggah", "chart");
                for ($i = 0; $i < count($nhalaman); $i++) {
                    if ($data_sidebar[$i] == "index") {
                ?>
                        <li class="nav-item has-treeview">
                            <a href="<?= base_url('admin'); ?>" class="nav-link <?php if ($halaman == $data_sidebar[$i]) {
                                                                                    echo "active";
                                                                                } ?>">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    <?php echo $nhalaman[$i]; ?>
                                </p>
                            </a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item has-treeview">
                            <a href="<?= base_url('admin/') . $data_sidebar[$i]; ?>" class="nav-link <?php if ($halaman == $data_sidebar[$i]) {
                                                                                                            echo "active";
                                                                                                        } ?>">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>
                                    <?php echo $nhalaman[$i]; ?>
                                </p>
                            </a>
                        </li>
                <?php
                    }
                }
                ?>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>