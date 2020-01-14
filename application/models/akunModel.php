<?php

class akunModel extends CI_Model
{

    function getguru($id)
    {
        $query = $this->db->query("SELECT
                `ajar`.`id` AS `ajarid`
                , `ajar`.*
                , `permintaan`.*
                , `permintaan`.`id` AS `permintaanid`
                , `guru`.*
                , `guru`.`id` AS `guruid`
                , `ajar`.`status`AS statusajar
            FROM
                `ajar`
                INNER JOIN `permintaan` 
                    ON (`ajar`.`id_permintaan` = `permintaan`.`id`)
                INNER JOIN `guru` 
                    ON (`guru`.`id` = `permintaan`.`id_guru`)
                    WHERE `permintaan`.`id_murid` = '$id' ORDER BY FIELD(`ajar`.`status`,'Proses') DESC;;");
        return $query;
    }
}
