<?php

class verifikasiModel extends CI_Model
{
    function getdata()
    {
        $query = $this->db->query("SELECT
            `verifikasi`.*
            , `verifikasi`.id as verifikasiid
            , `guru`.*
            , `guru`.`id` as guruid
        FROM
            `verifikasi`
        INNER JOIN `guru` 
            ON (`verifikasi`.`id_guru` = `guru`.`id`)
            ORDER BY FIELD(STATUS,'Proses') DESC");
        return $query;
    }

    public function count()
    {
        $query = $this->db->query("SELECT COUNT(*) AS jumlah FROM verifikasi WHERE status = 'Proses'");
        return $query;
    }

    function getdatabyid($id)
    {
        $query = $this->db->query("SELECT
         `guru`.*
        , `wilayah`.*
        , `wilayah`.`id` as `wilayahid`
        , `guru`.`id` as `guruid`
        FROM
        `guru`
        INNER JOIN `wilayah` 
        ON (`guru`.`id_wilayah` = `wilayah`.`id`)
        WHERE guru.`id` = '$id'");

        return $query;
    }

    function getid($id)
    {
        $query = $this->db->query("SELECT * FROM verifikasi WHERE id_guru = '$id' AND STATUS = 'Proses' LIMIT 1");
        return $query;
    }
}
