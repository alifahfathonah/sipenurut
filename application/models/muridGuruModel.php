<?php

class muridGuruModel extends CI_Model
{

    function getdata($id)
    {
        $query = $this->db->query("SELECT
            `ajar`.`id` AS `ajarid`
            , `ajar`.*
            , `ajar`.`status` AS ajarstatus
            , `permintaan`.*
            , `permintaan`.`id` AS `permintaanid`
            , `guru`.`id` AS `guruid`
            , `guru`.*
            , `murid`.*
            , `murid`.`id` AS `muridid`
        FROM
            `permintaan`
            INNER JOIN `guru` 
                ON (`permintaan`.`id_guru` = `guru`.`id`)
            INNER JOIN `murid` 
                ON (`permintaan`.`id_murid` = `murid`.`id`)
            INNER JOIN `ajar` 
                ON (`ajar`.`id_permintaan` = `permintaan`.`id`)
            WHERE permintaan.`id_guru` = '$id' ORDER BY FIELD(`ajar`.`status`,'Proses') DESC;");
        return $query;
    }

    function getdetail($id_ajar, $id_guru)
    {
        $query = $this->db->query("SELECT
            `ajar`.`id` AS `ajarid`
            , `ajar`.*
            , `ajar`.`status` AS ajarstatus
            , `permintaan`.*
            , `permintaan`.`id` AS `permintaanid`
            , `guru`.`id` AS `guruid`
            , `guru`.*
            , `murid`.*
            , `murid`.`id` AS `muridid`
        FROM
            `permintaan`
            INNER JOIN `guru` 
                ON (`permintaan`.`id_guru` = `guru`.`id`)
            INNER JOIN `murid` 
                ON (`permintaan`.`id_murid` = `murid`.`id`)
            INNER JOIN `ajar` 
                ON (`ajar`.`id_permintaan` = `permintaan`.`id`)
            WHERE permintaan.`id_guru` = '$id_guru' AND `ajar`.`id` = '$id_ajar' ORDER BY FIELD(`ajar`.`status`,'Proses') DESC;");
        return $query;
    }

    function getdataajar($id_ajar, $id_guru)
    {
        $query = $this->db->query("SELECT
            `ajar`.`id` AS `ajarid`
            , `ajar`.*
            , `permintaan`.*
            , `permintaan`.`id` AS `permintaanid`
        FROM
            `ajar`
            INNER JOIN `permintaan` 
                ON (`ajar`.`id_permintaan` = `permintaan`.`id`)
                WHERE `permintaan`.`id_guru` = '$id_guru' AND `ajar`.`id` = '$id_ajar'");
        return $query;
    }
}
