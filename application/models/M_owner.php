<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_owner extends CI_Model
{
    private $auth = 'auth';
    private $role = 'role';

    public function get_team()
    {
        $this->db->select('auth.*, role.role');
        $this->db->from('auth');
        $this->db->join('role', 'auth.role_id = role.id');
        $this->db->where('role_id', 1);
        $this->db->where('role_id', 2);
        $this->db->where('role_id', 3);
        $this->db->where('role_id', 4);
        return $this->db->get()->result();
    }

    public function get_role()
    {
        return $this->db->get($this->role)->result();
    }

}