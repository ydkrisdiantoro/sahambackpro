<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("admin_model");
    }

    public function index()
    {
        $data['halaman'] = "index";
        $data['nama_halaman'] = "Dashboard Page";
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('admin/footer');
    }

    public function input()
    {
        $data['halaman'] = "input";
        $data['nama_halaman'] = "Input Page";
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/input', $data);
        $this->load->view('admin/footer');
    }

    public function chart()
    {
        $data['halaman'] = "chart";
        $data['nama_halaman'] = "Chart Page";
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/chart', $data);
        $this->load->view('admin/footer');
    }
    public function unggah()
    {
        $data['halaman'] = "unggah";
        $data['nama_halaman'] = "Upload Data Saham";
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/unggah', $data);
        $this->load->view('admin/footer');
    }
    public function proses_upload()
    {
        $this->load->view('admin/excel_reader2.php');
        $data = new Spreadsheet_Excel_Reader($_FILES['data_excel']['tmp_name']);
        $hasil_data = $data->rowcount($sheet_index = 0);
        $new_data = array();
        $num = $hasil_data - 2;
        for ($i = 2; $i <= $num; $i++) {
            $new_data[] = $data->val($i, 1);
            // echo $data->val($i, 1) . "\n helloitsme \n";
        }
        foreach ($new_data as $a) {
            $data_baru = explode("#", $a);
            // echo $a . "\n-------------------";
            $tgl_0 = explode("/", $data_baru[0]);
            $tgl = $tgl_0[2] . "-" . $tgl_0[1] . "-" . $tgl_0[0];
            // echo $tgl;
            $this->admin_model->inputSaham($tgl, $data_baru[1], $data_baru[2], $data_baru[3], $data_baru[4], $data_baru[5], $data_baru[6]);
        }
        redirect(base_url('admin/data_saham'));
    }
    public function data_saham()
    {
        $data['halaman'] = "data_saham";
        $data['nama_halaman'] = "Data Saham";
        $data['listdata'] = $this->admin_model->getDataSaham();
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/data_saham', $data);
        $this->load->view('admin/footer');
    }
    public function proses()
    {
        $data['halaman'] = "proses";
        $data['nama_halaman'] = "Proses Backpro";
        $data['listdata'] = $this->admin_model->getDataSahamTerakhir();
        $data['data_training'] = $this->admin_model->getDataTraining();
        $data["input_hidden"] = $this->admin_model->getBobotInputHidden();
        $data["hidden_output"] = $this->admin_model->getBobotHiddenOutput();
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/proses', $data);
        $this->load->view('admin/footer');
    }
    public function input_data_training()
    {
        function random_angka()
        {
            $hasil = 0;
            while ($hasil == 0) {
                $random = rand(-9, 9);
                $hasil = $random / 10;
            }
            return $hasil;
        }
        for ($i = 0; $i < 8; $i++) {
            $x = "";
            for ($j = 0; $j <= 8; $j++) {
                $x = $x . "#" . random_angka();
            }
            $this->admin_model->inputDataTraining($x);
        }

        // input ke hidden
        for ($i = 0; $i < 8; $i++) {
            $z1 = random_angka();
            $z2 = random_angka();
            $z3 = random_angka();
            $y = random_angka();
            $this->admin_model->inputInputHidden($z1, $z2, $z3);
            $this->admin_model->inputHiddenOutput($y);
        }
    }
}
