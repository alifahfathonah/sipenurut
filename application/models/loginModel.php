<?php

class loginModel extends CI_Model
{
    function auth_murid($username, $password)
    {
        $query = $this->db->query("SELECT * FROM murid WHERE email='$username' AND PASSWORD='$password' limit 1");
        return $query;
    }

    function auth_guru($username, $password)
    {
        $query = $this->db->query("SELECT * FROM guru WHERE username='$username' AND PASSWORD='$password' limit 1");
        return $query;
    }
}
