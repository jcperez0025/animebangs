<?php

class Migrate extends CI_Controller {

    function create_db() {
        $this->load->library('migration');
        
        if (!$this->migration->current()) {
            show_error($this->migration->error_string());
        }
    }
}

?>