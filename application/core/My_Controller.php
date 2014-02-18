<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Owen_Controller
 *
 * @author Owen
 */
class My_Controller extends CI_Controller 
{
    
    /**
     * Override default view behavior to enable a base template all other 
     * templates will extend from
     * @param string $content
     */
    public function _output($content)
    {
        $data['content'] = $content;
        echo $this->load->view('base', $data, true);
    }
}
