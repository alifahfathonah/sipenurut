<?php


class homeModel extends CI_Model
{

    function getwilayah()
    {
        $query = $this->db->query("SELECT 
        wilayah.*, COUNT(id_wilayah) AS jumlah
        FROM wilayah 
            LEFT JOIN
        guru ON `guru`.`id_wilayah` = `wilayah`.`id`
        
        WHERE `guru`.`verifikasi` = 'Terverifikasi'
            GROUP BY `wilayah`.`id`");
        return $query;
    }

    function getguru()
    {
        $query = $this->db->query("SELECT
        `guru`.*
        , `wilayah`.*
        , `guru`.`id` as guruid
        FROM
        `guru`
        INNER JOIN `wilayah` 
        ON (`guru`.`id_wilayah` = `wilayah`.`id`)
        WHERE `guru`.`verifikasi` = 'Terverifikasi'
        ORDER BY RAND();");
        return $query;
    }

    function getgurudetail($id)
    {
        $query = $this->db->query("SELECT
        `guru`.*
        , `wilayah`.*
        , `guru`.`id` as guruid
        FROM
        `guru`
        INNER JOIN `wilayah` 
        ON (`guru`.`id_wilayah` = `wilayah`.`id`)
        WHERE `guru`.`verifikasi` = 'Terverifikasi' AND `guru`.`id` = $id");
        return $query;
    }

    function getjurusanpdd()
    {
        $query = $this->db->query("SELECT jurusanpdd,COUNT(*) AS jumlah FROM guru WHERE verifikasi = 'Terverifikasi' GROUP BY jurusanpdd ORDER BY jumlah DESC LIMIT 10;");
        return $query;
    }

    function cekpermintaan($guruid, $muridid)
    {
        $query = $this->db->query("SELECT * FROM permintaan WHERE id_murid = '$muridid' AND id_guru = '$guruid' AND status = 'Proses'");
        return $query;
    }

    function getreview($guruid)
    {
        $query = $this->db->query("SELECT
                `murid`.`nm_murid`
                , `review`.*
                , `ajar`.`tgl_mulai`
                , `ajar`.`tgl_selesai`
            FROM
                `review`
                INNER JOIN `murid` 
                    ON (`review`.`id_murid` = `murid`.`id`)
                INNER JOIN `ajar` 
                    ON (`review`.`id_ajar` = `ajar`.`id`)
                    WHERE id_guru = '$guruid' ORDER BY tgl DESC;");
        return $query;
    }

    function rerata($guruid)
    {
        $query = $this->db->query("SELECT ROUND(AVG(rate),2) AS rerata FROM review WHERE id_guru = '$guruid'");
        return $query;
    }
}
