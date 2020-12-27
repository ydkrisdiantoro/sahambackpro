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
                        <li class="breadcrumb-item active">Process Page</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <!-- LINE CHART -->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Proses Algoritma Backpropagation</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="row">

                                <div class="col-12 mb-3">
                                    <h3 class="card-title alert alert-info">1. Normalisasi Data</h3>
                                </div>
                                <div class="col-12">
                                    <table id="normalisasi" class="display table table-bordered table-striped">
                                        <thead>
                                            <th>Tanggal</th>
                                            <th>Data Terakhir (Z1)</th>
                                            <th>Data Pembukaan (Z2)</th>
                                            <th>Data Tertinggi (Z3)</th>
                                            <th>Data Terendah (Z4)</th>
                                            <th>Volume (Z5)</th>
                                            <th>Perubahan (Z6)</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $data = array();
                                            $data_normal = array();
                                            foreach ($listdata as $a) {
                                                $data["tanggal"][] = $a["tanggal"];
                                                $data["terakhir"][] = $a["terakhir"];
                                                $data["pembukaan"][] = $a["pembukaan"];
                                                $data["tertinggi"][] = $a["tertinggi"];
                                                $data["terendah"][] = $a["terendah"];
                                                $volume = explode("B", $a["volume"]);
                                                // print_r($volume);
                                                $data["volume"][] = $volume[0];
                                                $data["perubahan"][] = $a["perubahan"];
                                            }
                                            $terakhir_max = max($data["terakhir"]);
                                            $pembukaan_max = max($data["pembukaan"]);
                                            $tertinggi_max = max($data["tertinggi"]);
                                            $terendah_max = max($data["terendah"]);
                                            $volume_max = max($data["volume"]);
                                            $perubahan_max = max($data["perubahan"]);

                                            $terakhir_min = min($data["terakhir"]);
                                            $pembukaan_min = min($data["pembukaan"]);
                                            $tertinggi_min = min($data["tertinggi"]);
                                            $terendah_min = min($data["terendah"]);
                                            $volume_min = min($data["volume"]);
                                            $perubahan_min = min($data["perubahan"]);

                                            for ($i = 0; $i < count($data["tanggal"]); $i++) {
                                                $hasil_terakhir = round(($data["terakhir"][$i] - $terakhir_min) / ($terakhir_max - $terakhir_min), 6);
                                                $hasil_pembukaan = round(($data["pembukaan"][$i] - $pembukaan_min) / ($pembukaan_max - $pembukaan_min), 6);
                                                $hasil_tertinggi = round(($data["tertinggi"][$i] - $tertinggi_min) / ($tertinggi_max - $tertinggi_min), 6);
                                                $hasil_terendah = round(($data["terendah"][$i] - $terendah_min) / ($terendah_max - $terendah_min), 6);
                                                $hasil_perubahan = round(($data["perubahan"][$i] - $perubahan_min) / ($perubahan_max - $perubahan_min), 6);
                                                $hasil_volume = round(($data["volume"][$i] - $volume_min) / ($volume_max - $volume_min), 6);
                                                $data_normal["tanggal"][] = $data['tanggal'][$i];
                                                $data_normal["terakhir"][] = $hasil_terakhir;
                                                $data_normal["pembukaan"][] = $hasil_pembukaan;
                                                $data_normal["tertinggi"][] = $hasil_tertinggi;
                                                $data_normal["terendah"][] = $hasil_terendah;
                                                $data_normal["volume"][] = $hasil_volume;
                                                $data_normal["perubahan"][] = $hasil_perubahan;;                                            ?>
                                                <tr>
                                                    <td><?php echo $data['tanggal'][$i]; ?></td>
                                                    <td><?php echo $hasil_terakhir; ?></td>
                                                    <td><?php echo $hasil_pembukaan; ?></td>
                                                    <td><?php echo $hasil_tertinggi; ?></td>
                                                    <td><?php echo $hasil_terendah; ?></td>
                                                    <td><?php echo $hasil_volume; ?></td>
                                                    <td><?php echo $hasil_perubahan; ?></td>

                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>Data Terakhir (Z1)</th>
                                                <th>Data Pembukaan (Z2)</th>
                                                <th>Data Tertinggi (Z3)</th>
                                                <th>Data Terendah (Z4)</th>
                                                <th>Volume (Z5)</th>
                                                <th>Perubahan (Z6)</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>

                                <div class="col-12 my-3">
                                    <h3 class="card-title alert alert-info">2. Inisialisasi Bobot Awal</h3>
                                </div>
                                <div class="col-12">
                                    <table id="inisialisasi_bobot_awal" class="display table table-bordered table-striped">
                                        <thead>
                                            <th>Tanggal</th>
                                            <th>Xi</th>
                                            <th>Data Terakhir (Z1)</th>
                                            <th>Data Pembukaan (Z2)</th>
                                            <th>Data Tertinggi (Z3)</th>
                                            <th>Data Terendah (Z4)</th>
                                            <th>Volume (Z5)</th>
                                            <th>Perubahan (Z6)</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $data = array();
                                            foreach ($listdata as $a) {
                                                $data["tanggal"][] = $a["tanggal"];
                                                $data["terakhir"][] = $a["terakhir"];
                                                $data["pembukaan"][] = $a["pembukaan"];
                                                $data["tertinggi"][] = $a["tertinggi"];
                                                $data["terendah"][] = $a["terendah"];
                                                $volume = explode("B", $a["volume"]);
                                                // print_r($volume);
                                                $data["volume"][] = $volume[0];
                                                $data["perubahan"][] = $a["perubahan"];
                                            }
                                            $terakhir_max = max($data["terakhir"]);
                                            $pembukaan_max = max($data["pembukaan"]);
                                            $tertinggi_max = max($data["tertinggi"]);
                                            $terendah_max = max($data["terendah"]);
                                            $volume_max = max($data["volume"]);
                                            $perubahan_max = max($data["perubahan"]);

                                            $terakhir_min = min($data["terakhir"]);
                                            $pembukaan_min = min($data["pembukaan"]);
                                            $tertinggi_min = min($data["tertinggi"]);
                                            $terendah_min = min($data["terendah"]);
                                            $volume_min = min($data["volume"]);
                                            $perubahan_min = min($data["perubahan"]);

                                            for ($i = 0; $i < count($data["tanggal"]); $i++) {
                                                $hasil_terakhir = round(($data["terakhir"][$i] - $terakhir_min) / ($terakhir_max - $terakhir_min), 6);
                                                $hasil_pembukaan = round(($data["pembukaan"][$i] - $pembukaan_min) / ($pembukaan_max - $pembukaan_min), 6);
                                                $hasil_tertinggi = round(($data["tertinggi"][$i] - $tertinggi_min) / ($tertinggi_max - $tertinggi_min), 6);
                                                $hasil_terendah = round(($data["terendah"][$i] - $terendah_min) / ($terendah_max - $terendah_min), 6);
                                                $hasil_perubahan = round(($data["perubahan"][$i] - $perubahan_min) / ($perubahan_max - $perubahan_min), 6);
                                                $hasil_volume = round(($data["volume"][$i] - $volume_min) / ($volume_max - $volume_min), 6);
                                                $no_xi = $i + 1;
                                            ?>
                                                <tr>
                                                    <td><?php echo $data['tanggal'][$i]; ?></td>
                                                    <td><?php echo $no_xi; ?></td>
                                                    <td><?php echo $hasil_terakhir; ?></td>
                                                    <td><?php echo $hasil_pembukaan; ?></td>
                                                    <td><?php echo $hasil_tertinggi; ?></td>
                                                    <td><?php echo $hasil_terendah; ?></td>
                                                    <td><?php echo $hasil_volume; ?></td>
                                                    <td><?php echo $hasil_perubahan; ?></td>

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

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col (RIGHT) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
</div>