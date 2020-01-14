<?php

class muridModel extends CI_Model
{

    function getdata($id)
    {
        $query = $this->db->query("SELECT
                `guru`.`nm_guru`
                , `permintaan`.*
            FROM
                `sipenurut`.`permintaan`
                INNER JOIN `sipenurut`.`guru` 
                    ON (`permintaan`.`id_guru` = `guru`.`id`)
                    WHERE id_murid = '$id';");
        return $query;
    }
}
