<?php


class guruModel extends CI_Model
{

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
        WHERE guru.`id` = '$id'")->row();

        return $query;
    }

    function getdata()
    {
        $query = $this->db->query("SELECT
         `guru`.*
        , `wilayah`.*
        , `wilayah`.`id` as `wilayahid`
        , `guru`.`id` as `guruid`
        FROM
        `guru`
        INNER JOIN `wilayah` 
        ON (`guru`.`id_wilayah` = `wilayah`.`id`)");

        return $query;
    }
}
