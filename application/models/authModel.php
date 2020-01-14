<?php

class authModel extends CI_Model
{
    function auth_admin($username, $password)
    {
        $query = $this->db->query("SELECT * FROM admin WHERE username='$username' AND PASSWORD='$password' limit 1");
        return $query;
    }

    function auth_guru($username, $password)
    {
        $query = $this->db->query("SELECT * FROM guru WHERE username='$username' AND PASSWORD='$password' limit 1");
        return $query;
    }
}
