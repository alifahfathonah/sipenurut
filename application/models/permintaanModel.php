<?php

class permintaanModel extends CI_Model
{

    function getdata($id)
    {
        $query = $this->db->query("SELECT
                `guru`.`id` AS `guruid`
                , `murid`.`id` AS `muridid`
                , `permintaan`.`id` AS `permintaanid`
                , `guru`.*
                , `murid`.*
                , `permintaan`.*
            FROM
                `permintaan`
            INNER JOIN `guru` 
                ON (`permintaan`.`id_guru` = `guru`.`id`)
            INNER JOIN `murid` 
                ON (`permintaan`.`id_murid` = `murid`.`id`)
            WHERE `murid`.`id` = '$id' ORDER BY FIELD(STATUS,'Proses') DESC;");
        return $query;
    }
}
