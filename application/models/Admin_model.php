<?php

class Admin_model extends CI_Model
{
    public function getNavbarMenu()
    {
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
}
