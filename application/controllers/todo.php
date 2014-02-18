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
        
        if ($this->form_validation->run() == TRUE) { 
            if ($this->input->post('formid') == 'add') {
                $this->add();
                redirect();
            }
        }

        //Load existing items
        $this->load->model('todo_model');
        $data['list'] = $this->todo_model->getAll();

        $this->load->view('todo/todo_list', $data);
    }

    /**
     * Add action allow user to add new items to the list
     */
    private function add()
    {
        $this->load->model('todo_model');

        //Set up the data to be insert to the database, protected for XSS
        $data = array (
            'item' => $this->input->post('item', TRUE),
            'date_due' => date("Y-m-d H:i:s", strtotime($this->input->post('date_due', TRUE))),
            'completed' => $this->input->post('completed', TRUE)
        );

        $this->todo_model->insert($data);
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
     * @todo This should be in the model and not in a controller but all CI examples point here
     */
    protected function defineForm()
    {
        //Create a small form to add new items
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('item', 'Description', 'trim|required|max_length[255]|xss_clean');
        $this->form_validation->set_rules('date_due', 'Due Date', 'trim|required');
        $this->form_validation->set_rules('completed', 'Completed', '');

        
        
        if (!empty($_POST['date_due'])) {
            //$dateDue = $this->input->post('date_due'); 
            $dateDue = filter_input(INPUT_POST, 'date_due', FILTER_SANITIZE_SPECIAL_CHARS);
        } else {
            $dateDue = date('m/d/Y', mktime(0, 0, 0, date('m'), date('d') + 3, date('Y')));
        }
        
        $data['item'] = array(
            'name' => 'item',
            'id' => 'item',
            'type' => 'text',
            'value' => filter_input(INPUT_POST, 'item', FILTER_SANITIZE_SPECIAL_CHARS),
            'placeholder' => 'Todo Item Description',
            'class' => 'input-small',
            'size' => '50',
            'maxlength' => '255'
        );

        $data['date_due'] = array(
            'name' => 'date_due',
            'id' => 'date_due',
            'type' => 'text',
            'value' => $dateDue,
            'placeholder' => 'Due Date',
            'class' => 'datepicker input-small'
        );

        $data['completed'] = array(
            'name' => 'completed',
            'id' => 'completed',
            'type' => 'checkbox',
            'value' => filter_input(INPUT_POST, 'completed', FILTER_SANITIZE_SPECIAL_CHARS)
        );
        
        $data['formid'] = array(
            'name' => 'formid',
            'id' => 'formid',
            'type' => 'hidden',
            'value' => 'add'
        );

        return $data;
    }
}
