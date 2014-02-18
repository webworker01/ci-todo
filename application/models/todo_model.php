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
     * @return 
     */
    public function insert($data)
    {
        return $this->db->insert('items', $data);
    }
    
    /**
     * Update a record in the database
     * @param int $id ID of the record to be updated
     * @param Array $data fields to be updated
     */
    public function update($id, $data)
    {
        $this->db->update('items', $data, array('id' => $id));
    }
}
