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
                                    <h3 class="card-title alert alert-primary">1. Normalisasi Data</h3>
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
                                                $hasil_terakhir = round(((0.8 * ($data["terakhir"][$i] - $terakhir_min)) / ($terakhir_max - $terakhir_min)) + 0.1, 6);
                                                $hasil_pembukaan = round(((0.8 * ($data["pembukaan"][$i] - $pembukaan_min)) / ($pembukaan_max - $pembukaan_min)) + 0.1, 6);
                                                $hasil_tertinggi = round(((0.8 * ($data["tertinggi"][$i] - $tertinggi_min)) / ($tertinggi_max - $tertinggi_min)) + 0.1, 6);
                                                $hasil_terendah = round(((0.8 * ($data["terendah"][$i] - $terendah_min)) / ($terendah_max - $terendah_min)) + 0.1, 6);
                                                $hasil_perubahan = round(((0.8 * ($data["perubahan"][$i] - $perubahan_min)) / ($perubahan_max - $perubahan_min)) + 0.1, 6);
                                                $hasil_volume = round(((0.8 * ($data["volume"][$i] - $volume_min)) / ($volume_max - $volume_min)) + 0.1, 6);
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
                                            <?php
                                            } ?>
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
                                    <h3 class="card-title alert alert-secondary">2. Inisialisasi Bobot Awal Input-Hidden Layer</h3>
                                </div>
                                <div class="col-12">
                                    <table id="inisialisasi_bobot_awal" class="display table table-bordered table-striped">
                                        <thead>
                                            <th>Tanggal</th>
                                            <th>Xi</th>
                                            <th>(Z1)</th>
                                            <th>(Z2)</th>
                                            <th>(Z3)</th>
                                            <th>(Z4)</th>
                                            <th>(Z5)</th>
                                            <th>(Z6)</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                            function random()
                                            {
                                                $hasil = 0;
                                                while ($hasil == 0) {
                                                    $random = rand(-9, 9);
                                                    $hasil = $random / 10;
                                                }
                                                return $hasil;
                                            }
                                            $Xi_0 = array();
                                            $Xi_0_bias = array('0.1', '0.1', '0.1', '0.1', '0.1', '0.1');
                                            for ($i = 0; $i < 6; $i++) {
                                                $Xi_0_bias[$i] = random();
                                            }
                                            for ($i = 0; $i < count($data_normal["tanggal"]); $i++) {
                                                $no_xi = $i + 1;
                                                $Xi_0["Z1"][] = random();
                                                $Xi_0["Z2"][] = random();
                                                $Xi_0["Z3"][] = random();
                                                $Xi_0["Z4"][] = random();
                                                $Xi_0["Z5"][] = random();
                                                $Xi_0["Z6"][] = random();
                                            ?>
                                                <tr>
                                                    <td><?php echo $data_normal['tanggal'][$i]; ?></td>
                                                    <td><?php echo $no_xi; ?></td>
                                                    <td><?php echo $Xi_0["Z1"][$i]; ?></td>
                                                    <td><?php echo $Xi_0["Z2"][$i]; ?></td>
                                                    <td><?php echo $Xi_0["Z3"][$i]; ?></td>
                                                    <td><?php echo $Xi_0["Z4"][$i]; ?></td>
                                                    <td><?php echo $Xi_0["Z5"][$i]; ?></td>
                                                    <td><?php echo $Xi_0["Z6"][$i]; ?></td>
                                                </tr>
                                            <?php } ?>
                                            <tr>
                                                <td><?php echo "1"; ?></td>
                                                <td><?php echo ""; ?></td>
                                                <td><?php echo $Xi_0_bias[0]; ?></td>
                                                <td><?php echo $Xi_0_bias[1]; ?></td>
                                                <td><?php echo $Xi_0_bias[2]; ?></td>
                                                <td><?php echo $Xi_0_bias[3]; ?></td>
                                                <td><?php echo $Xi_0_bias[4]; ?></td>
                                                <td><?php echo $Xi_0_bias[5]; ?></td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>Xi</th>
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

                                <div class="col-12 my-3">
                                    <h3 class="card-title alert alert-warning">3. Inisialisasi Bobot Awal Hidden-Output Layer</h3>
                                </div>
                                <div class="col-12">
                                    <table id="inisialisasi_bobot_awal" class="table table-bordered table-striped">
                                        <thead>
                                            <th></th>
                                            <th>Y</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $Zi = array();
                                            $Zi_bias = 0.1;
                                            for ($i = 0; $i < count($Xi_0); $i++) {
                                                $no_xi = $i + 1;
                                                $Zi[] = random();
                                            ?>
                                                <tr>
                                                    <td><?php echo "Z" . $no_xi; ?></td>
                                                    <td><?php echo $Zi[$i]; ?></td>
                                                </tr>
                                            <?php } ?>
                                            <tr>
                                                <td><?php echo '1'; ?></td>
                                                <td><?php echo $Zi_bias; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-12 my-3">
                                    <h3 class="card-title alert alert-danger">4. Menentukan nilai epoch maksimum dan nilai minimum error </h3>
                                </div>
                                <div class="col-12">
                                    <?php
                                    $epoch = 10;
                                    $min_error = 0.2;
                                    ?>
                                    <h4>Nilai maksimum epoch: <?php echo $epoch; ?></h4>
                                    <h4>Nilai minimum error: <?php echo $min_error; ?></h4>
                                </div>

                                <div class="col-12 my-3">
                                    <h3 class="card-title alert alert-info">5. Proses Feedforward (XiVij)</h3>
                                </div>
                                <div class="col-12">
                                    <table id="inisialisasi_bobot_awal" class="display table table-bordered table-striped">
                                        <thead>
                                            <th>Tanggal</th>
                                            <th>Xi</th>
                                            <th>(Xi*Z1)</th>
                                            <th>(Xi*Z2)</th>
                                            <th>(Xi*Z3)</th>
                                            <th>(Xi*Z4)</th>
                                            <th>(Xi*Z5)</th>
                                            <th>(Xi*Z6)</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $Xi = $data_normal;
                                            $Vij = $Xi_0;
                                            $Xi_Vij = array();

                                            for ($i = 0; $i < count($Xi["tanggal"]); $i++) {
                                                $no_xi = $i + 1;
                                                $Xi_Vij["Z1"][] = $Xi["terakhir"][$i] * $Vij["Z1"][$i];
                                                $Xi_Vij["Z2"][] = $Xi["pembukaan"][$i] * $Vij["Z2"][$i];
                                                $Xi_Vij["Z3"][] = $Xi["tertinggi"][$i] * $Vij["Z3"][$i];
                                                $Xi_Vij["Z4"][] = $Xi["terendah"][$i] * $Vij["Z4"][$i];
                                                $Xi_Vij["Z5"][] = $Xi["volume"][$i] * $Vij["Z5"][$i];
                                                $Xi_Vij["Z6"][] = $Xi["perubahan"][$i] * $Vij["Z6"][$i];
                                            ?>
                                                <tr>
                                                    <td><?php echo $data_normal['tanggal'][$i]; ?></td>
                                                    <td><?php echo $no_xi; ?></td>
                                                    <td><?php echo $Xi_Vij["Z1"][$i]; ?></td>
                                                    <td><?php echo $Xi_Vij["Z2"][$i]; ?></td>
                                                    <td><?php echo $Xi_Vij["Z3"][$i]; ?></td>
                                                    <td><?php echo $Xi_Vij["Z4"][$i]; ?></td>
                                                    <td><?php echo $Xi_Vij["Z5"][$i]; ?></td>
                                                    <td><?php echo $Xi_Vij["Z6"][$i]; ?></td>
                                                </tr>
                                            <?php } ?>
                                            <tr>
                                                <td><?php echo "1"; ?></td>
                                                <td><?php echo ""; ?></td>
                                                <td><?php echo $Xi_0_bias[0]; ?></td>
                                                <td><?php echo $Xi_0_bias[1]; ?></td>
                                                <td><?php echo $Xi_0_bias[2]; ?></td>
                                                <td><?php echo $Xi_0_bias[3]; ?></td>
                                                <td><?php echo $Xi_0_bias[4]; ?></td>
                                                <td><?php echo $Xi_0_bias[5]; ?></td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>Xi</th>
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

                                <div class="col-12 my-3">
                                    <h3 class="card-title alert alert-info">6. Proses Feedforward hasil di hidden layer (Znet)</h3>
                                </div>
                                <div class="col-12">
                                    <table id="inisialisasi_bobot_awal" class="table table-bordered table-striped">
                                        <thead>
                                            <th>Znet_1</th>
                                            <th>Znet_2</th>
                                            <th>Znet_3</th>
                                            <th>Znet_4</th>
                                            <th>Znet_5</th>
                                            <th>Znet_6</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $Znet = array();

                                            for ($i = 0; $i < count($Xi_Vij); $i++) {
                                                $no_xi = $i + 1;
                                                $Znet[$i] = 0;
                                                for ($j = 0; $j < count($Xi_Vij["Z1"]); $j++) {
                                                    $Znet[$i] = $Znet[$i] + $Xi_Vij["Z" . $no_xi][$j];
                                                }
                                                $Znet[$i] = $Xi_0_bias[$i] + $Znet[$i];
                                            } ?>
                                            <tr>
                                                <td><?php echo $Znet[0]; ?></td>
                                                <td><?php echo $Znet[1]; ?></td>
                                                <td><?php echo $Znet[2]; ?></td>
                                                <td><?php echo $Znet[3]; ?></td>
                                                <td><?php echo $Znet[4]; ?></td>
                                                <td><?php echo $Znet[5]; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-12 my-3">
                                    <h3 class="card-title alert alert-info">7. Proses Feedforward hasil di hidden layer (Znet) dengan fungsi aktivasi</h3>
                                </div>
                                <div class="col-12">
                                    <table id="inisialisasi_bobot_awal" class="table table-bordered table-striped">
                                        <thead>
                                            <th>Z_1</th>
                                            <th>Z_2</th>
                                            <th>Z_3</th>
                                            <th>Z_4</th>
                                            <th>Z_5</th>
                                            <th>Z_6</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $Z = array();

                                            for ($i = 0; $i < count($Znet); $i++) {
                                                $no_xi = $i + 1;
                                                $Z[$i] = 1 / (1 + exp(-$Znet[$i]));
                                            } ?>
                                            <tr>
                                                <td><?php echo $Z[0]; ?></td>
                                                <td><?php echo $Z[1]; ?></td>
                                                <td><?php echo $Z[2]; ?></td>
                                                <td><?php echo $Z[3]; ?></td>
                                                <td><?php echo $Z[4]; ?></td>
                                                <td><?php echo $Z[5]; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-12 my-3">
                                    <h3 class="card-title alert alert-info">8. Output Layer (Zj*Wjk)</h3>
                                </div>
                                <div class="col-12">
                                    <table id="inisialisasi_bobot_awal" class="table table-bordered table-striped">
                                        <thead>
                                            <th>Zj_Wj1</th>
                                            <th>Zj_Wj2</th>
                                            <th>Zj_Wj3</th>
                                            <th>Zj_Wj4</th>
                                            <th>Zj_Wj5</th>
                                            <th>Zj_Wj6</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $W0 = $Zi_bias;
                                            $Wjk = $Zi;
                                            $Zj_Wjk = array();
                                            for ($i = 0; $i < count($Z); $i++) {
                                                $no_xi = $i + 1;
                                                $Zj_Wjk[$i] = $Z[$i] * $Wjk[$i];
                                            } ?>
                                            <tr>
                                                <td><?php echo $Zj_Wjk[0]; ?></td>
                                                <td><?php echo $Zj_Wjk[1]; ?></td>
                                                <td><?php echo $Zj_Wjk[2]; ?></td>
                                                <td><?php echo $Zj_Wjk[3]; ?></td>
                                                <td><?php echo $Zj_Wjk[4]; ?></td>
                                                <td><?php echo $Zj_Wjk[5]; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-12 my-3">
                                    <h3 class="card-title alert alert-info">9. Output Layer (Ynet)</h3>
                                </div>
                                <div class="col-12">
                                    <table id="inisialisasi_bobot_awal" class="table table-bordered table-striped">
                                        <thead>
                                            <th>Ynet</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $Ynet = 0;
                                            for ($i = 0; $i < count($Zj_Wjk); $i++) {
                                                $no_xi = $i + 1;
                                                $Ynet = $Ynet + $Zj_Wjk[$i];
                                            }
                                            $Ynet = $W0 * $Ynet;
                                            ?>
                                            <tr>
                                                <td><?php echo $Ynet; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-12 my-3">
                                    <h3 class="card-title alert alert-info">10. Hasil keluaran dengan fungsi aktivasi (Y)</h3>
                                </div>
                                <div class="col-12">
                                    <table id="inisialisasi_bobot_awal" class="table table-bordered table-striped">
                                        <thead>
                                            <th>Y</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $Y = 1 / (1 + exp(-$Ynet));
                                            ?>
                                            <tr>
                                                <td><?php echo $Y; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-12 my-3">
                                    <h3 class="card-title alert alert-danger">11. PROSES BACKWARD (error output layer)</h3>
                                </div>
                                <div class="col-12">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <th>Y</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $Y = 1 / (1 + exp(-$Ynet));
                                            ?>
                                            <tr>
                                                <td><?php echo $Y; ?></td>
                                            </tr>
                                        </tbody>
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