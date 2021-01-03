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
    $a = 0.3;
    ?>
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
                                            <th>Data Terakhir</th>
                                            <th>Data Terakhir (Normal)</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $data = array();
                                            $data_normal = array();
                                            foreach ($listdata as $a) {
                                                $data["tanggal"][] = $a["tanggal"];
                                                $data["terakhir"][] = $a["terakhir"];
                                            }
                                            $terakhir_max = max($data["terakhir"]);

                                            $terakhir_min = min($data["terakhir"]);

                                            for ($i = 0; $i < count($data["tanggal"]); $i++) {
                                                $hasil_terakhir = round(((0.8 * ($data["terakhir"][$i] - $terakhir_min)) / ($terakhir_max - $terakhir_min)) + 0.1, 6);
                                                $data_normal["terakhir"][] = $hasil_terakhir;;
                                            ?>
                                                <tr>
                                                    <td><?php echo $data['tanggal'][$i]; ?></td>
                                                    <td><?php echo $data['terakhir'][$i]; ?></td>
                                                    <td><?php echo $hasil_terakhir; ?></td>

                                                </tr>
                                            <?php
                                            } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>Data Terakhir</th>
                                                <th>Data Terakhir (Normal)</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>

                                <div class="col-12 my-3">
                                    <h3 class="card-title alert alert-secondary">2. Tabel Data Training</h3>
                                </div>
                                <div class="col-12" style="overflow-x: scroll;">
                                    <table id="inisialisasi_bobot_awal" class="table table-bordered table-striped">
                                        <thead>
                                            <th>Pola</th>
                                            <?php
                                            $n = count($data["tanggal"]) / 2;
                                            for ($i = 1; $i <= $n; $i++) {
                                                echo '<th>X' . $i . '</th>';
                                            }
                                            ?>
                                            <th>Target</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // 26 data

                                            $Xi = $data_normal["terakhir"];
                                            $Xi_0 = array();
                                            for ($i = 0; $i < $n; $i++) {
                                                $awal = $i;
                                                $akhir = $i + $n;
                                                $no = $i + 1;
                                                echo '<tr>';
                                                echo '<td>' . $no . '</td>';
                                                for ($j = $awal; $j <= $akhir; $j++) {
                                                    echo '<td>' . $Xi[$j] . '</td>';
                                                    $Xi_0[$i][] = $Xi[$j];
                                                }
                                                echo '</tr>';
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-12 my-3">
                                    <h3 class="card-title alert alert-secondary">3. Inisialisasi Bobot Awal Input-Hidden Layer</h3>
                                </div>
                                <div class="col-12" style="overflow-x: scroll;">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Z1</th>
                                                <th>Z2</th>
                                                <th>Z3</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 0;
                                            $Vij = array();
                                            for ($i = 0; $i <= $n; $i++) {
                                                $Vij['Z1'][$i] = random();
                                                $Vij['Z2'][$i] = random();
                                                $Vij['Z3'][$i] = random();

                                                $no = $i + 1;
                                                $print = "";
                                                if ($i == 0) {
                                                    $print = 1;
                                                } else {
                                                    $print = "X" . $i;
                                                }
                                            ?>
                                                <tr>
                                                    <td><?php echo $print; ?></td>
                                                    <td><?php echo $Vij['Z1'][$i]; ?></td>
                                                    <td><?php echo $Vij['Z2'][$i]; ?></td>
                                                    <td><?php echo $Vij['Z3'][$i]; ?></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-12 my-3">
                                    <h3 class="card-title alert alert-secondary">4. bobot dari layer tersembunyi ke layer output </h3>
                                </div>
                                <div class="col-12" style="overflow-x: scroll;">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Y</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $Wjk = array('', '', '', '');
                                            for ($i = 0; $i < count($Wjk); $i++) {
                                                $no = $i + 1;
                                                $print = "";
                                                $Wjk[$i] = random();
                                                if ($i == 0) {
                                                    $print = 1;
                                                } else {
                                                    $print = "Z" . $i;
                                                }
                                                echo '<tr>';
                                                echo '<td>' . $print . '</td>';
                                                echo '<td>' . $Wjk[$i] . '</td>';
                                                echo '</tr>';
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-12 my-3">
                                    <h3 class="card-title alert alert-secondary">5. Propagasi Maju (Xi*Vij) </h3>
                                </div>
                                <div class="col-12" style="overflow-x: scroll;">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <?php
                                                for ($i = 1; $i < count($Vij['Z1']); $i++) {
                                                    echo '<th>Xi*Vij ' . $i . '</th>';
                                                }
                                                ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $Xi_Vij = array();
                                            //count($Vij) = 3 (Z1,Z2,Z3)
                                            for ($i = 0; $i < count($Vij); $i++) {
                                                $no = $i + 1;
                                                echo '<tr>';
                                                echo '<td>' . $no . '</td>';
                                                for ($j = 1; $j < count($Vij["Z1"]); $j++) {
                                                    $Xi_Vij[$i][$j] = $Vij["Z" . $no][$j] * $Xi_0[$i][$j];
                                                    echo '<td>' . $Xi_Vij[$i][$j] . '</td>';
                                                }
                                                echo '</tr>';
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-12 my-3">
                                    <h3 class="card-title alert alert-secondary">6. Znet </h3>
                                </div>
                                <div class="col-12" style="overflow-x: scroll;">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <?php
                                                for ($i = 1; $i <= count($Vij); $i++) {
                                                    echo '<th>Znet ' . $i . '</th>';
                                                }
                                                ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $Znet = array();
                                            //count($Vij) = 3 (Z1,Z2,Z3)
                                            for ($i = 0; $i < count($Xi_Vij); $i++) {
                                                $no = $i + 1;
                                                $Znet[$i] = 0;
                                                for ($j = 1; $j < count($Xi_Vij[0]); $j++) {
                                                    $Znet[$i] = $Znet[$i] + $Xi_Vij[$i][$j];
                                                }
                                                $Znet[$i] = $Vij["Z" . $no][0] + $Znet[$i];
                                            }
                                            echo '<tr>';
                                            echo '<td>' . $Znet[0] . '</td>';
                                            echo '<td>' . $Znet[1] . '</td>';
                                            echo '<td>' . $Znet[2] . '</td>';
                                            echo '</tr>';
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-12 my-3">
                                    <h3 class="card-title alert alert-secondary">7. Z </h3>
                                </div>
                                <div class="col-12" style="overflow-x: scroll;">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <?php
                                                for ($i = 1; $i <= count($Znet); $i++) {
                                                    echo '<th>Z' . $i . '</th>';
                                                }
                                                ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $Z = array();
                                            //count($Vij) = 3 (Z1,Z2,Z3)
                                            for ($i = 0; $i < count($Znet); $i++) {
                                                $no = $i + 1;
                                                $Z[$i] = 1 / (1 + exp(-$Znet[$i]));
                                            }
                                            echo '<tr>';
                                            echo '<td>' . $Z[0] . '</td>';
                                            echo '<td>' . $Z[1] . '</td>';
                                            echo '<td>' . $Z[2] . '</td>';
                                            echo '</tr>';
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-12 my-3">
                                    <h3 class="card-title alert alert-secondary">8. Ynet dan Y</h3>
                                </div>
                                <div class="col-12" style="overflow-x: scroll;">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <td>Ynet</td>
                                                <td>Y</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $Ynet = 0;
                                            //count($Vij) = 3 (Z1,Z2,Z3)
                                            for ($i = 0; $i < count($Z); $i++) {
                                                $no = $i + 1;
                                                $Ynet = $Ynet + $Z[$i] * $Wjk[$no];
                                            }
                                            $Ynet = $Wjk[0] + $Ynet;
                                            $Y = 1 / (1 + exp(-$Ynet));
                                            echo '<tr>';
                                            echo '<td>' . $Ynet . '</td>';
                                            echo '<td>' . $Y . '</td>';
                                            echo '</tr>';
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-12 my-3">
                                    <h3 class="card-title alert alert-secondary">9. Backward </h3>
                                </div>
                                <div class="col-12" style="overflow-x: scroll;">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <td>δk=(tk-yk) f’(y_netk)= (tk-yk) yk (1-yk) </td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $b = array();
                                            for ($i = 0; $i < count($Z); $i++) {
                                                $b[$i] = ($Xi_0[$i][count($Xi_0[$i]) - 1] - $Y) * $Y * (1 - $Y);
                                                echo '<tr>';
                                                echo '<td>' . $b[$i] . '</td>';
                                                echo '</tr>';
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-12 my-3">
                                    <h3 class="card-title alert alert-secondary">10. Delta Wjk = abz </h3>
                                </div>
                                <div class="col-12" style="overflow-x: scroll;">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <td></td>
                                                <td>∆wkj= α δk zj</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $delta_wjk = array();
                                            $a = 0.3;
                                            for ($i = 0; $i < count($Z); $i++) {
                                                $no = $i + 1;
                                                $delta_wjk[$i] = $a * $b[$i] * $Z[$i];
                                                echo '<tr>';
                                                echo '<td>delta W' . $no . '</td>';
                                                echo '<td>' . $delta_wjk[$i] . '</td>';
                                                echo '</tr>';
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-12 my-3">
                                    <h3 class="card-title alert alert-secondary">11. factor δ unit tersembunyi berdasarkan kesalahan di setiap unit tersembunyi zj</h3>
                                </div>
                                <div class="col-12" style="overflow-x: scroll;">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <td>δ net 1</td>
                                                <td>δ net 2</td>
                                                <td>δ net 3</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $bnet = array();
                                            for ($i = 0; $i < count($Z); $i++) {
                                                $no = $i + 1;
                                                $bnet[$i] = $b[$i] * $Wjk[$no];
                                            }
                                            echo '<tr>';
                                            echo '<td>' . $bnet[0] . '</td>';
                                            echo '<td>' . $bnet[1] . '</td>';
                                            echo '<td>' . $bnet[2] . '</td>';
                                            echo '</tr>';
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-12 my-3">
                                    <h3 class="card-title alert alert-secondary">12. Faktor kesalahan δ unit tersembunyi</h3>
                                </div>
                                <div class="col-12" style="overflow-x: scroll;">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <td>δ 1</td>
                                                <td>δ 2</td>
                                                <td>δ 3</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $b = array();
                                            for ($i = 0; $i < count($bnet); $i++) {
                                                $no = $i + 1;
                                                $b[$i] = $bnet[$i] * $Z[$i] * (1 - $Z[$i]);
                                            }
                                            echo '<tr>';
                                            echo '<td>' . $b[0] . '</td>';
                                            echo '<td>' . $b[1] . '</td>';
                                            echo '<td>' . $b[2] . '</td>';
                                            echo '</tr>';
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-12 my-3">
                                    <h3 class="card-title alert alert-secondary">13. delta Vji</h3>
                                </div>
                                <div class="col-12" style="overflow-x: scroll;">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <?php
                                                for ($j = 0; $j < count($Vij["Z" . $no]); $j++)
                                                    echo '<td>delta vij ' . $j . '</td>';
                                                ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $delta_vij = array();
                                            $a = 0.3;
                                            for ($i = 0; $i < count($b); $i++) {
                                                $no = $i + 1;
                                                echo '<tr>';
                                                for ($j = 0; $j < count($Vij["Z" . $no]); $j++) {
                                                    $delta_vij[$i][$j] = $a * $b[$i] * $Vij["Z" . $no][$j];
                                                    echo '<td>' . $delta_vij[$i][$j] . '</td>';
                                                }
                                                echo '</tr>';
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-12 my-3">
                                    <h3 class="card-title alert alert-secondary">14. Perubahan Bobot</h3>
                                </div>
                                <div class="col-12" style="overflow-x: scroll;">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <td>Wjk baru 1</td>
                                                <td>Wjk baru 2</td>
                                                <td>Wjk baru 3</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $Wjk_baru = array();
                                            for ($i = 0; $i < count($b); $i++) {
                                                $no = $i + 1;
                                                $Wjk_baru[$i] = $Wjk[$i] + $delta_wjk[$i];
                                            }
                                            echo '<tr>';
                                            echo '<td>' . $Wjk_baru[0] . '</td>';
                                            echo '<td>' . $Wjk_baru[1] . '</td>';
                                            echo '<td>' . $Wjk_baru[2] . '</td>';
                                            echo '</tr>';
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-12 my-3">
                                    <h3 class="card-title alert alert-secondary">15. Vji baru</h3>
                                </div>
                                <div class="col-12" style="overflow-x: scroll;">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <?php
                                                for ($j = 0; $j < count($Vij["Z" . $no]); $j++)
                                                    echo '<td>Vij baru ' . $j . '</td>';
                                                ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $Vij_baru = array();
                                            $a = 0.3;
                                            for ($i = 0; $i < count($b); $i++) {
                                                $no = $i + 1;
                                                echo '<tr>';
                                                for ($j = 0; $j < count($Vij["Z" . $no]); $j++) {
                                                    $Vij_baru[$i][$j] = $Vij["Z" . $no][$j] + $delta_vij[$i][$j];
                                                    echo '<td>' . $Vij_baru[$i][$j] . '</td>';
                                                }
                                                echo '</tr>';
                                            }
                                            ?>
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