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
        //Get the form definition
        $data = $this->defineForm();

        //Load existing items
        $this->load->model('todo_model');
        $data['list'] = $this->todo_model->getAll();

        $this->load->view('todo/todo_list', $data);
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
    
    /**
     * Defines the form and validation
     */
    protected function defineForm()
    {
        //Create a small form to add new items
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('item', 'Description', 'required|max_length[255]');
        $this->form_validation->set_rules('date_due', 'Due Date', 'required');
        $this->form_validation->set_rules('completed', 'Completed', 'required');

        $data['item'] = array(
            'name' => 'item',
            'id' => 'item',
            'type' => 'text',
            'value' => $this->form_validation->set_value('item'),
            'placeholder' => 'Todo Item Description',
            'class' => 'input-small'
        );

        $data['date_due'] = array(
            'name' => 'date_due',
            'id' => 'date_due',
            'type' => 'text',
            'value' => $this->form_validation->set_value('date_due'),
            'placeholder' => 'Due Date',
            'class' => 'datepicker input-small'
        );

        $data['completed'] = array(
            'name' => 'completed',
            'id' => 'completed',
            'type' => 'checkbox',
            'value' => $this->form_validation->set_value('completed')
        );
        
        return $data;
    }
}
