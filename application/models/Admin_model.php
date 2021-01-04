<?php

class Admin_model extends CI_Model
{
    public function getDataSaham()
    {
        $this->db->order_by('tanggal', 'desc');
        $query = $this->db->get('data_saham');
        return $query->result_array();
    }
    public function getDataSahamTerakhir()
    {
        $this->db->select('id,tanggal, terakhir');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('data_saham');
        return $query->result_array();
    }
    public function inputSaham($tanggal, $terakhir, $pembukaan, $tertinggi, $terendah, $volume, $perubahan)
    {
        $data = [
            "id" => NULL,
            "tanggal" => $tanggal,
            "terakhir" => $terakhir,
            "pembukaan" => $pembukaan,
            "tertinggi" => $tertinggi,
            "terendah" => $terendah,
            "volume" => $volume,
            "perubahan" => $perubahan
        ];
        $this->db->insert("data_saham", $data);
    }
    public function getDataTraining()
    {
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('data_training');
        return $query->result_array();
    }
    public function inputDataTraining($x)
    {
        $data = [
            "id" => NULL,
            "x" => $x
        ];
        $this->db->insert("data_training", $data);
    }
}
