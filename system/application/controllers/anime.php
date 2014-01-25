<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
    class Anime extends CI_Controller {

        public function view($page = 'home')
        {
            if ( ! file_exists('application/views/anime/'.$page.'.php'))
            {
                // Whoops, we don't have a page for that!
                show_404();
            }

            $data['title'] = ucfirst($page); // Capitalize the first letter

            $this->load->view('templates/header', $data);
            $this->load->view('anime/'.$page, $data);
            $this->load->view('templates/footer', $data);
        }
    }
?>
