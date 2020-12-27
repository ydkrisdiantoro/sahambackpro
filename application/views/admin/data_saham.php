<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?php echo $nama_halaman; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Input Page</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Upload XLS Files</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="card-body">
                            <table id="example1" class="display table table-bordered table-striped">
                                <thead>
                                    <th>Tanggal</th>
                                    <th>Data Terakhir</th>
                                    <th>Data Pembukaan</th>
                                    <th>Data Tertinggi</th>
                                    <th>Data Terendah</th>
                                    <th>Volume</th>
                                    <th>Perubahan</th>
                                </thead>
                                <tbody>
                                    <?php foreach ($listdata as $list) { ?>
                                        <tr>
                                            <td><?php echo $list['tanggal']; ?></td>
                                            <td><?php echo $list['terakhir']; ?></td>
                                            <td><?php echo $list['pembukaan']; ?></td>
                                            <td><?php echo $list['tertinggi']; ?></td>
                                            <td><?php echo $list['terendah']; ?></td>
                                            <td><?php echo $list['volume']; ?></td>
                                            <td><?php echo $list['perubahan']; ?></td>

                                        </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Data Terakhir</th>
                                        <th>Data Pembukaan</th>
                                        <th>Data Tertinggi</th>
                                        <th>Data Terendah</th>
                                        <th>Volume</th>
                                        <th>Perubahan</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<!-- page script -->