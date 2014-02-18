<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Todo
 *
 * @author webworker@live.com
 * 
 */
class todo extends My_Controller
{
    /**
     * Default action displays the todo list to the user
     */
    public function index()
    {
        $this->load->model('todo_model');
        $data['list'] = $this->todo_model->getAll();
        $this->load->view('todo_list', $data);
    }
    
    /**
     * Add action allow user to add new items to the list
     */
    public function add()
    {
        
    }
    
    /**
     * Update action allows editing of an existing item
     */
    public function update()
    {
        
    }
    
    /**
     * Delete action allows deleting of existing item
     */
    public function delete()
    {
        
    }
}
