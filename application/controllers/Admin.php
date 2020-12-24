<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
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
}
