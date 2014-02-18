<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of todo_model
 *
 * @author webworker@live.com
 */
class todo_model extends CI_Model
{
    /**
     * Gets all records from the items table
     * @return Object object containing all rows in the items table
     */
    public function getAll()
    {
        $query = $this->db->query('SELECT * FROM items');
        
        return $query->result();
    }
    
    /**
     * Insert a new todo item into the database
     * @param Array $data Contains all the fields to be filled in
     */
    public function insert($data)
    {
        $this->db->insert('items', $data);
    }
}
