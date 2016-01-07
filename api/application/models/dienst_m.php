<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dienst_m extends MY_Model {

    protected $_table = 'diensten';
    protected $before_get = array('join_clienten', 'select_columns');
    public $validate;

    protected function join_clienten()
    {
        $this->db->join('clienten', 'diensten.cl_id = clienten.cl_id', 'left');

        return $this;
    }

    protected function select_columns()
    {
        $this->db->select('id, diensten.cl_id, datum, van, tot, zv_id, status, blokkering, titel, voorletters, achternaam');

        return $this;
    }
}
