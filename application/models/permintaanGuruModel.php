<?php

class permintaanGuruModel extends CI_Model
{
    function count($id)
    {
        $query = $this->db->query("SELECT COUNT(*) as jumlah FROM permintaan WHERE status = 'Proses' AND id_guru = '$id'");
        return $query;
    }

    function getdata($id)
    {
        $query = $this->db->query("SELECT
            `permintaan`.`id` AS `permintaanid`
            , `permintaan`.*
            , `murid`.`id` AS `muridid`
            , `murid`.*
        FROM
            `permintaan`
            INNER JOIN `murid` 
                ON (`permintaan`.`id_murid` = `murid`.`id`)
            WHERE id_guru = '$id' ORDER BY FIELD(STATUS,'Proses') DESC;");
        return $query;
    }

    function getdetail($idguru, $idpermintaan)
    {
        $query = $this->db->query("SELECT
            `permintaan`.`id` AS `permintaanid`
            , `permintaan`.*
            , `murid`.`id` AS `muridid`
            , `murid`.*
        FROM
            `permintaan`
            INNER JOIN `murid` 
                ON (`permintaan`.`id_murid` = `murid`.`id`)
            WHERE id_guru = '$idguru' AND `permintaan`.`id` = '$idpermintaan';");
        return $query;
    }
}
