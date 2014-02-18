<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of My_Controller
 *
 * @author webworker@live.com
 */
class My_Controller extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('ion_auth');
        
        if (ENVIRONMENT == 'development') {
            $this->output->enable_profiler(TRUE);
        }
    }

    /**
     * Override default view behavior to enable a base template all other 
     * templates will extend from
     * @param string $content
     */
    public function _output($content)
    {
        $data['content'] = $content;
        $data['auth'] = array(
            'logged_in' => $this->ion_auth->logged_in(),
            'is_admin' => $this->ion_auth->is_admin()
        );
        
        echo $this->load->view('base', $data, true);
    }
}
