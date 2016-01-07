<?php defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(
    'dienst_update' => array(
        array('field' => 'cl_id', 'label' => 'cl_id', 'rules' => 'trim'),
        array('field' => 'datum', 'label' => 'datum', 'rules' => 'trim'),
        array('field' => 'van', 'label' => 'van', 'rules' => 'trim'),
        array('field' => 'tot', 'label' => 'tot', 'rules' => 'trim'),
        array('field' => 'zv_id', 'label' => 'zv_id', 'rules' => 'trim'),
        array('field' => 'status', 'label' => 'status', 'rules' => 'trim')
    ),
    'dienst_insert' => array(
        array('field' => 'cl_id', 'label' => 'cl_id', 'rules' => 'trim|required'),
        array('field' => 'datum', 'label' => 'datum', 'rules' => 'trim|required'),
        array('field' => 'van', 'label' => 'van', 'rules' => 'trim|required'),
        array('field' => 'tot', 'label' => 'tot', 'rules' => 'trim|required'),
        array('field' => 'zv_id', 'label' => 'zv_id', 'rules' => 'trim|required'),
        array('field' => 'status', 'label' => 'status', 'rules' => 'trim|required')
    )
);
