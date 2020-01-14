<?php

class cariModel extends CI_Model
{

    function getjurusanpdd()
    {
        $query = $this->db->query("SELECT jurusanpdd,COUNT(*) AS jumlah FROM guru WHERE verifikasi = 'Terverifikasi' GROUP BY jurusanpdd ORDER BY jumlah DESC LIMIT 10;");
        return $query;
    }

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

    function query($jurusan = null, $nama = null, $jenjang = null, $wilayah = null, $pendidikan = null)
    {
        $query = $this->db->query("SELECT
        `guru`.*
        , `wilayah`.*
        , `guru`.`id` AS guruid
        FROM
        `guru`
        INNER JOIN `wilayah` 
        ON (`guru`.`id_wilayah` = `wilayah`.`id`)
        WHERE `guru`.`verifikasi` = 'Terverifikasi'
        AND nm_guru LIKE '%$nama%' 
        AND jurusan LIKE '%$jurusan%' 
        AND jenjang LIKE '%$jenjang%'
        AND id_wilayah LIKE '%$wilayah%'
        AND jurusanpdd LIKE '%$pendidikan%'");
        return $query;
    }
}
