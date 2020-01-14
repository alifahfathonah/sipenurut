<?php

class dashboardGuruModel extends CI_Model
{
    function countpermintaan($id)
    {
        $query = $this->db->query("SELECT COUNT(*) as jumlah FROM permintaan WHERE status = 'Proses' AND id_guru = '$id'");
        return $query;
    }

    function countaktif($id)
    {
        $query = $this->db->query("SELECT
            COUNT(*) AS jumlah
        FROM
            `ajar`
            INNER JOIN `permintaan` 
                ON (`ajar`.`id_permintaan` = `permintaan`.`id`)
                WHERE `permintaan`.`id_guru` = '$id' AND ajar.`status`= 'Aktif';");
        return $query;
    }

    function countselesai($id)
    {
        $query = $this->db->query("SELECT
            COUNT(*) AS jumlah
        FROM
            `ajar`
            INNER JOIN `permintaan` 
                ON (`ajar`.`id_permintaan` = `permintaan`.`id`)
                WHERE `permintaan`.`id_guru` = '$id' AND ajar.`status`= 'Selesai';");
        return $query;
    }

    function getlastdata($id)
    {
        $query = $this->db->query("SELECT * FROM verifikasi WHERE id_guru = '$id' ORDER BY tgl_update DESC LIMIT 1");
        return $query;
    }
}
