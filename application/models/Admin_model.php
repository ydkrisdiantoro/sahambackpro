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
    public function getBobotInputHidden()
    {
        $query = $this->db->get('bobot_input_hidden');
        return $query->result_array();
    }
    public function getBobotHiddenOutput()
    {
        $query = $this->db->get('bobot_hidden_output');
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
    public function inputInputHidden($z1, $z2, $z3)
    {
        $data = [
            "id" => NULL,
            "z1" => $z1,
            "z2" => $z2,
            "z3" => $z3
        ];
        $this->db->insert("bobot_input_hidden", $data);
    }
    public function inputHiddenOutput($x)
    {
        $data = [
            "id" => NULL,
            "y" => $x
        ];
        $this->db->insert("bobot_hidden_output", $data);
    }
}
